<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'UniTrack') }} — Plan • Prioritize • Finish ✅</title>

    {{-- ✅ REQUIRED so Tailwind works --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root { --glass: rgba(255,255,255,.72); }
        body { font-family: "Instrument Sans", system-ui, -apple-system, Segoe UI, Roboto, sans-serif; }

        /* Background */
        .bg-aurora {
            background:
                radial-gradient(1200px 600px at 15% 10%, rgba(59,130,246,.35), transparent 60%),
                radial-gradient(900px 500px at 90% 15%, rgba(168,85,247,.35), transparent 55%),
                radial-gradient(900px 500px at 30% 95%, rgba(34,197,94,.30), transparent 55%),
                linear-gradient(180deg, #f8fafc 0%, #f1f5f9 55%, #ffffff 100%);
            position: relative;
            overflow-x: hidden;
        }

        .noise {
            position:absolute; inset:0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='180' height='180'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='180' height='180' filter='url(%23n)' opacity='.07'/%3E%3C/svg%3E");
            pointer-events:none;
            mix-blend-mode: soft-light;
        }

        .blob {
            position: absolute;
            filter: blur(44px);
            opacity: .55;
            animation: floaty 12s ease-in-out infinite;
            pointer-events: none;
        }
        .blob.b1 { width: 460px; height: 460px; background: #60a5fa; top: -160px; left: -170px; }
        .blob.b2 { width: 420px; height: 420px; background: #a78bfa; top: -170px; right: -170px; animation-duration: 14s; }
        .blob.b3 { width: 520px; height: 520px; background: #34d399; bottom: -240px; left: 10%; animation-duration: 16s; }

        @keyframes floaty {
            0%,100% { transform: translateY(0) translateX(0) scale(1); }
            50% { transform: translateY(28px) translateX(18px) scale(1.05); }
        }

        .glass{
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,.6);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
        }

        .btn-glow { position: relative; border: 0; }
        .btn-glow:before {
            content:"";
            position:absolute;
            inset:-2px;
            border-radius: 18px;
            background: linear-gradient(90deg, rgba(59,130,246,.95), rgba(168,85,247,.95), rgba(34,197,94,.95));
            filter: blur(14px);
            opacity: .55;
            z-index: -1;
            transition: opacity .25s ease;
        }
        .btn-glow:hover:before { opacity: .85; }

        .navlink{
            position: relative;
            padding: .35rem .25rem;
            transition: transform .15s ease, opacity .15s ease;
        }
        .navlink::after{
            content:"";
            position:absolute;
            left:0;
            right:0;
            bottom:-.15rem;
            height:2px;
            border-radius: 999px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .2s ease;
            background: rgba(15,23,42,.8);
        }

        .navlink:hover{ transform: translateY(-1px); opacity: .95; }

        .navlink:hover::after{ transform: scaleX(1); }
        .divider { height: 1px; background: linear-gradient(90deg, transparent, rgba(2,6,23,.12), transparent); }

        .pill {
            display:inline-flex; align-items:center; gap:.5rem;
            padding:.35rem .65rem; border-radius: 999px;
            background: rgba(2,6,23,.06);
            border: 1px solid rgba(2,6,23,.08);
        }

        /* Ripple animation */
        .ripple-btn { position: relative; overflow: hidden; }
        .ripple-btn::after {
            content: "";
            position: absolute;
            left: var(--rx, 50%);
            top: var(--ry, 50%);
            width: 0;
            height: 0;
            border-radius: 999px;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(255,255,255,.55) 0%, rgba(255,255,255,0) 55%);
            opacity: 0;
            transition: width .55s ease, height .55s ease, opacity .55s ease;
        }
        .ripple-btn:hover::after { width: 520px; height: 520px; opacity: .8; }

        /* Scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity .7s ease, transform .7s ease;
        }
        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Testimonials */
        .marquee { width: 100%; }
        .marquee-track {
            display: flex;
            gap: 14px;
            width: max-content;
            animation: scrollX 24s linear infinite;
            padding: 10px;
        }
        .marquee:hover .marquee-track { animation-play-state: paused; }
        @keyframes scrollX {
            from { transform: translateX(0); }
            to   { transform: translateX(-50%); }
        }
        .review-card {
            min-width: 280px;
            max-width: 280px;
            background: rgba(255,255,255,.74);
            border: 1px solid rgba(255,255,255,.60);
            border-radius: 22px;
            padding: 16px;
            box-shadow: 0 14px 30px rgba(15,23,42,.08);
            transition: transform .25s ease;
        }
        .review-card:hover { transform: translateY(-4px); }
        @media (max-width: 640px) {
            .review-card { min-width: 240px; max-width: 240px; }
            .marquee-track { animation-duration: 18s; }
        }
    </style>
</head>

<body class="bg-aurora min-h-screen text-slate-900">
    <div class="blob b1"></div>
    <div class="blob b2"></div>
    <div class="blob b3"></div>
    <div class="noise"></div>

    <!-- Navbar -->
    <header class="sticky top-3 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <nav class="glass rounded-2xl px-4 sm:px-6 py-3">
            <div class="flex items-center justify-between">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="group flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl bg-slate-900 text-white flex items-center justify-center shadow-sm
                            transition transform group-hover:scale-[1.03] group-hover:-rotate-1">
                    <x-application-logo class="h-6 w-6 text-white" />
                </div>

                <div class="leading-tight">
                    <div class="font-extrabold tracking-tight">UniTrack</div>
                    <div class="text-xs text-slate-500 -mt-0.5">Plan • Prioritize • Finish</div>
                </div>
                </a>

                <!-- Desktop Links -->
                <div class="hidden md:flex items-center gap-6 text-sm text-slate-700">
                    <a href="#features" class="navlink">Features ✨</a>
                    <a href="#how" class="navlink">How it works 🧠</a>
                    <a href="#pricing" class="navlink">Premium 💎</a>
                    <a href="#testimonials" class="navlink">Reviews 💬</a>
                    <a href="#faq" class="navlink">FAQ ❓</a>

                    @auth
                        <a href="{{ route('feedback.create') }}" class="navlink">Give feedback ⭐</a>
                    @else
                        <a href="#testimonials" class="navlink">Give feedback ⭐</a>
                    @endauth
                </div>

                <!-- Auth Buttons -->
                <div class="hidden sm:flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-semibold hover:opacity-95 transition">
                    Dashboard 🚀
                    </a>
                @else
                    <a href="{{ route('login') }}"
                    class="px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-white/60 transition">
                    Log in 🔐
                    </a>

                    <a href="{{ route('register') }}"
                    class="btn-glow ripple-btn px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-semibold hover:opacity-95 transition">
                    Start free ✨
                    </a>
                @endauth
                </div>

                <!-- Mobile Button -->
                <button id="menuBtn"
                class="md:hidden inline-flex items-center justify-center h-10 w-10 rounded-xl bg-white/60 hover:bg-white transition border border-white/60"
                aria-expanded="false" aria-controls="mobileMenu">
                ☰
                </button>
            </div>

            <!-- Mobile Dropdown -->
            <div id="mobileMenu" class="md:hidden hidden pt-3">
                <div class="rounded-2xl bg-white/60 border border-white/60 p-3 space-y-2">
                <a href="#features" class="block px-3 py-2 rounded-xl hover:bg-white/70 transition">Features ✨</a>
                <a href="#how" class="block px-3 py-2 rounded-xl hover:bg-white/70 transition">How it works 🧠</a>
                <a href="#pricing" class="block px-3 py-2 rounded-xl hover:bg-white/70 transition">Premium 💎</a>
                <a href="#testimonials" class="block px-3 py-2 rounded-xl hover:bg-white/70 transition">Reviews 💬</a>
                <a href="#faq" class="block px-3 py-2 rounded-xl hover:bg-white/70 transition">FAQ ❓</a>
                @auth
                <a href="{{ route('feedback.create') }}" class="block px-3 py-2 rounded-xl hover:bg-white/70 transition">Give feedback ⭐</a>
                @else
                <a href="#testimonials" class="block px-3 py-2 rounded-xl hover:bg-white/70 transition">Give feedback ⭐</a>
                @endauth
                <div class="pt-2 border-t border-white/60 flex gap-2">
                    @auth
                    <a href="{{ route('dashboard') }}"
                        class="w-full text-center px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-semibold hover:opacity-95 transition">
                        Dashboard 🚀
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="w-1/2 text-center px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-white/70 transition">
                        Log in 🔐
                    </a>
                    <a href="{{ route('register') }}"
                        class="w-1/2 text-center px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-semibold hover:opacity-95 transition">
                        Start free ✨
                    </a>
                    @endauth
                </div>
                </div>
            </div>

            </nav>
        </div>
    </header>

    <!-- Hero -->
    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <section class="pt-10 sm:pt-14 pb-10">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <!-- Left -->
                <div class="reveal">
                    <div class="pill text-sm text-slate-700 mb-5">
                        🎓 Built for students
                        <span class="text-slate-400">•</span>
                        🔔 Reminders that work
                        <span class="text-slate-400">•</span>
                        ✅ Simple UI
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                        A beautiful way to manage
                        <span class="block">tasks, deadlines & priorities ✅</span>
                    </h1>

                    <p class="mt-5 text-slate-600 text-lg leading-relaxed max-w-xl">
                        UniTrack helps you plan your day, focus on what matters, and never miss a deadline.
                        Clean design, fast workflow, and smart email reminders.
                    </p>

                    <div class="mt-7 flex flex-wrap gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}"
                               class="btn-glow ripple-btn px-5 py-3 rounded-2xl bg-slate-900 text-white font-semibold transition hover:-translate-y-0.5 hover:shadow-lg">
                                Open Dashboard 🚀
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                               class="btn-glow ripple-btn px-5 py-3 rounded-2xl bg-slate-900 text-white font-semibold transition hover:-translate-y-0.5 hover:shadow-lg">
                                Start Free ✨
                            </a>
                            <a href="{{ route('login') }}"
                               class="px-5 py-3 rounded-2xl bg-white/70 border border-white/60 text-slate-900 font-semibold hover:bg-white transition">
                                I already have an account 🔐
                            </a>
                        @endauth
                    </div>

                    <div class="mt-7 grid sm:grid-cols-3 gap-3 text-sm">
                        <div class="glass rounded-2xl p-4">
                            <div class="font-bold">⚡ Fast</div>
                            <div class="text-slate-600 mt-1">Create tasks in seconds</div>
                        </div>
                        <div class="glass rounded-2xl p-4">
                            <div class="font-bold">🎯 Focus</div>
                            <div class="text-slate-600 mt-1">See today at a glance</div>
                        </div>
                        <div class="glass rounded-2xl p-4">
                            <div class="font-bold">🔔 Reminders</div>
                            <div class="text-slate-600 mt-1">Email notifications on time</div>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="relative reveal">
                    <div class="glass rounded-3xl p-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div class="font-bold text-lg">Today’s Plan ✅</div>
                            <div class="text-xs pill">Live preview ✨</div>
                        </div>

                        <div class="mt-4 space-y-3">
                            <div class="rounded-2xl bg-white/75 border border-white/60 p-4 flex items-start justify-between">
                                <div>
                                    <div class="font-semibold">Finish Assessment 2 🧠</div>
                                    <div class="text-sm text-slate-600 mt-1">Due: 7 Feb • Priority: 🔵</div>
                                </div>
                                <span class="pill text-xs">Ongoing ⏳</span>
                            </div>

                            <div class="rounded-2xl bg-white/75 border border-white/60 p-4 flex items-start justify-between">
                                <div>
                                    <div class="font-semibold">Group meeting 🤝</div>
                                    <div class="text-sm text-slate-600 mt-1">2:30 PM • Priority: 🟢</div>
                                </div>
                                <span class="pill text-xs">Pending 🕒</span>
                            </div>

                            <div class="rounded-2xl bg-white/75 border border-white/60 p-4 flex items-start justify-between">
                                <div>
                                    <div class="font-semibold">Review lecture notes 📚</div>
                                    <div class="text-sm text-slate-600 mt-1">Email reminder 🔔</div>
                                </div>
                                <span class="pill text-xs">Done ✅</span>
                            </div>
                        </div>

                        <div class="divider my-5"></div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="rounded-2xl bg-slate-900 text-white p-4">
                                <div class="text-sm opacity-80">Next reminder</div>
                                <div class="font-bold text-lg mt-1">⏰ 15 mins</div>
                                <div class="text-xs opacity-70 mt-2">Email alert on time</div>
                            </div>
                            <div class="rounded-2xl bg-white/75 border border-white/60 p-4">
                                <div class="text-sm text-slate-600">University</div>
                                <div class="font-bold mt-1">Select at signup 🎓</div>
                                <div class="text-xs text-slate-500 mt-2">Clean dropdown list</div>
                            </div>
                        </div>
                    </div>

                    <!-- Image row with safe fallback -->
                    <div class="mt-4 grid grid-cols-3 gap-3">
                        <img class="rounded-2xl shadow-sm object-cover h-24 w-full"
                             src="{{ asset('images/cartoon-1.png') }}"
                             alt="Focus illustration">
                        <img class="rounded-2xl shadow-sm object-cover h-24 w-full"
                             src="{{ asset('images/cartoon-2.png') }}"
                             alt="Study group illustration">
                        <img class="rounded-2xl shadow-sm object-cover h-24 w-full"
                             src="{{ asset('images/cartoon-3.png') }}"
                             alt="Achievement illustration">
                    </div>
                    <div class="text-xs text-slate-500 mt-2">
                        Achieve your dreams in order 🫵 UniTrack will be part of your successful journey ✨
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section id="features" class="py-12 reveal">
            <div class="divider mb-10"></div>

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-extrabold">Everything you need — nothing you don’t ✨</h2>
                    <p class="text-slate-600 mt-2">Designed for students: simple layout, clear priorities, and reminders that actually help.</p>
                </div>
                <span class="pill text-sm self-start md:self-auto">✅ Clean UI • 🔔 Reminders • ⚡ Fast</span>
            </div>

            @php
                $cards = [
                    ['📝','Task Cards','Create tasks with title, notes, and schedule — edit anytime.'],
                    ['🔴🟢🔵','Priority Colors','Instant visual priority so you know what’s urgent.'],
                    ['⏳✅','Progress Status','Pending → Ongoing → Done with a simple workflow.'],
                    ['🔔','Email Reminders','Set “Notify at” and UniTrack emails you on time.'],
                    ['🎓','University Profile','Choose your university at signup — shown in profile.'],
                    ['💎','Premium Upgrade','Receipt upload → admin approval → unlock unlimited tasks.'],
                ];
            @endphp

            <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($cards as $c)
                    <div class="glass rounded-3xl p-6 transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="text-2xl">{{ $c[0] }}</div>
                        <div class="font-bold mt-3">{{ $c[1] }}</div>
                        <div class="text-slate-600 mt-2">{{ $c[2] }}</div>
                        <div class="mt-4 text-sm text-slate-700">
                            <span class="pill">Modern</span>
                            <span class="pill ml-2">Simple</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- How it works -->
        <section id="how" class="py-12 reveal">
            <div class="divider mb-10"></div>

             <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-extrabold">How UniTrack works 🧠</h2>
                    <p class="text-slate-600 mt-2">A simple 3-step flow you can learn in 1 minute — then you just use it.</p>
                </div>
                <span class="pill text-sm self-start md:self-auto">✅ Clean UI • 🔔 Reminders • ⚡ Fast</span>
            </div>

            <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-2 gap-5 items-start">
                <div>
                    <!-- <h2 class="text-3xl font-extrabold">How UniTrack works 🧠</h2>
                    <p class="text-slate-600 mt-2 max-w-xl">A simple 3-step flow you can learn in 1 minute — then you just use it.</p> -->

                    <div class="mt-8 space-y-4">
                        <div class="glass rounded-3xl p-6 lg:grid-cols-2">
                            <div class="pill text-sm mb-3">Step 1</div>
                            <div class="font-bold text-lg">Register ✍️</div>
                            <div class="text-slate-600 mt-2">Choose your university 🎓 and create your account.</div>
                        </div>
                        <div class="glass rounded-3xl p-6">
                            <div class="pill text-sm mb-3">Step 2</div>
                            <div class="font-bold text-lg">Create Tasks 📝</div>
                            <div class="text-slate-600 mt-2">Add date/time, pick priority, and set status.</div>
                        </div>
                        <div class="glass rounded-3xl p-6">
                            <div class="pill text-sm mb-3">Step 3</div>
                            <div class="font-bold text-lg">Get Reminded 🔔</div>
                            <div class="text-slate-600 mt-2">Notify-at triggers email reminders so you stay consistent.</div>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-3xl p-6">
                    <div class="font-bold text-lg">Why students love it ✨</div>
                    <div class="text-slate-600 mt-2">It feels like a clean “study assistant” — not a complicated project management tool.</div>

                    <div class="mt-6 grid gap-4">
                        <div class="rounded-2xl bg-white/75 border border-white/60 p-4">
                            <div class="font-semibold">✅ Clean, distraction-free</div>
                            <div class="text-sm text-slate-600 mt-1">Your tasks are the focus — not buttons everywhere.</div>
                        </div>
                        <div class="rounded-2xl bg-white/75 border border-white/60 p-4">
                            <div class="font-semibold">🎯 Clear priorities</div>
                            <div class="text-sm text-slate-600 mt-1">Colors + statuses make your brain decide faster.</div>
                        </div>
                        <div class="rounded-2xl bg-white/75 border border-white/60 p-4">
                            <div class="font-semibold">🔔 Reminders that help</div>
                            <div class="text-sm text-slate-600 mt-1">Email reminders keep you consistent on busy days.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing -->
        <section id="pricing" class="py-12 reveal">
            <div class="divider mb-10"></div>

            <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-extrabold">Standard vs Premium 💎</h2>
                    <p class="text-slate-600 mt-2">Start free, upgrade anytime. Student-friendly and simple.</p>
                </div>
                @guest
                    <a href="{{ route('register') }}" class="btn-glow ripple-btn px-5 py-3 rounded-2xl bg-slate-900 text-white font-semibold">
                        Start UniTrack ✨
                    </a>
                @endguest
            </div>

            <div class="mt-8 grid lg:grid-cols-2 gap-5">
                <div class="glass rounded-3xl p-7">
                    <div class="pill text-sm">✅ Standard</div>
                    <div class="mt-3 text-2xl font-extrabold">Free</div>
                    <ul class="mt-4 space-y-2 text-slate-700">
                        <li>📝 Task cards + status</li>
                        <li>🔴🟢🔵 Priority colors</li>
                        <li>🔔 Email reminders</li>
                        <li>🎓 University profile</li>
                    </ul>
                </div>

                <div class="glass rounded-3xl p-7 border border-white/60 relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 h-56 w-56 rounded-full bg-gradient-to-br from-blue-400/35 via-purple-400/35 to-emerald-400/35 blur-2xl"></div>

                    <div class="flex items-center justify-between">
                        <div class="pill text-sm">💎 Premium</div>
                        <div class="pill text-sm">Best value</div>
                    </div>

                    <div class="mt-3 text-2xl font-extrabold">One-time upgrade</div>
                    <ul class="mt-4 space-y-2 text-slate-700">
                        <li>🚀 Unlimited tasks</li>
                        <li>⚡ Faster workflow</li>
                        <li>✨ Premium badge</li>
                        <li>🧾 Receipt upload approval</li>
                    </ul>

                    @auth
                        <a href="{{ route('payments.upgrade') }}"
                           class="mt-6 inline-flex btn-glow ripple-btn px-5 py-3 rounded-2xl bg-slate-900 text-white font-semibold">
                            Upgrade now 💎
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-10 reveal" id="testimonials">
            <div class="divider mb-10"></div>

            <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-extrabold">Students love UniTrack 💬✨</h2>
                    <p class="text-slate-600 mt-2">Realistic feedback — and yes, deadlines feel easier now 😅</p>
                </div>
                <span class="pill text-sm">So why don't you join? 🤓</span>
            </div>
            @if(isset($feedbacks) && $feedbacks->count())
            <div class="mt-6 grid md:grid-cols-3 gap-4">
                @foreach($feedbacks as $f)
                <div class="glass rounded-3xl p-5">
                    <div class="flex items-start justify-between gap-3">
                    <div>
                        <div class="font-bold">{{ $f->display_name ?? 'User' }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ $f->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="text-2xl">{{ $f->emoji }}</div>
                    </div>

                    <div class="mt-3 text-slate-700 leading-relaxed">
                    “{{ $f->message }}”
                    </div>

                    <div class="mt-3 text-sm">
                    @for($i=1;$i<=5;$i++)
                        <span class="{{ $i <= (int)$f->rating ? '' : 'opacity-25' }}">⭐</span>
                    @endfor
                    </div>
                </div>
                @endforeach
            </div>

            <div class="divider my-10"></div>
            @endif
            <div class="mt-8 glass rounded-3xl p-4 overflow-hidden">
                <div class="marquee">
                    <div class="marquee-track">
                        @php
                            $reviews = [
                                ['name'=>'Aye Chan 🎓', 'text'=>'I stopped missing deadlines. The reminder emails are 🔥', 'tag'=>'Final Year'],
                                ['name'=>'Hnin Pwint 📚', 'text'=>'The UI feels like Notion but simpler 😍', 'tag'=>'CS Student'],
                                ['name'=>'Ko Min 🤝', 'text'=>'Group project tasks are finally organized ✅', 'tag'=>'Business'],
                                ['name'=>'May Thiri 🧠', 'text'=>'Priority colors are perfect. Red = “DO NOW” 😂', 'tag'=>'Engineering'],
                                ['name'=>'Thura ⏱️', 'text'=>'Auto refresh on status change is sooo satisfying ✨', 'tag'=>'IT'],
                                ['name'=>'Su Mon 💎', 'text'=>'Premium is worth it — unlimited tasks and clean UI 😌', 'tag'=>'Design'],
                            ];
                        @endphp

                        @foreach([1,2] as $dup)
                            @foreach($reviews as $r)
                                <div class="review-card">
                                    <div class="flex items-center justify-between">
                                        <div class="font-bold">{{ $r['name'] }}</div>
                                        <span class="pill text-xs">{{ $r['tag'] }}</span>
                                    </div>
                                    <div class="text-slate-700 mt-2 leading-relaxed">“{{ $r['text'] }}”</div>
                                    <div class="mt-3 text-xs text-slate-500">⭐⭐⭐⭐⭐</div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq" class="py-12 pb-16 reveal">
            <div class="divider mb-10"></div>

            <h2 class="text-3xl font-extrabold">FAQ ❓</h2>
            <p class="text-slate-600 mt-2">Quick answers to common questions.</p>

            @php
                $faqs = [
                    ['Do I need premium to use reminders?', 'No ✅ reminders work for everyone. Premium unlocks unlimited tasks.'],
                    ['How does premium payment work?', 'Pay → upload receipt 🧾 → admin approves ✅ → premium activated 💎'],
                    ['Can I edit tasks?', 'Yes ✨ you can edit task details and status anytime.'],
                    ['Does UniTrack work on mobile?', 'Yes 📱 the landing page and the app pages are responsive.'],
                ];
            @endphp

            <div class="mt-6 grid lg:grid-cols-2 gap-5">
                @foreach($faqs as $f)
                    <div class="glass rounded-3xl p-0 overflow-hidden">
                        <button class="faqBtn w-full text-left px-6 py-5 flex items-start justify-between gap-4">
                            <div>
                                <div class="font-bold">{{ $f[0] }}</div>
                                <div class="text-slate-600 mt-1 text-sm">Tap to expand</div>
                            </div>
                            <div class="faqIcon pill text-xs mt-1">+</div>
                        </button>
                        <div class="faqPanel hidden px-6 pb-6 text-slate-600">
                            {{ $f[1] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <footer class="pb-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-2xl px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="text-sm text-slate-600">
                    © {{ date('Y') }} {{ config('app.name', 'UniTrack') }} • Built by <span class="font-semibold">Ko Kyi Phyu Aung — Strategy First University 🇲🇲</span> 🎓
                </div>
                <div class="text-sm text-slate-600 flex items-center gap-3">
                    <span>Made with ❤️ + ☕</span>
                    <span class="pill text-xs">v1.0</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu
        const btn = document.getElementById('menuBtn');
        const menu = document.getElementById('mobileMenu');
        if (btn && menu) btn.addEventListener('click', () => menu.classList.toggle('hidden'));

        // FAQ accordion
        document.querySelectorAll('.faqBtn').forEach((b) => {
            b.addEventListener('click', () => {
                const panel = b.parentElement.querySelector('.faqPanel');
                const icon = b.querySelector('.faqIcon');
                const isOpen = !panel.classList.contains('hidden');
                document.querySelectorAll('.faqPanel').forEach(p => p.classList.add('hidden'));
                document.querySelectorAll('.faqIcon').forEach(i => i.textContent = '+');
                if (!isOpen) { panel.classList.remove('hidden'); icon.textContent = '–'; }
            });
        });

        // Ripple mouse tracking
        document.querySelectorAll('.ripple-btn').forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const r = btn.getBoundingClientRect();
                btn.style.setProperty('--rx', (e.clientX - r.left) + 'px');
                btn.style.setProperty('--ry', (e.clientY - r.top) + 'px');
            });
        });

        // Scroll reveal
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) e.target.classList.add('show');
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal').forEach(el => io.observe(el));
    </script>
    <!-- <script>
        const btn1 = document.getElementById('menuBtn');
        const menu1 = document.getElementById('mobileMenu');

        if (btn1 && menu1) {
            btn1.addEventListener('click', () => {
            const isOpen = !menu1.classList.contains('hidden');
            menu1.classList.toggle('hidden');
            btn.setAttribute('aria-expanded', String(!isOpen));
            });

            // close on link click (nice UX)
            menu1.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', () => {
                menu1.classList.add('hidden');
                btn1.setAttribute('aria-expanded', 'false');
            });
            });
        }
    </script> -->
</body>
</html>