<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Unitrack') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body.unitrack-bg {
        min-height: 100vh;
        background: linear-gradient(
            135deg,
            #e9f0ff 0%,
            #f7f9ff 40%,
            #ffffff 100%
        );
        background-attachment: fixed;
    }

    .unitrack-bg {
    animation: bgFade .6s ease;
    }

    @keyframes bgFade {
        from { opacity: 0; }
        to { opacity: 1; }
    }   

    /* soft glass effect for cards */
    .task-card {
        background: rgba(255,255,255,0.92) !important;
        backdrop-filter: blur(8px);
    }

    /* nicer modal backdrop */
    .modal-backdrop.show {
        opacity: .25;
    }
        body { background: #f8f9fa; }

        .brand {
            font-weight: 900;
            background: linear-gradient(90deg, #0d6efd, #20c997);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .card-soft {
            border: 0;
            border-radius: 1.25rem;
            box-shadow: 0 12px 30px rgba(0,0,0,.08);
        }

        .badge-pill {
            border-radius: 999px;
            padding: .45rem .65rem;

        .table tr { transition: transform .15s ease, background-color .15s ease; }
        .table tbody tr:hover { background: rgba(13,110,253,.04); transform: translateY(-1px); }

        .btn-primary { box-shadow: 0 10px 20px rgba(13,110,253,.18); }
        .btn-primary:active { transform: translateY(1px); }
        }
        .modal-content { animation: fadeInUp .25s ease; }
        @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
        }


        
        /* Row-by-row stagger animation */
        .tr-stagger {
            opacity: 0;
            transform: translateY(10px);
            animation: rowIn .35s ease forwards;
        }

        @keyframes rowIn {
            to { opacity: 1; transform: translateY(0); }
        }

    </style>
</head>
<body class="unitrack-bg">

<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/dashboard') }}">
            <i class="bi bi-check2-square fs-4 text-primary"></i>
            <span class="brand">Unitrack</span>
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">
            <a class="btn btn-sm btn-outline-primary" href="{{ url('/dashboard') }}">
                <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </a>

            <div class="dropdown">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <div class="d-flex flex-column lh-sm">
                        <span class="fw-semibold">{{ auth()->user()->name ?? 'User' }}</span>
                        @if(auth()->user()->university)
                            <span class="small text-muted">🎓 {{ auth()->user()->university->name }}</span>
                        @endif
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person me-1"></i> Profile
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<main class="container py-4">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
