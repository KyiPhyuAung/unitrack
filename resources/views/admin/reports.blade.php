@extends('layouts.admin')

@section('title', 'Reports')
@section('header_title', 'Reports 📊')
@section('header_subtitle', 'A quick dashboard of UniTrack performance ✨')

@push('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
<div class="grid lg:grid-cols-4 gap-5">
    <div class="glass rounded-3xl p-6">
        <div class="text-sm text-slate-600">Total Users</div>
        <div class="text-3xl font-extrabold mt-2">{{ $totalUsers }}</div>
        <div class="mt-3 flex gap-2 flex-wrap">
            <span class="pill text-xs">standard: {{ $standardUsers }}</span>
            <span class="pill text-xs">premium: {{ $premiumUsers }} 💎</span>
        </div>
    </div>

    <div class="glass rounded-3xl p-6">
        <div class="text-sm text-slate-600">Total Tasks</div>
        <div class="text-3xl font-extrabold mt-2">{{ $tasksTotal }}</div>
        <div class="text-sm text-slate-500 mt-2">Created today: {{ $tasksToday }} ⚡</div>
    </div>

    <div class="glass rounded-3xl p-6">
        <div class="text-sm text-slate-600">Overdue Tasks</div>
        <div class="text-3xl font-extrabold mt-2">{{ $overdueCount }}</div>
        <div class="text-sm text-slate-500 mt-2">Not done + past time ⏰</div>
    </div>

    <div class="glass rounded-3xl p-6">
        <div class="text-sm text-slate-600">Pending Payments</div>
        <div class="text-3xl font-extrabold mt-2">{{ $pendingPayments }}</div>
        <div class="text-sm text-slate-500 mt-2">Approve to upgrade users ✅</div>
    </div>
</div>

<div class="mt-6 grid lg:grid-cols-2 gap-5">
    <div class="glass rounded-3xl p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="font-extrabold text-lg">Tasks by Status ✅</div>
                <div class="text-sm text-slate-600 mt-1">pending / ongoing / done</div>
            </div>
            <span class="pill text-xs">auto-refresh feel ✨</span>
        </div>
        <div class="mt-4">
            <canvas id="statusChart" height="140"></canvas>
        </div>
    </div>

    <div class="glass rounded-3xl p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="font-extrabold text-lg">Signups (7 days) 🎓</div>
                <div class="text-sm text-slate-600 mt-1">new users trend</div>
            </div>
            <span class="pill text-xs">smooth</span>
        </div>
        <div class="mt-4">
            <canvas id="signupChart" height="140"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const statusData = @json(array_values($byStatus));
    const statusLabels = @json(array_keys($byStatus));

    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: { labels: statusLabels, datasets: [{ data: statusData }] },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });

    new Chart(document.getElementById('signupChart'), {
        type: 'line',
        data: {
            labels: @json($signupLabels),
            datasets: [{ label: 'Signups', data: @json($signupSeries), tension: 0.35 }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });
</script>
@endpush

@endsection