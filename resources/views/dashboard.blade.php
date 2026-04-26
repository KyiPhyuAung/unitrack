<x-app-layout>
    @php
        $user = Auth::user();
        $role = $user->role ?? 'standard';
        $isAdmin = $role === 'admin';
        $isPremium = $role === 'premium';
    @endphp

    @if($isAdmin)
        <script>window.location.href = "{{ route('admin.dashboard') }}";</script>
    @endif

    <div class="min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-slate-50 via-white to-sky-50"></div>
        <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-blue-300/30 blur-3xl -z-10"></div>
        <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-purple-300/25 blur-3xl -z-10"></div>
        <div class="absolute -bottom-24 left-1/3 h-72 w-72 rounded-full bg-emerald-300/20 blur-3xl -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">
                        Welcome back, {{ $user->name }} 👋
                    </h1>

                    <p class="text-slate-600 mt-1">
                        Plan • Prioritize • Finish ✅

                        @if($isPremium)
                            <span class="ml-2 inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-blue-600 via-purple-600 to-emerald-500 text-white shadow">
                                💎 Premium <span class="px-2 py-0.5 rounded-full bg-white/20">Unlimited ✨</span>
                            </span>
                        @else
                            <span class="ml-2 inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-slate-900 text-white shadow">
                                ✅ Standard
                            </span>
                        @endif
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('tasks.index') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-slate-900 text-white font-semibold shadow hover:shadow-lg transition hover:-translate-y-0.5">
                        📝 Open Tasks
                    </a>

                    @if(!$isPremium)
                        <a href="{{ route('payments.upgrade') }}"
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-gradient-to-r from-blue-600 via-purple-600 to-emerald-500 text-white font-semibold shadow hover:shadow-lg transition hover:-translate-y-0.5">
                            💎 Upgrade
                        </a>
                    @endif
                </div>
            </div>

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

            <div class="mt-10 grid lg:grid-cols-2 gap-6 items-start">
                <div class="rounded-3xl bg-white/85 border border-white shadow p-6">
                    <div class="flex items-center justify-between">
                        <div class="font-extrabold text-xl text-slate-900">Your UniTrack Space ✨</div>
                        <span class="text-xs px-3 py-1 rounded-full bg-slate-900 text-white">Logged in</span>
                    </div>

                    <p class="text-slate-600 mt-3 leading-relaxed">
                        Here’s your student dashboard. Use <b>My Tasks 📝</b> to create and manage tasks,
                        and UniTrack will alert you when something becomes <b>Expired ⏳</b> or when your
                        <b>Notify time 🔔</b> hits.
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

    <script>
        const previewBox = document.getElementById('previewBox');

        async function fetchPreview() {
            try {
                const res = await fetch('/api/tasks/preview', {
                    credentials: 'same-origin',
                    headers: { 'Accept': 'application/json' }
                });

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
            } catch (e) {
                console.error(e);
            }
        }

        function escapeHtml(str) {
            return String(str ?? '')
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        }

        fetchPreview();
        setInterval(fetchPreview, 30000);
    </script>
</x-app-layout>