<x-guest-layout>
    <div class="row justify-content-center align-items-center g-4">
        <div class="col-12 col-md-11 col-lg-10 col-xl-9">

            <div class="card auth-card animate__animated animate__fadeInUp" style="--animate-duration: .9s;" data-aos="zoom-in">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4" data-aos="fade-down">
                        <div class="auth-brand fs-2">
                            <i class="bi bi-person-plus"></i>
                            <span>Join Unitrack</span> ✨
                        </div>
                        <div class="auth-subtle mt-1">
                            Start tracking today — your future self will thank you 😄
                        </div>

                        <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
                            <span class="pill"><i class="bi bi-check2-circle"></i> Tasks</span>
                            <span class="pill"><i class="bi bi-flag"></i> Priority</span>
                            <span class="pill"><i class="bi bi-bell"></i> Alerts</span>
                        </div>
                    </div>

                    <div class="row g-4 align-items-center">
                        <!-- FORM -->
                        <div class="col-12 col-lg-7 order-2 order-lg-1" data-aos="fade-right">
                            <form method="POST" action="{{ route('register') }}" novalidate>
                                @csrf

                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                                autocomplete="name"
                                                placeholder="Your name">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                type="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                required
                                                autocomplete="username"
                                                placeholder="you@example.com">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="university_id" class="form-label">University</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                            <select id="university_id"
                                                name="university_id"
                                                class="form-select @error('university_id') is-invalid @enderror"
                                                required>
                                                <option value="">-- Select your university --</option>
                                                @foreach ($universities as $university)
                                                    <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>
                                                        {{ $university->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('university_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                type="password"
                                                name="password"
                                                required
                                                autocomplete="new-password"
                                                placeholder="Create password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                            <input id="password_confirmation"
                                                class="form-control"
                                                type="password"
                                                name="password_confirmation"
                                                required
                                                autocomplete="new-password"
                                                placeholder="Confirm password">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-4">
                                    Create account 🚀
                                </button>

                                <div class="text-center mt-4">
                                    <span class="auth-subtle">Already have an account?</span>
                                    <a class="text-decoration-none" href="{{ route('login') }}">Log in</a>
                                </div>
                            </form>
                        </div>

                        <!-- SIDE PANEL -->
                        <div class="col-12 col-lg-5 order-1 order-lg-2 text-center" data-aos="fade-left">
                            <img
                                src="{{ asset('images/unitrack-auth.png') }}"
                                alt="Unitrack illustration"
                                class="img-fluid auth-illustration"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                            >
                            <div style="display:none;">
                                <div class="p-4 rounded-4 border bg-white">
                                    <div class="fs-1">📚🧠</div>
                                    <div class="mt-2 fw-semibold">Study smarter</div>
                                    <div class="auth-subtle small">Track tasks, deadlines, and progress.</div>
                                </div>
                            </div>

                            <div class="mt-3 auth-subtle small">
                                Free plan: <strong>2 tasks</strong> 🆓 <br>
                                Upgrade later for unlimited 💎
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mt-3 footer-mini">
                © {{ date('Y') }} Unitrack • You got this 💪
            </div>

        </div>
    </div>
</x-guest-layout>
