<nav x-data="{ open: false, notificationOpen: false }" class="bg-white border-b border-gray-100">
    @php
        $user = Auth::user()?->loadMissing('university');
        $role = $user->role ?? 'standard';
        $isAdmin = $role === 'admin';
        $isPremium = $role === 'premium';
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ $isAdmin ? route('admin.dashboard') : route('tasks.index') }}">
                        <img src="{{ asset('images/unitrack-logo.png') }}" alt="UniTrack Logo" class="block h-10 w-auto">
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    @if(!$isAdmin)
                        <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                            📝 My Tasks
                        </x-nav-link>

                        @if(!$isPremium)
                            <x-nav-link :href="route('payments.upgrade')" :active="request()->routeIs('payments.*')">
                                💎 Upgrade
                            </x-nav-link>
                        @else
                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gradient-to-r from-blue-600 via-purple-600 to-emerald-500 text-white text-sm font-semibold shadow">
                                💎 Premium
                                <span class="px-2 py-0.5 rounded-full bg-white/20 text-xs">Unlimited ✨</span>
                            </span>
                        @endif

                        <x-nav-link :href="route('feedback.create')" :active="request()->routeIs('feedback.*')">
                            Feedback ⭐
                        </x-nav-link>
                    @endif

                    @if($isAdmin)
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            🛡️ Admin Dashboard
                        </x-nav-link>

                        <x-nav-link :href="route('admin.payments.index')" :active="request()->routeIs('admin.payments.*')">
                            💳 Payments
                        </x-nav-link>

                        <x-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')">
                            📊 Reports
                        </x-nav-link>

                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                            👤 User Control
                        </x-nav-link>

                        <x-nav-link :href="route('admin.feedback.index')" :active="request()->routeIs('admin.feedback.*')">
                            ⭐ Feedback
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if(!$isAdmin)
                    <div class="relative mr-3">
                        <button id="notificationButton"
                            type="button"
                            @click="notificationOpen = !notificationOpen"
                            class="relative inline-flex h-10 w-10 items-center justify-center rounded-xl bg-white border border-gray-200 shadow-sm hover:bg-gray-50 transition">
                            🔔

                            <span id="notificationBadge"
                                class="hidden absolute -top-1 -right-1 min-w-[20px] h-5 px-1 rounded-full bg-red-500 text-white text-xs font-bold flex items-center justify-center">
                                0
                            </span>
                        </button>

                        <div x-show="notificationOpen"
                             @click.outside="notificationOpen = false"
                             x-transition
                             class="absolute right-0 mt-3 w-96 max-w-[90vw] rounded-2xl bg-white border border-gray-200 shadow-2xl z-50 overflow-hidden">
                            <div class="flex items-center justify-between px-4 py-3 border-b bg-slate-50">
                                <div>
                                    <div class="font-bold text-slate-900">Notifications 🔔</div>
                                    <div class="text-xs text-slate-500">Upcoming, due and expired tasks</div>
                                </div>

                                <button id="clearAllNotifications"
                                    type="button"
                                    class="text-xs px-3 py-1.5 rounded-full bg-red-50 text-red-600 hover:bg-red-100">
                                    Clear all
                                </button>
                            </div>

                            <div id="notificationList" class="max-h-96 overflow-y-auto divide-y divide-gray-100">
                                <div class="px-4 py-6 text-sm text-gray-500 text-center">
                                    Loading notifications...
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 transition">
                            <div class="leading-tight text-left">
                                <div>{{ $user->name }}</div>

                                @if(!$isAdmin && $user->university)
                                    <div class="text-xs text-gray-400">
                                        {{ $user->university->name }}
                                    </div>
                                @endif
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if(!$isAdmin)
                            <x-dropdown-link :href="route('profile.edit')">
                                👤 Profile
                            </x-dropdown-link>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                🚪 Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(!$isAdmin)
                <x-responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                    📝 My Tasks
                </x-responsive-nav-link>

                @if(!$isPremium)
                    <x-responsive-nav-link :href="route('payments.upgrade')" :active="request()->routeIs('payments.*')">
                        💎 Upgrade
                    </x-responsive-nav-link>
                @else
                    <div class="mx-3 my-2 px-4 py-3 rounded-2xl bg-gradient-to-r from-blue-600 via-purple-600 to-emerald-500 text-white shadow">
                        <div class="font-bold">💎 Premium Member</div>
                        <div class="text-sm opacity-90 mt-1">Unlimited tasks unlocked ✨</div>
                    </div>
                @endif

                <x-responsive-nav-link :href="route('feedback.create')" :active="request()->routeIs('feedback.*')">
                    Feedback ⭐
                </x-responsive-nav-link>
            @endif

            @if($isAdmin)
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    🛡️ Admin Dashboard
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.payments.index')" :active="request()->routeIs('admin.payments.*')">
                    💳 Payments
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')">
                    📊 Reports
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ $user->name }}</div>

                @if(!$isAdmin && $user->university)
                    <div class="font-medium text-sm text-gray-500">
                        🎓 {{ $user->university->name }}
                    </div>
                @endif

                <div class="font-medium text-sm text-gray-500">{{ $user->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                @if(!$isAdmin)
                    <x-responsive-nav-link :href="route('profile.edit')">
                        👤 Profile
                    </x-responsive-nav-link>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        🚪 Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>