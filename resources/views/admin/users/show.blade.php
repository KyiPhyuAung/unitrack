@extends('layouts.admin')

@section('header_title','User Details 👤')
@section('header_subtitle','View account and manage role')

@section('content')
<div class="grid lg:grid-cols-3 gap-5">
    <div class="glass rounded-3xl p-6 lg:col-span-2">
        <div class="flex items-start justify-between gap-3">
            <div>
                <div class="text-xl font-extrabold">{{ $user->name ?? 'User' }}</div>
                <div class="text-slate-600">{{ $user->email ?? '' }}</div>
                <div class="mt-2">
                    <span class="pill text-xs">role: {{ $user->role ?? 'standard' }}</span>
                </div>
            </div>
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 rounded-2xl bg-white/70 border border-white/60 hover:bg-white transition">
                ← Back
            </a>
        </div>

        <div class="divider my-4"></div>

        <div class="grid sm:grid-cols-2 gap-4 text-sm">
            <div class="rounded-2xl bg-white/70 border border-white/60 p-4">
                <div class="text-slate-500 text-xs">Joined</div>
                <div class="font-semibold mt-1">{{ optional($user->created_at)->toDayDateTimeString() ?? '—' }}</div>
            </div>
            <div class="rounded-2xl bg-white/70 border border-white/60 p-4">
                <div class="text-slate-500 text-xs">Last update</div>
                <div class="font-semibold mt-1">{{ optional($user->updated_at)->toDayDateTimeString() ?? '—' }}</div>
            </div>
        </div>
    </div>

    <div class="glass rounded-3xl p-6">
        <div class="font-extrabold">Actions</div>
        <div class="text-sm text-slate-600 mt-1">Set user role or delete account.</div>

        <div class="divider my-4"></div>

        <form method="POST" action="{{ route('admin.users.role', $user->id) }}" class="space-y-3">
            @csrf
            <label class="text-xs text-slate-600">Role</label>
            <select name="role" class="w-full rounded-2xl border border-white/60 bg-white/70 px-4 py-3">
                <option value="standard" @selected(($user->role ?? 'standard') === 'standard')>standard</option>
                <option value="premium"  @selected(($user->role ?? '') === 'premium')>premium</option>
                <option value="admin"    @selected(($user->role ?? '') === 'admin')>admin</option>
            </select>

            <button class="w-full px-4 py-3 rounded-2xl bg-slate-900 text-white font-semibold hover:opacity-95 transition">
                Save Role ✅
            </button>
        </form>

        <form method="POST" action="{{ route('admin.users.delete', $user->id) }}"
              onsubmit="return confirm('Delete this user account? This cannot be undone.')"
              class="mt-3">
            @csrf
            <button class="w-full px-4 py-3 rounded-2xl bg-red-600 text-white font-semibold hover:opacity-95 transition">
                Delete User 🗑️
            </button>
        </form>
    </div>
</div>
@endsection