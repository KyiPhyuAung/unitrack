<x-app-layout>
    @php
        $user = Auth::user();
        $role = $user->role ?? 'standard';
        $isAdmin = $role === 'admin';
        $isPremium = $role === 'premium';
    @endphp

    {{-- If admin lands here by mistake, send them to admin dashboard --}}
    @if($isAdmin)
        <script>window.location.href = "{{ route('admin.dashboard') }}";</script>
    @endif

    <div class="min-h-screen relative overflow-hidden">
        {{-- soft gradient background --}}
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-slate-50 via-white to-sky-50"></div>
        <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-blue-300/30 blur-3xl -z-10"></div>
        <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-purple-300/25 blur-3xl -z-10"></div>
        <div class="absolute -bottom-24 left-1/3 h-72 w-72 rounded-full bg-emerald-300/20 blur-3xl -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{-- Header --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">
                        Welcome back, {{ $user->name }} 👋
                    </h1>
                    <p class="text-slate-600 mt-1">
                        Plan • Prioritize • Finish ✅
                        @if($isPremium)
                            <span class="ml-2 inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold
                                         bg-gradient-to-r from-blue-600 via-purple-600 to-emerald-500 text-white shadow">
                                💎 Premium <span class="px-2 py-0.5 rounded-full bg-white/20">Unlimited ✨</span>
                            </span>
                        @else
                            <span class="ml-2 inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold
                                         bg-slate-900 text-white shadow">
                                ✅ Standard
                            </span>
                        @endif
                    </p>
                </div>

                {{-- Right actions --}}
                <div class="flex items-center gap-3">
                    {{-- Notification bell --}}
                    <button id="notifyBtn"
                            class="relative group inline-flex items-center justify-center h-11 w-11 rounded-2xl
                                   bg-white/80 border border-slate-200 shadow-sm hover:shadow transition">
                        <span class="text-xl">🔔</span>

                        {{-- badge --}}
                        <span id="notifyBadge"
                              class="hidden absolute -top-1 -right-1 min-w-[20px] h-5 px-1.5 rounded-full
                                     bg-red-600 text-white text-xs font-bold flex items-center justify-center">
                            0
                        </span>

                        <span class="absolute inset-0 rounded-2xl ring-0 group-hover:ring-4 ring-blue-200/40 transition"></span>
                    </button>

                    <a href="{{ route('tasks.index') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl
                              bg-slate-900 text-white font-semibold shadow hover:shadow-lg transition hover:-translate-y-0.5">
                        📝 Open Tasks
                    </a>

                    @if(!$isPremium)
                        <a href="{{ route('payments.upgrade') }}"
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl
                                  bg-gradient-to-r from-blue-600 via-purple-600 to-emerald-500 text-white
                                  font-semibold shadow hover:shadow-lg transition hover:-translate-y-0.5">
                            💎 Upgrade
                        </a>
                    @endif
                </div>
            </div>

            {{-- Stats cards --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
                <div class="rounded-3xl bg-white/80 border border-white shadow p-5 hover:-translate-y-0.5 transition">
                    <div class="text-sm text-slate-500">Today</div>
                    <div class="mt-2 text-2xl font-extrabold text-slate-900">📅 Focus</div>
                    <div class="text-slate-600 mt-1 text-sm">See what’s urgent first</div>
                </div>
                <div class="rounded-3xl bg-white/80 border border-white shadow p-5 hover:-translate-y-0.5 transition">
                    <div class="text-sm text-slate-500">Reminders</div>
                    <div class="mt-2 text-2xl font-extrabold text-slate-900">🔔 Smart</div>
                    <div class="text-slate-600 mt-1 text-sm">Email when notify time arrives</div>
                </div>
                <div class="rounded-3xl bg-white/80 border border-white shadow p-5 hover:-translate-y-0.5 transition">
                    <div class="text-sm text-slate-500">Status</div>
                    <div class="mt-2 text-2xl font-extrabold text-slate-900">✅ Simple</div>
                    <div class="text-slate-600 mt-1 text-sm">Pending → Ongoing → Done</div>
                </div>
                <div class="rounded-3xl bg-white/80 border border-white shadow p-5 hover:-translate-y-0.5 transition">
                    <div class="text-sm text-slate-500">Risk</div>
                    <div class="mt-2 text-2xl font-extrabold text-slate-900">⏳ Expired</div>
                    <div class="text-slate-600 mt-1 text-sm">We warn you if you miss due time</div>
                </div>
            </div>

            {{-- Notification panel --}}
            <div id="notifyPanel"
                 class="hidden mt-6 rounded-3xl bg-white/90 border border-white shadow overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                    <div class="font-extrabold text-slate-900">Notifications 🔔</div>
                    <button id="notifyClose" class="text-slate-500 hover:text-slate-900">✖</button>
                </div>
                <div id="notifyList" class="p-4 space-y-3">
                    <div class="text-slate-500 text-sm">Loading…</div>
                </div>
            </div>

            {{-- Logged-in website view --}}
            <div class="mt-10 grid lg:grid-cols-2 gap-6 items-start">
                {{-- Left: student homepage style --}}
                <div class="rounded-3xl bg-white/85 border border-white shadow p-6">
                    <div class="flex items-center justify-between">
                        <div class="font-extrabold text-xl text-slate-900">Your UniTrack Space ✨</div>
                        <span class="text-xs px-3 py-1 rounded-full bg-slate-900 text-white">Logged in</span>
                    </div>

                    <p class="text-slate-600 mt-3 leading-relaxed">
                        Here’s your student dashboard. Use <b>My Tasks 📝</b> to create and manage tasks,
                        and we’ll alert you when something becomes <b>Expired ⏳</b> or when your <b>Notify time 🔔</b> hits.
                    </p>

                    <div class="mt-5 grid sm:grid-cols-2 gap-3">
                        <a href="{{ route('tasks.index') }}"
                           class="rounded-2xl p-4 bg-slate-900 text-white shadow hover:shadow-lg transition hover:-translate-y-0.5">
                            <div class="font-bold">📝 Task Cards</div>
                            <div class="text-sm opacity-90 mt-1">Create • Edit • Status</div>
                        </a>
                        <a href="{{ route('profile.edit') }}"
                           class="rounded-2xl p-4 bg-white border border-slate-200 hover:shadow transition hover:-translate-y-0.5">
                            <div class="font-bold">👤 Profile</div>
                            <div class="text-sm text-slate-600 mt-1">University • Email</div>
                        </a>
                    </div>
                </div>

                {{-- Right: preview card like welcome --}}
                <div class="rounded-3xl bg-white/85 border border-white shadow p-6">
                    <div class="font-extrabold text-xl text-slate-900">Quick Preview ✅</div>
                    <div class="text-slate-600 mt-2">This updates from your real tasks automatically.</div>

                    <div id="previewBox" class="mt-5 space-y-3">
                        <div class="text-slate-500 text-sm">Loading preview…</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast popup --}}
    <div id="toast"
         class="hidden fixed bottom-6 right-6 z-50 rounded-2xl px-4 py-3 shadow-lg border border-white
                bg-slate-900 text-white">
        <div id="toastText" class="text-sm font-semibold">Notification</div>
    </div>

    <script>
        const notifyBtn = document.getElementById('notifyBtn');
        const notifyPanel = document.getElementById('notifyPanel');
        const notifyClose = document.getElementById('notifyClose');
        const notifyBadge = document.getElementById('notifyBadge');
        const notifyList = document.getElementById('notifyList');
        const toast = document.getElementById('toast');
        const toastText = document.getElementById('toastText');
        const previewBox = document.getElementById('previewBox');

        function showToast(msg) {
            toastText.textContent = msg;
            toast.classList.remove('hidden');
            setTimeout(() => toast.classList.add('hidden'), 2800);
        }

        notifyBtn?.addEventListener('click', () => {
            notifyPanel.classList.toggle('hidden');
        });
        notifyClose?.addEventListener('click', () => notifyPanel.classList.add('hidden'));

        async function fetchNotifications() {
            const res = await fetch('/api/notifications', { credentials: 'same-origin' });
            if (!res.ok) return;
            const data = await res.json();

            const count = (data?.count ?? 0);
            if (count > 0) {
                notifyBadge.textContent = count;
                notifyBadge.classList.remove('hidden');
            } else {
                notifyBadge.classList.add('hidden');
            }

            // list
            const items = data?.items ?? [];
            if (items.length === 0) {
                notifyList.innerHTML = `<div class="text-slate-500 text-sm">No notifications 🎉</div>`;
            } else {
                notifyList.innerHTML = items.map(n => `
                    <div class="rounded-2xl border border-slate-100 bg-white p-4 hover:shadow transition">
                        <div class="flex items-center justify-between gap-3">
                            <div class="font-bold text-slate-900">${n.icon} ${escapeHtml(n.title)}</div>
                            <span class="text-xs px-2 py-1 rounded-full ${n.badgeClass}">
                                ${escapeHtml(n.badge)}
                            </span>
                        </div>
                        <div class="text-slate-600 text-sm mt-1">${escapeHtml(n.message)}</div>
                    </div>
                `).join('');
            }

            // popup toast only when something exists
            if (count > 0) {
                showToast(`🔔 You have ${count} alert(s).`);
            }
        }

        async function fetchPreview() {
            const res = await fetch('/api/tasks/preview', { credentials: 'same-origin' });
            if (!res.ok) return;
            const tasks = await res.json();

            if (!Array.isArray(tasks) || tasks.length === 0) {
                previewBox.innerHTML = `<div class="text-slate-500 text-sm">No tasks yet. Create one ✨</div>`;
                return;
            }

            previewBox.innerHTML = tasks.map(t => `
                <div class="rounded-2xl bg-white border border-slate-100 p-4 hover:shadow transition">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <div class="font-bold text-slate-900">${escapeHtml(t.title)}</div>
                            <div class="text-sm text-slate-600 mt-1">${escapeHtml(t.meta)}</div>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full ${t.badgeClass}">
                            ${escapeHtml(t.badge)}
                        </span>
                    </div>
                </div>
            `).join('');
        }

        function escapeHtml(str) {
            return String(str ?? '')
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        }

        // initial load
        fetchNotifications();
        fetchPreview();

        // auto refresh
        setInterval(fetchNotifications, 20000);
        setInterval(fetchPreview, 30000);
    </script>
</x-app-layout>