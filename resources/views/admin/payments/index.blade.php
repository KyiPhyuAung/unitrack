@extends('layouts.admin')
@extends('layouts.app-bootstrap')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-1">Payment Approvals ✅</h3>
    <p class="text-muted">Verify receipts and upgrade users to Premium 💎</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-12 col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Pending Requests ⏳</h5>

                    @if($pending->isEmpty())
                        <div class="text-muted">No pending payments.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                        <th>Receipt</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pending as $p)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">{{ $p->user->name }}</div>
                                            <div class="small text-muted">{{ $p->user->email }}</div>
                                        </td>
                                        <td><span class="badge text-bg-secondary">{{ $p->method }}</span></td>
                                        <td><b>{{ number_format($p->amount_mmks) }}</b> MMK</td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-primary" target="_blank"
                                               href="{{ asset('storage/'.$p->receipt_path) }}">
                                                View 🧾
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <form class="d-inline" method="POST" action="{{ route('admin.payments.approve', $p) }}">
                                                @csrf
                                                <input type="hidden" name="admin_note" value="Approved ✅">
                                                <button class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            <form class="d-inline" method="POST" action="{{ route('admin.payments.reject', $p) }}">
                                                @csrf
                                                <input type="hidden" name="admin_note" value="Rejected ❌">
                                                <button class="btn btn-sm btn-outline-danger">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Recent History 📌</h5>

                    @if($history->isEmpty())
                        <div class="text-muted">No history yet.</div>
                    @else
                        <div class="vstack gap-3">
                            @foreach($history as $h)
                                <div class="p-3 rounded-4 border">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="fw-semibold">{{ $h->user->name }}</div>
                                        <span class="badge {{ $h->status === 'approved' ? 'text-bg-success' : 'text-bg-danger' }}">
                                            {{ strtoupper($h->status) }}
                                        </span>
                                    </div>
                                    <div class="small text-muted">
                                        {{ number_format($h->amount_mmks) }} MMK • {{ $h->method }}
                                    </div>
                                    <div class="small text-muted">
                                        By: {{ $h->approver->name ?? '—' }} • {{ $h->approved_at ?? '' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection