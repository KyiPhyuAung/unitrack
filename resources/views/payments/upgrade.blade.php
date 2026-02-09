<x-guest-layout>
    <div class="row justify-content-center align-items-center g-4">
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm animate__animated animate__fadeInUp">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-1 fw-bold">Upgrade to Premium 💎</h3>
                    <p class="text-muted mb-4">One-time payment • Admin verifies your receipt ✅</p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if($pending)
                        <div class="alert alert-info d-flex align-items-center justify-content-between">
                            <div>
                                ⏳ You already submitted a receipt.
                                <div class="small text-muted">Status: <b>{{ strtoupper($pending->status) }}</b></div>
                            </div>
                            <span class="badge text-bg-primary">Pending</span>
                        </div>
                    @endif

                    <div class="rounded-4 p-3 mb-4" style="background: linear-gradient(135deg, rgba(13,110,253,.10), rgba(111,66,193,.10));">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="fw-semibold">Premium Benefits ✨</div>
                                <div class="text-muted small">Unlimited tasks • Priority tracking • Reminders 🔔</div>
                            </div>
                            <span class="badge text-bg-dark">Premium</span>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-2">Pay to one of these methods 👇</h6>

                    {{-- Logos (put files in public/images/payments/) --}}
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <div class="border rounded-4 p-3 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('images/payments/kbzpay.png') }}"
                                         onerror="this.style.display='none'"
                                         style="width:44px;height:44px;object-fit:contain" alt="KBZPay">
                                    <div>
                                        <div class="fw-semibold">KBZPay 📱</div>
                                        <div class="text-muted small">Send to: <b>09985575300</b></div>
                                    </div>
                                </div>
                                <span class="badge text-bg-primary">Recommended</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="border rounded-4 p-3 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('images/payments/wavepay.png') }}"
                                         onerror="this.style.display='none'"
                                         style="width:44px;height:44px;object-fit:contain" alt="WavePay">
                                    <div>
                                        <div class="fw-semibold">WavePay 🌊</div>
                                        <div class="text-muted small">Send to: <b>09985575300</b></div>
                                    </div>
                                </div>
                                <span class="badge text-bg-info">OK</span>
                            </div>
                        </div>

                        @php
                            // Random-looking demo bank account numbers (not real)
                            $kbz = 'KBZ - 012-'.rand(10000000,99999999).'-'.rand(10,99);
                            $cb  = 'CB  - 023-'.rand(10000000,99999999).'-'.rand(10,99);
                            $mab = 'MAB - 034-'.rand(10000000,99999999).'-'.rand(10,99);
                        @endphp

                        <div class="col-12">
                            <div class="border rounded-4 p-3">
                                <div class="fw-semibold mb-2">Bank Transfer 🏦</div>
                                <div class="small text-muted mb-2">Account Name: <b>UniTrack Services</b></div>
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex justify-content-between"><span>KBZ</span><b>{{ $kbz }}</b></div>
                                    <div class="d-flex justify-content-between"><span>CB</span><b>{{ $cb }}</b></div>
                                    <div class="d-flex justify-content-between"><span>MAB</span><b>{{ $mab }}</b></div>
                                </div>
                                <div class="small text-muted mt-2">After paying, upload your receipt screenshot below ✅</div>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data" class="animate__animated animate__fadeIn">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Payment Method</label>
                            <select name="method" class="form-select @error('method') is-invalid @enderror" required>
                                <option value="">Choose…</option>
                                <option value="kbzpay">KBZPay</option>
                                <option value="wavepay">WavePay</option>
                                <option value="bank_kbz">KBZ Bank</option>
                                <option value="bank_cb">CB Bank</option>
                                <option value="bank_mab">MAB Bank</option>
                            </select>
                            @error('method') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Amount (MMK)</label>
                            <input type="number" name="amount_mmks" value="5000"
                                   class="form-control @error('amount_mmks') is-invalid @enderror"
                                   min="1000" max="10000000" required>
                            <div class="form-text">Example: 5000 MMK (you can change this)</div>
                            @error('amount_mmks') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Upload Receipt Screenshot 🧾</label>
                            <input type="file" name="receipt"
                                   class="form-control @error('receipt') is-invalid @enderror"
                                   accept="image/*" required>
                            @error('receipt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button class="btn btn-primary w-100 py-2">
                            Submit for Approval ✅
                        </button>

                        <div class="text-muted small mt-3">
                            🔒 Your receipt is only visible to admin for verification.
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Side illustration panel (optional emojis only) --}}
        <div class="col-12 col-lg-5">
            <div class="p-4 p-md-5 rounded-4 shadow-sm animate__animated animate__fadeInRight"
                 style="background: linear-gradient(135deg, rgba(13,110,253,.12), rgba(255,193,7,.12));">
                <h4 class="fw-bold mb-2">UniTrack Premium 💎</h4>
                <p class="text-muted mb-4">Upgrade once — enjoy unlimited planning.</p>

                <div class="d-grid gap-3">
                    <div class="p-3 rounded-4 bg-white">
                        ✅ Unlimited tasks
                    </div>
                    <div class="p-3 rounded-4 bg-white">
                        🔔 Email reminders
                    </div>
                    <div class="p-3 rounded-4 bg-white">
                        🎯 Priority + progress tracking
                    </div>
                    <div class="p-3 rounded-4 bg-white">
                        🗓️ More features later
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>