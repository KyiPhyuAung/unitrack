<x-guest-layout>
    <div class="row justify-content-center align-items-center g-4">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card auth-card animate__animated animate__fadeInUp" style="--animate-duration: .9s;" data-aos="zoom-in">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4" data-aos="fade-down">
                        <div class="auth-brand fs-2">
                            <i class="bi bi-shield-lock"></i>
                            <span>Admin Reset</span> 🔐
                        </div>
                        <div class="auth-subtle mt-1">
                            Enter your admin email to receive a verification code ✉️
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.forgot.send') }}" novalidate data-aos="fade-right">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Admin Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autofocus
                                       placeholder="admin@example.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Send verification code 🔢
                        </button>

                        <div class="text-center mt-4">
                            <a class="text-decoration-none" href="{{ route('login') }}">
                                Back to login
                            </a>
                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center mt-3 footer-mini">
                © {{ date('Y') }} Unitrack • Admin secure flow ✅
            </div>
        </div>
    </div>
</x-guest-layout>
