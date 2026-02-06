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

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css"/>

    <style>
        .auth-bg {
            min-height: 100vh;
            background:
                radial-gradient(1100px circle at 12% 10%, rgba(13,110,253,.16), transparent 48%),
                radial-gradient(1000px circle at 88% 14%, rgba(25,135,84,.14), transparent 52%),
                radial-gradient(900px circle at 50% 92%, rgba(220,53,69,.10), transparent 55%),
                #f8f9fa;
        }

        .auth-card {
            border: 0;
            border-radius: 1.25rem;
            box-shadow: 0 12px 30px rgba(0,0,0,.08);
            overflow: hidden;
            transition: transform .18s ease, box-shadow .18s ease;
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(8px);
        }
        .auth-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 40px rgba(0,0,0,.10);
        }

        .auth-brand {
            font-weight: 900;
            letter-spacing: .3px;
            background: linear-gradient(90deg, #0d6efd, #20c997);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
        }

        .auth-subtle {
            color: rgba(0,0,0,.58);
        }

        .form-control, .form-select {
            border-radius: .85rem;
            padding: .75rem .9rem;
        }

        .btn {
            border-radius: .85rem;
            padding: .75rem 1rem;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 .25rem rgba(13,110,253,.15);
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            font-size: .85rem;
            padding: .35rem .65rem;
            border-radius: 999px;
            background: rgba(13,110,253,.08);
            color: rgba(13,110,253,.95);
            border: 1px solid rgba(13,110,253,.15);
            white-space: nowrap;
        }

        .auth-illustration {
            max-height: 320px;
            width: auto;
            filter: drop-shadow(0 16px 18px rgba(0,0,0,.08));
        }

        .footer-mini {
            color: rgba(0,0,0,.5);
            font-size: .85rem;
        }
    </style>
</head>

<body class="auth-bg">
    <div class="container py-5">
        {{ $slot }}
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            easing: 'ease-out-cubic',
            once: true
        });
    </script>
</body>
</html>
