<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UniTrack') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            @if (isset($slot))
                {{ $slot }}
            @else
                @yield('content')
            @endif
        </main>
    </div>

    <div id="notificationToastStack" class="fixed top-5 right-5 z-[9999] space-y-3"></div>

    <script>
        let shownNotifications = new Set();
        let currentNotifications = [];
        let readNotificationIds = new Set(
            JSON.parse(localStorage.getItem('unitrack_read_notifications') || '[]')
        );

        function csrfToken() {
            return document.querySelector('meta[name="csrf-token"]').content;
        }

        async function loadNotifications() {
            try {
                const res = await fetch('/api/notifications', {
                    headers: { 'Accept': 'application/json' }
                });

                const data = await res.json();
                const items = Array.isArray(data.items)
                    ? data.items.filter(item => item && item.id && item.title)
                    : [];

                currentNotifications = items;

                const unreadCount = items.filter(item => !readNotificationIds.has(item.id)).length;
                updateNotificationBadge(unreadCount);
                renderNotificationPanel(items);

                items.forEach(item => {
                    if (!shownNotifications.has(item.id) && !readNotificationIds.has(item.id)) {
                        showToast(item);
                        shownNotifications.add(item.id);
                    }
                });

            } catch (e) {
                console.error('Notification load failed:', e);
            }
        }

        function updateNotificationBadge(count) {
            const badge = document.getElementById('notificationBadge');
            if (!badge) return;

            badge.textContent = count;
            badge.classList.toggle('hidden', count === 0);
            badge.classList.toggle('d-none', count === 0);
        }

        function markCurrentNotificationsAsRead() {
            currentNotifications.forEach(item => readNotificationIds.add(item.id));

            localStorage.setItem(
                'unitrack_read_notifications',
                JSON.stringify([...readNotificationIds])
            );

            updateNotificationBadge(0);
        }

        function renderNotificationPanel(items) {
            const list = document.getElementById('notificationList');
            const clearAllBtn = document.getElementById('clearAllNotifications');

            if (!list) return;

            if (clearAllBtn) {
                clearAllBtn.classList.toggle('hidden', items.length === 0);
                clearAllBtn.classList.toggle('d-none', items.length === 0);
            }

            if (!items.length) {
                list.innerHTML = `
                    <div class="px-4 py-8 text-center">
                        <div class="text-3xl mb-2">✅</div>
                        <div class="font-semibold text-slate-700">No notifications</div>
                        <div class="text-sm text-slate-500 mt-1">You are all caught up.</div>
                    </div>
                `;
                return;
            }

            list.innerHTML = items.map(item => `
                <div class="notification-row px-4 py-3 hover:bg-slate-50 transition flex gap-3" data-id="${item.id}">
                    <div class="h-10 w-10 rounded-xl bg-slate-900 text-white flex items-center justify-center text-lg shrink-0">
                        ${item.icon ?? '🔔'}
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2">
                            <div class="font-bold text-sm text-slate-900 truncate">${escapeHtml(item.title)}</div>

                            <span class="text-[11px] px-2 py-1 rounded-full whitespace-nowrap ${item.badgeClass ?? ''}">
                                ${escapeHtml(item.badge ?? '')}
                            </span>
                        </div>

                        <div class="text-sm text-slate-600 mt-1 leading-snug">
                            ${escapeHtml(item.message ?? '')}
                        </div>

                        <div class="flex items-center justify-between mt-2">
                            <div class="text-xs text-slate-400">
                                ${escapeHtml(item.created_at ?? 'Just now')}
                            </div>

                            <button type="button"
                                onclick="clearNotification(${item.id})"
                                class="text-xs px-2 py-1 rounded-full bg-red-50 text-red-600 hover:bg-red-100 transition">
                                Clear ✕
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function showToast(item) {
            const stack = document.getElementById('notificationToastStack');
            if (!stack) return;

            const toast = document.createElement('div');

            toast.className =
                'w-80 rounded-2xl bg-white/90 backdrop-blur-xl border border-white/70 shadow-2xl p-4 flex gap-3 transform transition-all duration-300 translate-x-8 opacity-0';

            toast.innerHTML = `
                <div class="h-10 w-10 rounded-xl bg-slate-900 text-white flex items-center justify-center text-lg shrink-0">
                    ${item.icon ?? '🔔'}
                </div>

                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start gap-2">
                        <div class="font-bold text-sm text-slate-900 truncate">${escapeHtml(item.title)}</div>
                        <span class="text-xs px-2 py-1 rounded-full whitespace-nowrap ${item.badgeClass ?? ''}">
                            ${escapeHtml(item.badge ?? '')}
                        </span>
                    </div>

                    <div class="text-sm text-gray-600 mt-1 leading-snug">
                        ${escapeHtml(item.message ?? '')}
                    </div>
                </div>
            `;

            stack.appendChild(toast);

            setTimeout(() => {
                toast.classList.remove('translate-x-8', 'opacity-0');
                toast.classList.add('translate-x-0', 'opacity-100');
            }, 50);

            setTimeout(() => {
                toast.classList.add('translate-x-8', 'opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }

        async function clearNotification(id) {
            try {
                await fetch('/api/notifications/clear', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken()
                    },
                    body: JSON.stringify({ id })
                });

                shownNotifications.delete(id);
                readNotificationIds.delete(id);

                localStorage.setItem(
                    'unitrack_read_notifications',
                    JSON.stringify([...readNotificationIds])
                );

                await loadNotifications();

            } catch (e) {
                console.error('Clear notification failed:', e);
            }
        }

        async function clearAllNotifications() {
            try {
                await fetch('/api/notifications/clear-all', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken()
                    }
                });

                shownNotifications.clear();
                readNotificationIds.clear();
                localStorage.removeItem('unitrack_read_notifications');

                await loadNotifications();

            } catch (e) {
                console.error('Clear all notifications failed:', e);
            }
        }

        function escapeHtml(value) {
            return String(value ?? '')
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadNotifications();
            setInterval(loadNotifications, 5000);

            const notificationButton = document.getElementById('notificationButton');
            if (notificationButton) {
                notificationButton.addEventListener('click', markCurrentNotificationsAsRead);
            }

            const clearAllBtn = document.getElementById('clearAllNotifications');
            if (clearAllBtn) {
                clearAllBtn.addEventListener('click', clearAllNotifications);
            }
        });
    </script>
</body>
</html>