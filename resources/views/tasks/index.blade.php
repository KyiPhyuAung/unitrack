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

    .task-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 40px rgba(0,0,0,.10);
    }

    .priority-bar { height: 6px; }
    .p-red { background: #dc3545; }
    .p-green { background: #198754; }
    .p-blue { background: #0d6efd; }
    .p-yellow { background: #ffc107; }
    .p-purple { background: #6f42c1; }

    .pill { border-radius: 999px; padding: .35rem .6rem; font-size: .78rem; }
    .muted-mini { font-size: .88rem; color: #6c757d; }
    .soft-input { border-radius: 14px; }

    .filter-panel {
        background: rgba(255,255,255,.85);
        border: 1px solid rgba(0,0,0,.06);
        border-radius: 18px;
        padding: 14px;
        box-shadow: 0 12px 30px rgba(0,0,0,.06);
    }

    .filter-btn.active {
        background-color: #111827 !important;
        color: white !important;
        border-color: #111827 !important;
    }

    .notification-panel {
        position: absolute;
        right: 0;
        top: 48px;
        width: 380px;
        max-width: 90vw;
        background: rgba(255,255,255,.95);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(0,0,0,.08);
        border-radius: 18px;
        box-shadow: 0 20px 60px rgba(0,0,0,.18);
        z-index: 9999;
        overflow: hidden;
    }

    .notification-toast-stack {
        position: fixed;
        top: 18px;
        right: 18px;
        z-index: 99999;
        display: grid;
        gap: 10px;
    }

    .notification-toast {
        width: 320px;
        background: rgba(255,255,255,.94);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(255,255,255,.7);
        border-radius: 18px;
        box-shadow: 0 20px 50px rgba(0,0,0,.18);
        padding: 14px;
        display: flex;
        gap: 12px;
        transform: translateX(30px);
        opacity: 0;
        transition: all .25s ease;
    }

    .notification-toast.show {
        transform: translateX(0);
        opacity: 1;
    }
</style>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <div>
        <h3 class="mb-0">My Tasks ✅</h3>
        <div class="text-muted">Plan • Prioritize • Finish 🎯✨</div>
    </div>

    <div class="d-flex align-items-center gap-2 position-relative">
        <button id="notificationButton" type="button" class="btn btn-light position-relative rounded-3 shadow-sm">
            🔔
            <span id="notificationBadge"
                class="d-none position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                0
            </span>
        </button>

        <div id="notificationPanel" class="notification-panel d-none">
            <div class="d-flex justify-content-between align-items-center px-3 py-3 border-bottom bg-light">
                <div>
                    <div class="fw-bold">Notifications 🔔</div>
                    <div class="small text-muted">Upcoming, due and expired tasks</div>
                </div>

                <button id="clearAllNotifications" type="button" class="btn btn-sm btn-outline-danger rounded-pill">
                    Clear all
                </button>
            </div>

            <div id="notificationList" style="max-height: 360px; overflow-y: auto;">
                <div class="text-center text-muted py-4">Loading...</div>
            </div>
        </div>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus-lg me-1"></i> New Task
        </button>
    </div>
</div>

<div class="filter-panel mb-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
            <div class="fw-bold mb-2">Status Filter</div>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-sm btn-dark filter-btn active" data-filter-group="status" onclick="setStatusFilter('all', this)">All</button>
                <button class="btn btn-sm btn-outline-dark filter-btn" data-filter-group="status" onclick="setStatusFilter('pending', this)">Pending</button>
                <button class="btn btn-sm btn-outline-dark filter-btn" data-filter-group="status" onclick="setStatusFilter('ongoing', this)">Ongoing</button>
                <button class="btn btn-sm btn-outline-dark filter-btn" data-filter-group="status" onclick="setStatusFilter('done', this)">Done</button>
            </div>
        </div>

        <div>
            <div class="fw-bold mb-2">Smart View</div>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-sm btn-dark filter-btn active" data-filter-group="date" onclick="setDateFilter('all', this)">All Dates</button>
                <button class="btn btn-sm btn-outline-dark filter-btn" data-filter-group="date" onclick="setDateFilter('today', this)">Today</button>
                <button class="btn btn-sm btn-outline-dark filter-btn" data-filter-group="date" onclick="setDateFilter('upcoming', this)">Upcoming</button>
            </div>
        </div>

        <div>
            <div class="fw-bold mb-2">Priority Sort</div>
            <button id="prioritySortBtn" class="btn btn-sm btn-outline-danger rounded-pill" onclick="togglePrioritySort()">
                🔴 Priority First: Off
            </button>
        </div>
    </div>
</div>

<div id="notificationToastStack" class="notification-toast-stack"></div>

<div id="alertBox" class="mb-3"></div>

<div id="emptyState" class="card card-soft d-none">
    <div class="card-body text-center py-5">
        <div class="display-6">🗓️</div>
        <h5 class="mt-2 mb-1">No tasks found</h5>
        <div class="text-muted">Try changing the filters or create a new task ✨</div>
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Create Task 🚀
        </button>
    </div>
</div>

<div id="taskGrid" class="task-grid"></div>

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

let shownNotifications = new Set();
let allTasks = [];
let currentStatusFilter = 'all';
let currentDateFilter = 'all';
let prioritySortEnabled = false;

function showAlert(type, message) {
    document.getElementById('alertBox').innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;
}

function escapeHtml(str) {
    return String(str ?? '')
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#039;');
}

function priorityEmoji(color) {
    return { red:'🔴', yellow:'🟡', purple:'🟣', blue:'🔵', green:'🟢' }[color] ?? '🔵';
}

function priorityRank(color) {
    return { red: 1, yellow: 2, purple: 3, blue: 4, green: 5 }[color] ?? 99;
}

function toLocalDueDate(task) {
    if (!task.task_date) return null;
    const time = task.task_time ? String(task.task_time).slice(0, 5) : '23:59';
    return new Date(`${task.task_date}T${time}`);
}

function isToday(task) {
    if (!task.task_date) return false;

    const today = new Date();
    const y = today.getFullYear();
    const m = String(today.getMonth() + 1).padStart(2, '0');
    const d = String(today.getDate()).padStart(2, '0');

    return task.task_date === `${y}-${m}-${d}`;
}

function isUpcoming(task) {
    if (!task.task_date) return false;

    const due = toLocalDueDate(task);
    if (!due) return false;

    const now = new Date();
    return due > now && !isToday(task);
}

function isExpired(task) {
    if (task.status === 'done') return false;
    const due = toLocalDueDate(task);
    return due ? due < new Date() : false;
}

function expiredBadge(task) {
    if (!isExpired(task)) return '';
    return `<span class="badge text-bg-danger pill ms-2">⛔ Expired</span>`;
}

function statusBadge(status) {
    const map = { pending:'secondary', ongoing:'info', done:'success' };
    return `<span class="badge text-bg-${map[status] ?? 'secondary'} pill text-uppercase">${status}</span>`;
}

function priorityBarClass(color) {
    return { red:'p-red', yellow:'p-yellow', purple:'p-purple', blue:'p-blue', green:'p-green' }[color] ?? 'p-blue';
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

function formatDateTimeForServer(raw) {
    if (!raw) return null;
    return raw.replace('T', ' ') + ':00';
}

function formatDateTimeForInput(value) {
    if (!value) return '';
    return String(value).replace(' ', 'T').slice(0, 16);
}

function setActiveFilterButton(group, btn) {
    document.querySelectorAll(`[data-filter-group="${group}"]`).forEach(b => {
        b.classList.remove('active', 'btn-dark');
        b.classList.add('btn-outline-dark');
    });

    btn.classList.add('active', 'btn-dark');
    btn.classList.remove('btn-outline-dark');
}

function setStatusFilter(status, btn) {
    currentStatusFilter = status;
    setActiveFilterButton('status', btn);
    applyFilters();
}

function setDateFilter(filter, btn) {
    currentDateFilter = filter;
    setActiveFilterButton('date', btn);
    applyFilters();
}

function togglePrioritySort() {
    prioritySortEnabled = !prioritySortEnabled;

    const btn = document.getElementById('prioritySortBtn');

    if (prioritySortEnabled) {
        btn.classList.remove('btn-outline-danger');
        btn.classList.add('btn-danger');
        btn.innerText = '🔴 Priority First: On';
    } else {
        btn.classList.remove('btn-danger');
        btn.classList.add('btn-outline-danger');
        btn.innerText = '🔴 Priority First: Off';
    }

    applyFilters();
}

function applyFilters() {
    let filtered = [...allTasks];

    if (currentStatusFilter !== 'all') {
        filtered = filtered.filter(task => task.status === currentStatusFilter);
    }

    if (currentDateFilter === 'today') {
        filtered = filtered.filter(task => isToday(task));
    }

    if (currentDateFilter === 'upcoming') {
        filtered = filtered.filter(task => isUpcoming(task));
    }

    if (prioritySortEnabled) {
        filtered.sort((a, b) => {
            const p = priorityRank(a.priority_color) - priorityRank(b.priority_color);
            if (p !== 0) return p;

            const da = toLocalDueDate(a)?.getTime() ?? Number.MAX_SAFE_INTEGER;
            const db = toLocalDueDate(b)?.getTime() ?? Number.MAX_SAFE_INTEGER;

            return da - db;
        });
    }

    renderCards(filtered);
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
                    <span class="badge text-bg-light pill"><i class="bi bi-calendar3 me-1"></i>${t.task_date ?? ''}</span>
                    <span class="badge text-bg-light pill"><i class="bi bi-clock me-1"></i>${t.task_time ?? '—'}</span>
                    <span class="badge text-bg-light pill">Priority: ${escapeHtml(t.priority_color)}</span>
                    ${t.notify_at ? `<span class="badge text-bg-warning pill"><i class="bi bi-bell me-1"></i>Notify</span>` : ''}
                    ${isToday(t) ? `<span class="badge text-bg-primary pill">Today</span>` : ''}
                    ${isUpcoming(t) ? `<span class="badge text-bg-info pill">Upcoming</span>` : ''}
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

    allTasks = Array.isArray(tasks) ? tasks : [];
    applyFilters();
}

function buildPayload(prefix) {
    const notifyRaw = document.querySelector(`[name="${prefix}notify_at"]`).value;

    return {
        title: document.querySelector(`[name="${prefix}title"]`).value.trim(),
        description: document.querySelector(`[name="${prefix}description"]`).value.trim() || null,
        task_date: document.querySelector(`[name="${prefix}task_date"]`).value,
        task_time: document.querySelector(`[name="${prefix}task_time"]`).value || null,
        priority_color: document.querySelector(`[name="${prefix}priority_color"]`).value,
        status: document.querySelector(`[name="${prefix}status"]`).value,
        notify_at: formatDateTimeForServer(notifyRaw)
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

function makeTaskNotificationNewAgain(id) {
    let read = JSON.parse(localStorage.getItem('unitrack_read_notifications') || '[]');
    read = read.filter(readId => Number(readId) !== Number(id));
    localStorage.setItem('unitrack_read_notifications', JSON.stringify(read));
    shownNotifications.delete(Number(id));
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
    document.getElementById(`statusBadge-${id}`).innerHTML = statusBadge(status);

    const res = await api(`/api/tasks/${id}`, 'PATCH', { status });

    if (!res.ok) {
        showAlert('danger', 'Failed to update status.');
        await loadTasks();
        return;
    }

    await loadTasks();
    await loadNotifications();
}

async function deleteTask(id) {
    const res = await api(`/api/tasks/${id}`, 'DELETE');

    if (res.ok) {
        showAlert('success', 'Task deleted 🗑️');
        await loadTasks();
        await loadNotifications();
    } else {
        showAlert('danger', 'Failed to delete task.');
    }
}

function openEdit(task) {
    document.getElementById('edit_id').value = task.id;

    document.querySelector(`[name="e_title"]`).value = task.title ?? '';
    document.querySelector(`[name="e_description"]`).value = task.description ?? '';
    document.querySelector(`[name="e_task_date"]`).value = task.task_date ?? '';
    document.querySelector(`[name="e_task_time"]`).value = task.task_time ? String(task.task_time).slice(0, 5) : '';
    document.querySelector(`[name="e_priority_color"]`).value = task.priority_color ?? 'blue';
    document.querySelector(`[name="e_status"]`).value = task.status ?? 'pending';
    document.querySelector(`[name="e_notify_at"]`).value = formatDateTimeForInput(task.notify_at);

    bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal')).show();
}

async function loadNotifications() {
    try {
        const res = await api('/api/notifications');
        const data = await res.json();
        const items = Array.isArray(data.items) ? data.items.filter(i => i && i.id && i.title) : [];

        const badge = document.getElementById('notificationBadge');
        if (badge) {
            badge.textContent = items.length;
            badge.classList.toggle('d-none', items.length === 0);
        }

        renderNotificationList(items);

        items.forEach(item => {
            if (!shownNotifications.has(item.id)) {
                showNotificationToast(item);
                shownNotifications.add(item.id);
            }
        });
    } catch (e) {
        console.error('Notification load failed:', e);
    }
}

function renderNotificationList(items) {
    const list = document.getElementById('notificationList');
    const clearAllBtn = document.getElementById('clearAllNotifications');

    if (!list) return;

    if (clearAllBtn) clearAllBtn.classList.toggle('d-none', items.length === 0);

    if (!items.length) {
        list.innerHTML = `
            <div class="text-center py-4">
                <div class="fs-3">✅</div>
                <div class="fw-semibold">No notifications</div>
                <div class="small text-muted">You are all caught up.</div>
            </div>
        `;
        return;
    }

    list.innerHTML = items.map(item => `
        <div class="p-3 border-bottom">
            <div class="d-flex gap-2">
                <div class="rounded-3 bg-dark text-white d-flex align-items-center justify-content-center" style="height:40px;width:40px;">
                    ${item.icon ?? '🔔'}
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between gap-2">
                        <div class="fw-bold small">${escapeHtml(item.title)}</div>
                        <span class="badge ${escapeHtml(item.badgeClass ?? '')}">${escapeHtml(item.badge ?? '')}</span>
                    </div>
                    <div class="small text-muted mt-1">${escapeHtml(item.message ?? '')}</div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="small text-muted">${escapeHtml(item.created_at ?? 'Just now')}</span>
                        <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="clearNotification(${item.id})">
                            Clear ✕
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `).join('');
}

function showNotificationToast(item) {
    const stack = document.getElementById('notificationToastStack');
    if (!stack) return;

    const toast = document.createElement('div');
    toast.className = 'notification-toast';

    toast.innerHTML = `
        <div class="rounded-3 bg-dark text-white d-flex align-items-center justify-content-center" style="height:40px;width:40px;">
            ${item.icon ?? '🔔'}
        </div>
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between gap-2">
                <div class="fw-bold small">${escapeHtml(item.title)}</div>
                <span class="badge ${escapeHtml(item.badgeClass ?? '')}">${escapeHtml(item.badge ?? '')}</span>
            </div>
            <div class="small text-muted mt-1">${escapeHtml(item.message ?? '')}</div>
        </div>
    `;

    stack.appendChild(toast);

    setTimeout(() => toast.classList.add('show'), 50);

    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

async function clearNotification(id) {
    await api('/api/notifications/clear', 'POST', { id });
    shownNotifications.delete(id);
    await loadNotifications();
}

async function clearAllNotifications() {
    await api('/api/notifications/clear-all', 'POST');
    shownNotifications.clear();
    await loadNotifications();
}

document.getElementById('notificationButton')?.addEventListener('click', () => {
    document.getElementById('notificationPanel')?.classList.toggle('d-none');
});

document.addEventListener('click', (e) => {
    const panel = document.getElementById('notificationPanel');
    const btn = document.getElementById('notificationButton');

    if (panel && btn && !panel.contains(e.target) && !btn.contains(e.target)) {
        panel.classList.add('d-none');
    }
});

document.getElementById('clearAllNotifications')?.addEventListener('click', clearAllNotifications);

document.getElementById('createForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const ok = await createTask(buildPayload('c_'));

    if (ok) {
        e.target.reset();
        bootstrap.Modal.getOrCreateInstance(document.getElementById('createModal')).hide();
        await loadTasks();
        await loadNotifications();
    }
});

document.getElementById('editForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const id = document.getElementById('edit_id').value;
    const ok = await updateTask(id, buildPayload('e_'));

    if (ok) {
        makeTaskNotificationNewAgain(id);
        bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal')).hide();
        await loadTasks();
        await loadNotifications();
    }
});

loadTasks();
loadNotifications();
setInterval(loadNotifications, 30000);
</script>
@endsection