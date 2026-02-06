<x-guest-layout>
    <div class="row justify-content-center align-items-center g-4">
        <div class="col-12 col-md-11 col-lg-9 col-xl-8">

            <div class="card auth-card animate__animated animate__fadeInUp" style="--animate-duration: .9s;" data-aos="zoom-in">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4" data-aos="fade-down">
                        <div class="auth-brand fs-2">
                            <i class="bi bi-check2-square"></i>
                            <span>Unitrack</span> ✅
                        </div>
                        <div class="auth-subtle mt-1">
                            Plan • Prioritize • Finish 🎯
                        </div>

                        <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
                            <span class="pill"><i class="bi bi-calendar3"></i> Calendar</span>
                            <span class="pill"><i class="bi bi-flag"></i> Priority</span>
                            <span class="pill"><i class="bi bi-bell"></i> Reminders</span>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row g-4 align-items-center">
                        <!-- FORM -->
                        <div class="col-12 col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                            <form method="POST" action="{{ route('login') }}" novalidate>
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autofocus
                                            autocomplete="username"
                                            placeholder="you@example.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            type="password"
                                            name="password"
                                            required
                                            autocomplete="current-password"
                                            placeholder="••••••••">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                                    <div class="form-check">
                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                        <label class="form-check-label" for="remember_me">Remember me</label>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="text-decoration-none" href="{{ route('password.request') }}">
                                            Forgot password? 😅
                                        </a>
                                    @endif
                                </div>
                                <div class="text-center mt-2">
                                    <a class="text-decoration-none small" href="{{ route('admin.forgot.form') }}">
                                        Admin forgot password? 🔐
                                    </a>
                                </div>


                                <button type="submit" class="btn btn-primary w-100">
                                    Log in <i class="bi bi-arrow-right ms-1"></i>
                                </button>

                                <div class="text-center mt-4">
                                    <span class="auth-subtle">New here?</span>
                                    <a class="text-decoration-none" href="{{ route('register') }}">Create an account ✨</a>
                                </div>
                            </form>
                        </div>

                        <!-- ILLUSTRATION / SIDE -->
                        <div class="col-12 col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-left">
                            <img
                                src="{{ asset('images/unitrack-auth.png') }}"
                                alt="Unitrack illustration"
                                class="img-fluid auth-illustration"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                            >
                            <div style="display:none;">
                                <div class="p-4 rounded-4 border bg-white">
                                    <div class="fs-1">🗓️✅</div>
                                    <div class="mt-2 fw-semibold">Stay on track</div>
                                    <div class="auth-subtle small">Add tasks, set priority, finish faster.</div>
                                </div>
                            </div>

                            <div class="mt-3 auth-subtle small">
                                Tip: Standard users get <strong>2 free tasks</strong> 🆓 — Premium unlocks unlimited 🚀
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mt-3 footer-mini">
                © {{ date('Y') }} Unitrack • Study smart 📚
            </div>

        </div>
    </div>
</x-guest-layout>
