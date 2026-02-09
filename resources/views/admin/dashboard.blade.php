@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('header_title', 'Admin Dashboard 🧠')
@section('header_subtitle', 'Overview + approvals + reports in one place ✨')

@section('content')
<div class="grid lg:grid-cols-3 gap-5">
    <div class="glass rounded-3xl p-6">
        <div class="text-sm text-slate-600">Pending Payments</div>
        <div class="text-3xl font-extrabold mt-2">{{ $pendingPayments ?? 0 }}</div>
        <div class="text-sm text-slate-500 mt-2">Review receipts & approve premium 💎</div>
        <a class="inline-flex mt-4 px-4 py-2 rounded-2xl bg-slate-900 text-white font-semibold hover:opacity-95 transition"
           href="{{ url('/admin/payments') }}">Open approvals ✅</a>
    </div>

    <div class="glass rounded-3xl p-6">
        <div class="text-sm text-slate-600">Total Users</div>
        <div class="text-3xl font-extrabold mt-2">{{ $totalUsers ?? 0 }}</div>
        <div class="text-sm text-slate-500 mt-2">Includes standard + premium</div>
        <div class="mt-4 flex gap-2 flex-wrap">
            <span class="pill text-xs">standard: {{ $standardUsers ?? 0 }}</span>
            <span class="pill text-xs">premium: {{ $premiumUsers ?? 0 }}</span>
        </div>
    </div>

    <div class="glass rounded-3xl p-6">
        <div class="text-sm text-slate-600">Tasks Today</div>
        <div class="text-3xl font-extrabold mt-2">{{ $tasksToday ?? 0 }}</div>
        <div class="text-sm text-slate-500 mt-2">Across all users</div>
        <a class="inline-flex mt-4 px-4 py-2 rounded-2xl bg-white/70 border border-white/60 hover:bg-white transition font-semibold"
           href="{{ url('/admin/reports') }}">View reports 📊</a>
    </div>
</div>

<div class="mt-6 grid lg:grid-cols-2 gap-5">
    <div class="glass rounded-3xl p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="font-extrabold text-lg">Quick Actions ⚡</div>
                <div class="text-sm text-slate-600 mt-1">Do admin work in 1 click</div>
            </div>
            <span class="pill text-xs">smooth + fast ✨</span>
        </div>

        <div class="mt-4 grid sm:grid-cols-2 gap-3">
            <a href="{{ url('/admin/payments') }}" class="rounded-2xl bg-white/70 border border-white/60 p-4 hover:bg-white transition">
                <div class="font-bold">✅ Approve Payments</div>
                <div class="text-sm text-slate-600 mt-1">Upgrade users to Premium</div>
            </a>
            <a href="{{ url('/admin/reports') }}" class="rounded-2xl bg-white/70 border border-white/60 p-4 hover:bg-white transition">
                <div class="font-bold">📊 Reports</div>
                <div class="text-sm text-slate-600 mt-1">Users, tasks, status charts</div>
            </a>
        </div>
    </div>

    <div class="glass rounded-3xl p-6">
        <div class="font-extrabold text-lg">System Status 🛡️</div>
        <div class="text-sm text-slate-600 mt-1">Helpful indicators</div>

        <div class="mt-4 grid gap-3">
            <div class="rounded-2xl bg-white/70 border border-white/60 p-4 flex items-center justify-between">
                <div>
                    <div class="font-bold">Mailer</div>
                    <div class="text-sm text-slate-600">Email reminders enabled 🔔</div>
                </div>
                <span class="pill text-xs">ON ✅</span>
            </div>

            <div class="rounded-2xl bg-white/70 border border-white/60 p-4 flex items-center justify-between">
                <div>
                    <div class="font-bold">Timezone</div>
                    <div class="text-sm text-slate-600">{{ config('app.timezone') }} 🌍</div>
                </div>
                <span class="pill text-xs">OK ✅</span>
            </div>
        </div>
    </div>
</div>
@endsection