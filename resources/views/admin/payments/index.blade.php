@extends('layouts.admin')

@section('title', 'Payment Approvals')
@section('header_title', 'Payment Approvals ✅')
@section('header_subtitle', 'Verify receipts and upgrade users to Premium 💎')

@section('content')

<div class="grid lg:grid-cols-3 gap-6">

    {{-- Pending Requests --}}
    <div class="lg:col-span-2 bg-white/70 backdrop-blur rounded-2xl p-5 shadow-sm border">
        <h3 class="font-semibold text-lg mb-4">Pending Requests ⏳</h3>

        @if($pending->isEmpty())
            <div class="text-gray-500">No pending payments.</div>
        @else
            <div class="space-y-3">
                @foreach($pending as $p)
                    <div class="flex items-center justify-between p-3 rounded-xl border bg-white">

                        <div>
                            <div class="font-semibold">{{ $p->user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $p->user->email }}</div>
                            <div class="text-sm text-gray-400">
                                {{ number_format($p->amount_mmks) }} MMK • {{ $p->method }}
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <a target="_blank"
                               href="{{ asset('storage/'.$p->receipt_path) }}"
                               class="px-3 py-1 text-sm rounded-lg border hover:bg-gray-100">
                                View 🧾
                            </a>

                            <form method="POST" action="{{ route('admin.payments.approve', $p) }}">
                                @csrf
                                <button class="px-3 py-1 text-sm bg-green-500 text-white rounded-lg hover:bg-green-600">
                                    Approve
                                </button>
                            </form>

                            <form method="POST" action="{{ route('admin.payments.reject', $p) }}">
                                @csrf
                                <button class="px-3 py-1 text-sm border border-red-400 text-red-500 rounded-lg hover:bg-red-50">
                                    Reject
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Recent History --}}
    <div class="bg-white/70 backdrop-blur rounded-2xl p-5 shadow-sm border">
        <h3 class="font-semibold text-lg mb-4">Recent History 📌</h3>

        @if($history->isEmpty())
            <div class="text-gray-500">No history yet.</div>
        @else
            <div class="space-y-3">
                @foreach($history as $h)
                    <div class="p-3 rounded-xl border bg-white">
                        <div class="flex justify-between">
                            <div class="font-semibold">{{ $h->user->name }}</div>

                            <span class="text-xs px-2 py-1 rounded-full
                                {{ $h->status === 'approved'
                                    ? 'bg-green-100 text-green-600'
                                    : 'bg-red-100 text-red-600' }}">
                                {{ strtoupper($h->status) }}
                            </span>
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ number_format($h->amount_mmks) }} MMK • {{ $h->method }}
                        </div>

                        <div class="text-xs text-gray-400">
                            By: {{ $h->approver->name ?? '—' }} • {{ $h->approved_at }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

@endsection