<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — {{ config('app.name','UniTrack') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root { --glass: rgba(255,255,255,.76); }
        body { font-family: "Instrument Sans", system-ui, -apple-system, Segoe UI, Roboto, sans-serif; }

        .bg-aurora {
            background:
                radial-gradient(1200px 600px at 15% 10%, rgba(59,130,246,.26), transparent 60%),
                radial-gradient(900px 500px at 90% 15%, rgba(168,85,247,.24), transparent 55%),
                radial-gradient(900px 500px at 30% 95%, rgba(34,197,94,.20), transparent 55%),
                linear-gradient(180deg, #f8fafc 0%, #f1f5f9 55%, #ffffff 100%);
            position: relative;
            overflow-x: hidden;
        }

        .noise{
            position:absolute; inset:0;
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='180' height='180'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='180' height='180' filter='url(%23n)' opacity='.06'/%3E%3C/svg%3E");
            pointer-events:none; mix-blend-mode:soft-light;
        }
        .blob{ position:absolute; filter: blur(44px); opacity:.5; animation: floaty 12s ease-in-out infinite; pointer-events:none; }
        .blob.b1{ width:440px;height:440px;background:#60a5fa; top:-170px; left:-170px; }
        .blob.b2{ width:380px;height:380px;background:#a78bfa; top:-170px; right:-170px; animation-duration:14s; }
        .blob.b3{ width:500px;height:500px;background:#34d399; bottom:-240px; left:10%; animation-duration:16s; }
        @keyframes floaty { 0%,100%{transform:translate(0,0) scale(1)} 50%{transform:translate(18px,28px) scale(1.05)} }

        .glass{
            background: var(--glass);
            border: 1px solid rgba(255,255,255,.58);
            box-shadow: 0 22px 70px rgba(15, 23, 42, .10);
            backdrop-filter: blur(14px);
        }

        .divider { height: 1px; background: linear-gradient(90deg, transparent, rgba(2,6,23,.12), transparent); }

        .reveal { opacity:0; transform: translateY(12px); transition: opacity .7s ease, transform .7s ease; }
        .reveal.show { opacity:1; transform: translateY(0); }

        .navlink{ position:relative; }
        .navlink:after{
            content:""; position:absolute; left:0; bottom:-8px; width:0; height:2px;
            background: linear-gradient(90deg, #3b82f6, #a855f7, #22c55e);
            transition: width .25s ease;
        }
        .navlink:hover:after{ width:100%; }

        .pill{
            display:inline-flex; align-items:center; gap:.5rem;
            padding:.35rem .65rem; border-radius:999px;
            background: rgba(2,6,23,.06);
            border: 1px solid rgba(2,6,23,.08);
        }
    </style>

    @stack('head')
</head>

<body class="bg-aurora min-h-screen text-slate-900">
<div class="blob b1"></div><div class="blob b2"></div><div class="blob b3"></div><div class="noise"></div>

<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-[280px] hidden lg:block p-4">
        <div class="glass rounded-3xl p-4 h-[calc(100vh-2rem)] sticky top-4 overflow-hidden">
            {{-- ✅ Admin logo should go to admin dashboard, NOT user dashboard --}}
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="h-11 w-11 rounded-2xl bg-slate-900 text-white flex items-center justify-center">✅</div>
                <div class="leading-tight">
                    <div class="font-extrabold">{{ config('app.name','UniTrack') }}</div>
                    <div class="text-xs text-slate-500 -mt-0.5">Admin • Control Center 🧠</div>
                </div>
            </a>

            <div class="divider my-4"></div>

            <nav class="space-y-2 text-sm">
                <a class="block px-3 py-2 rounded-2xl hover:bg-white/60 transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/70' : '' }}"
                   href="{{ route('admin.dashboard') }}">🏠 Admin Dashboard</a>

                <a class="block px-3 py-2 rounded-2xl hover:bg-white/60 transition {{ request()->routeIs('admin.payments.*') ? 'bg-white/70' : '' }}"
                   href="{{ route('admin.payments.index') }}">✅ Payment Approvals</a>

                <a class="block px-3 py-2 rounded-2xl hover:bg-white/60 transition {{ request()->routeIs('admin.reports') ? 'bg-white/70' : '' }}"
                   href="{{ route('admin.reports') }}">📊 Reports</a>

                {{-- ✅ NEW: Feedback approvals --}}
                <a class="block px-3 py-2 rounded-2xl hover:bg-white/60 transition {{ request()->routeIs('admin.feedback.*') ? 'bg-white/70' : '' }}"
                   href="{{ route('admin.feedback.index') }}">⭐ Feedback Approvals</a>

                {{-- ✅ NEW: User Control --}}
                <a class="block px-3 py-2 rounded-2xl hover:bg-white/60 transition {{ request()->routeIs('admin.users.*') ? 'bg-white/70' : '' }}"
                   href="{{ route('admin.users.index') }}">👤 User Control</a>

                {{-- ❌ Removed: Go to Tasks (admins should not use student pages) --}}
            </nav>

            <div class="divider my-4"></div>

            <div class="rounded-2xl bg-white/70 border border-white/60 p-4">
                <div class="text-xs text-slate-500">Logged in as</div>
                <div class="font-semibold mt-1">{{ Auth::user()->name ?? 'Admin' }}</div>
                <div class="text-xs text-slate-500">{{ Auth::user()->email ?? '' }}</div>
                <div class="mt-3 flex flex-wrap gap-2">
                    <span class="pill text-xs">admin ✅</span>
                    <span class="pill text-xs">secure 🔐</span>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button class="w-full px-4 py-2 rounded-2xl bg-slate-900 text-white font-semibold hover:opacity-95 transition">
                    Log out 🔥
                </button>
            </form>
        </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 p-4 lg:p-6">
        <!-- Topbar -->
        <header class="glass rounded-3xl px-4 sm:px-6 py-4 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <button id="mobileMenuBtn"
                        class="lg:hidden h-10 w-10 rounded-2xl bg-white/70 border border-white/60 hover:bg-white transition">
                    ☰
                </button>
                <div>
                    <div class="font-extrabold text-lg">@yield('header_title','Admin')</div>
                    <div class="text-sm text-slate-600">@yield('header_subtitle','Manage UniTrack smoothly ✨')</div>
                </div>
            </div>

            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-2xl bg-white/70 border border-white/60 hover:bg-white transition">
                    🌐 Website
                </a>

                {{-- ❌ Removed Tasks button for admins --}}
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-2xl bg-slate-900 text-white font-semibold hover:opacity-95 transition">
                    🛡️ Admin Panel
                </a>
            </div>
        </header>

        <!-- Mobile Sidebar Drawer -->
        <div id="mobileDrawer" class="lg:hidden hidden mt-3 glass rounded-3xl p-4">
            <div class="font-bold mb-2">Menu ✨</div>
            <div class="grid gap-2 text-sm">
                <a class="px-3 py-2 rounded-2xl bg-white/70 border border-white/60"
                   href="{{ route('admin.dashboard') }}">🏠 Admin Dashboard</a>

                <a class="px-3 py-2 rounded-2xl bg-white/70 border border-white/60"
                   href="{{ route('admin.payments.index') }}">✅ Payment Approvals</a>

                <a class="px-3 py-2 rounded-2xl bg-white/70 border border-white/60"
                   href="{{ route('admin.reports') }}">📊 Reports</a>

                {{-- ✅ NEW --}}
                <a class="px-3 py-2 rounded-2xl bg-white/70 border border-white/60"
                   href="{{ route('admin.feedback.index') }}">⭐ Feedback Approvals</a>

                {{-- ✅ NEW --}}
                <a class="px-3 py-2 rounded-2xl bg-white/70 border border-white/60"
                   href="{{ route('admin.users.index') }}">👤 User Control</a>
            </div>
        </div>

        <!-- Content -->
        <main class="mt-6">
            @if(session('success'))
                <div class="glass rounded-2xl p-4 mb-4 reveal">
                    <div class="font-semibold">✅ {{ session('success') }}</div>
                </div>
            @endif
            @if(session('error'))
                <div class="glass rounded-2xl p-4 mb-4 reveal">
                    <div class="font-semibold">⚠️ {{ session('error') }}</div>
                </div>
            @endif

            <div class="reveal">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<script>
    // mobile drawer
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileDrawer = document.getElementById('mobileDrawer');
    if (mobileBtn && mobileDrawer) mobileBtn.addEventListener('click', ()=> mobileDrawer.classList.toggle('hidden'));

    // scroll reveal
    const io = new IntersectionObserver((entries)=> {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
</script>

@stack('scripts')
</body>
</html>