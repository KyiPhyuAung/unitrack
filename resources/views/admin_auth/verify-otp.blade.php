<x-guest-layout>
    <div class="row justify-content-center align-items-center g-4">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card auth-card animate__animated animate__fadeInUp" style="--animate-duration: .9s;" data-aos="zoom-in">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4" data-aos="fade-down">
                        <div class="auth-brand fs-2">
                            <i class="bi bi-key"></i>
                            <span>Verify OTP</span> ✅
                        </div>
                        <div class="auth-subtle mt-1">
                            We sent a 6-digit code to <strong>{{ $email }}</strong>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.otp.verify') }}" novalidate data-aos="fade-right">
                        @csrf

                        <div class="mb-3">
                            <label for="otp" class="form-label">6-digit code</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-123"></i></span>
                                <input id="otp"
                                       class="form-control @error('otp') is-invalid @enderror"
                                       type="text"
                                       name="otp"
                                       inputmode="numeric"
                                       pattern="[0-9]*"
                                       maxlength="6"
                                       required
                                       autofocus
                                       placeholder="123456">
                                @error('otp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="auth-subtle small mt-2">
                                Tip: check Spam/Promotions if you don’t see it 📨
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Verify and send reset link 🚀
                        </button>

                        <div class="text-center mt-4">
                            <a class="text-decoration-none" href="{{ route('admin.forgot.form') }}">
                                Request a new code
                            </a>
                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center mt-3 footer-mini">
                © {{ date('Y') }} Unitrack • Secure reset 🔒
            </div>
        </div>
    </div>
</x-guest-layout>
