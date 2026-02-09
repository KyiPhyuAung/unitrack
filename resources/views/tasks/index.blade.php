@extends('layouts.app-bootstrap')

@section('content')
<style>
    .task-grid { display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); gap: 16px; }
    @media (min-width: 768px) { .task-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (min-width: 1200px) { .task-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

    .task-card.expired {
        box-shadow: 0 0 0 2px rgba(220,53,69,.25), 0 12px 30px rgba(0,0,0,.08);
    }

    .task-card {
        border: 0;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 12px 30px rgba(0,0,0,.08);
        overflow: hidden;
        transition: transform .15s ease, box-shadow .15s ease;
        opacity: 0;
        transform: translateY(10px);
        animation: cardIn .35s ease forwards;
    }
    @keyframes cardIn { to { opacity: 1; transform: translateY(0); } }

    .task-card:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(0,0,0,.10); }

    .priority-bar { height: 6px; }
    .p-red { background: #dc3545; }
    .p-green { background: #198754; }
    .p-blue { background: #0d6efd; }
    .p-yellow { background: #ffc107; }
    .p-purple { background: #6f42c1; }

    .pill { border-radius: 999px; padding: .35rem .6rem; font-size: .78rem; }
    .muted-mini { font-size: .88rem; color: #6c757d; }

    .soft-input { border-radius: 14px; }
</style>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <div>
        <h3 class="mb-0">My Tasks ✅</h3>
        <div class="text-muted">Plan • Prioritize • Finish 🎯✨</div>
    </div>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-lg me-1"></i> New Task
    </button>
</div>

<div id="alertBox" class="mb-3"></div>

<div id="emptyState" class="card card-soft d-none">
    <div class="card-body text-center py-5">
        <div class="display-6">🗓️</div>
        <h5 class="mt-2 mb-1">No tasks yet</h5>
        <div class="text-muted">Create your first task and stay on track ✨</div>
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Create Task 🚀
        </button>
    </div>
</div>

<div id="taskGrid" class="task-grid"></div>

<!-- CREATE MODAL -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 18px;">
            <form id="createForm">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-pencil-square me-1"></i> Create Task 📝</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    @include('tasks.partials.task-form-fields', ['prefix' => 'c_'])
                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save <i class="bi bi-arrow-right ms-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 18px;">
            <form id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-sliders me-1"></i> Edit Task ✏️</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_id">
                    @include('tasks.partials.task-form-fields', ['prefix' => 'e_'])
                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update ✅</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function showAlert(type, message) {
        document.getElementById('alertBox').innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
    }

    function escapeHtml(str) {
        return String(str)
            .replaceAll('&', '&amp;')
            .replaceAll('<', '&lt;')
            .replaceAll('>', '&gt;')
            .replaceAll('"', '&quot;')
            .replaceAll("'", '&#039;');
    }

    function priorityEmoji(color) {
        const map = { red:'🔴', green:'🟢', blue:'🔵', yellow:'🟡', purple:'🟣' };
        return map[color] ?? '🔵';
    }

    function toLocalDueDate(task) {
    // If no time, assume end of day
        const time = task.task_time ? String(task.task_time).slice(0, 5) : '23:59';
        return new Date(`${task.task_date}T${time}`);
    }

    function isExpired(task) {
        if (task.status === 'done') return false; // ✅ never expire done tasks
        const due = toLocalDueDate(task);
        return due < new Date();
    }

    function expiredBadge(task) {
        if (!isExpired(task)) return '';
        return `<span class="badge text-bg-danger pill ms-2">⛔ Expired</span>`;
    }

    function statusBadge(status) {
        const map = { pending:'secondary', ongoing:'info', done:'success' };
        const klass = map[status] ?? 'secondary';
        return `<span class="badge text-bg-${klass} pill text-uppercase">${status}</span>`;
    }

    function priorityBarClass(color) {
        const map = { red:'p-red', green:'p-green', blue:'p-blue', yellow:'p-yellow', purple:'p-purple' };
        return map[color] ?? 'p-blue';
    }

    async function api(url, method='GET', payload=null) {
        const opts = {
            method,
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf },
            credentials: 'same-origin'
        };
        if (payload) {
            opts.headers['Content-Type'] = 'application/json';
            opts.body = JSON.stringify(payload);
        }
        return fetch(url, opts);
    }

    function renderCards(tasks) {
        const grid = document.getElementById('taskGrid');
        const empty = document.getElementById('emptyState');

        if (!Array.isArray(tasks) || tasks.length === 0) {
            grid.innerHTML = '';
            empty.classList.remove('d-none');
            return;
        }
        empty.classList.add('d-none');

        grid.innerHTML = tasks.map((t, i) => `
            <div class="task-card ${isExpired(t) ? 'expired' : ''}" data-task-id="${t.id}" style="animation-delay:${i*70}ms">
                <div class="priority-bar ${priorityBarClass(t.priority_color)}"></div>

                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-start gap-2">
                        <div>
                            <div class="fw-semibold fs-5">
                                ${priorityEmoji(t.priority_color)} ${escapeHtml(t.title)}
                            </div>
                            ${t.description ? `<div class="muted-mini mt-1">${escapeHtml(t.description)}</div>` : ''}
                        </div>
                        <div id="statusBadge-${t.id}" class="d-flex align-items-center gap-1">
                             ${statusBadge(t.status)}
                            ${expiredBadge(t)}
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <span class="badge text-bg-light pill">
                            <i class="bi bi-calendar3 me-1"></i>${t.task_date ?? ''}
                        </span>
                        <span class="badge text-bg-light pill">
                            <i class="bi bi-clock me-1"></i>${t.task_time ?? '—'}
                        </span>
                        <span class="badge text-bg-light pill">
                            Priority: ${escapeHtml(t.priority_color)}
                        </span>
                        ${t.notify_at ? `<span class="badge text-bg-warning pill"><i class="bi bi-bell me-1"></i>Notify</span>` : ''}
                    </div>

                    <div class="d-flex justify-content-between align-items-center gap-2 mt-3">
                        <select class="form-select form-select-sm soft-input" onchange="updateStatus(${t.id}, this.value)">
                            <option value="pending" ${t.status === 'pending' ? 'selected' : ''}>pending</option>
                            <option value="ongoing" ${t.status === 'ongoing' ? 'selected' : ''}>ongoing</option>
                            <option value="done" ${t.status === 'done' ? 'selected' : ''}>done</option>
                        </select>

                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary" onclick='openEdit(${JSON.stringify(t)})'>
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteTask(${t.id})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    }

    async function loadTasks() {
        const res = await api('/api/tasks');
        const tasks = await res.json();
        renderCards(tasks);
    }

    function buildPayload(prefix) {
        const title = document.querySelector(`[name="${prefix}title"]`).value.trim();
        const description = document.querySelector(`[name="${prefix}description"]`).value.trim() || null;
        const task_date = document.querySelector(`[name="${prefix}task_date"]`).value;
        const task_time = document.querySelector(`[name="${prefix}task_time"]`).value || null;
        const priority_color = document.querySelector(`[name="${prefix}priority_color"]`).value;
        const status = document.querySelector(`[name="${prefix}status"]`).value;
        const notify_raw = document.querySelector(`[name="${prefix}notify_at"]`).value;

        return {
            title,
            description,
            task_date,
            task_time,
            priority_color,
            status,
            notify_at: notify_raw ? (notify_raw + ':00') : null // keep ISO
        };
    }

    async function createTask(payload) {
        const res = await api('/api/tasks', 'POST', payload);

        if (res.status === 403) {
            const data = await res.json();
            showAlert('warning', `${data.message} 💎`);
            return false;
        }

        if (!res.ok) {
            let msg = 'Failed to create task.';
            try {
                const data = await res.json();
                if (data?.message) msg = data.message;
                if (data?.errors) msg += '<br><small>' + Object.values(data.errors).flat().join('<br>') + '</small>';
            } catch(e) {}
            showAlert('danger', msg);
            return false;
        }

        showAlert('success', 'Task created ✅');
        return true;
    }

    async function updateTask(id, payload) {
        const res = await api(`/api/tasks/${id}`, 'PATCH', payload);

        if (!res.ok) {
            let msg = 'Failed to update task.';
            try {
                const data = await res.json();
                if (data?.message) msg = data.message;
                if (data?.errors) msg += '<br><small>' + Object.values(data.errors).flat().join('<br>') + '</small>';
            } catch(e) {}
            showAlert('danger', msg);
            return false;
        }

        showAlert('success', 'Task updated ✅');
        return true;
    }

    async function updateStatus(id, status) {
    // Optimistic UI: update badge immediately
    document.getElementById(`statusBadge-${id}`).innerHTML = statusBadge(status);

    const res = await api(`/api/tasks/${id}`, 'PATCH', { status });

    if (!res.ok) {
        showAlert('danger', 'Failed to update status.');
        // fallback: reload the list if something went wrong
        loadTasks();
        return;
    }

    // ✅ Auto-refresh from server to keep everything consistent
    loadTasks();
    }

    async function deleteTask(id) {
        const res = await api(`/api/tasks/${id}`, 'DELETE');
        if (res.ok) {
            showAlert('success', 'Task deleted 🗑️');
            loadTasks();
        } else {
            showAlert('danger', 'Failed to delete task.');
        }
    }

    function openEdit(task) {
        // store id
        document.getElementById('edit_id').value = task.id;

        // fill fields
        document.querySelector(`[name="e_title"]`).value = task.title ?? '';
        document.querySelector(`[name="e_description"]`).value = task.description ?? '';
        document.querySelector(`[name="e_task_date"]`).value = task.task_date ?? '';
        document.querySelector(`[name="e_task_time"]`).value = task.task_time ?? '';
        document.querySelector(`[name="e_priority_color"]`).value = task.priority_color ?? 'blue';
        document.querySelector(`[name="e_status"]`).value = task.status ?? 'pending';

        // notify_at: convert "YYYY-MM-DD HH:MM:SS" or ISO to datetime-local
        if (task.notify_at) {
            const v = String(task.notify_at).replace(' ', 'T').slice(0, 16);
            document.querySelector(`[name="e_notify_at"]`).value = v;
        } else {
            document.querySelector(`[name="e_notify_at"]`).value = '';
        }

        bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal')).show();
    }

    document.getElementById('createForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const payload = buildPayload('c_');
        const ok = await createTask(payload);
        if (ok) {
            e.target.reset();
            bootstrap.Modal.getOrCreateInstance(document.getElementById('createModal')).hide();
            loadTasks();
        }
    });

    document.getElementById('editForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const id = document.getElementById('edit_id').value;
        const payload = buildPayload('e_');
        const ok = await updateTask(id, payload);
        if (ok) {
            bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal')).hide();
            loadTasks();
        }
    });

    loadTasks();
</script>
@endsection