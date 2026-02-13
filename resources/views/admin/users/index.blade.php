@extends('layouts.admin')

@section('header_title','User Control 👤')
@section('header_subtitle','View users, set roles, and manage accounts')

@section('content')
<div class="glass rounded-3xl p-6">
    <div class="flex items-center justify-between gap-3">
        <div>
            <div class="text-lg font-extrabold">Users</div>
            <div class="text-sm text-slate-600">Manage Standard / Premium / Admin</div>
        </div>
        <div class="pill text-sm">Total: {{ $users->total() ?? count($users ?? []) }}</div>
    </div>

    <div class="divider my-4"></div>

    @if(empty($users) || (method_exists($users,'count') && $users->count() === 0))
        <div class="text-slate-600">No users found.</div>
    @else
        <div class="overflow-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-slate-600">
                        <th class="py-2">Name</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Role</th>
                        <th class="py-2">Joined</th>
                        <th class="py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                        <tr class="border-t border-white/60">
                            <td class="py-3 font-semibold">{{ $u->name ?? '—' }}</td>
                            <td class="py-3">{{ $u->email ?? '—' }}</td>
                            <td class="py-3">
                                <span class="pill text-xs">
                                    {{ $u->role ?? 'standard' }}
                                </span>
                            </td>
                            <td class="py-3 text-slate-600">
                                {{ optional($u->created_at)->diffForHumans() ?? '—' }}
                            </td>
                            <td class="py-3 text-right">
                                <a class="px-3 py-2 rounded-2xl bg-slate-900 text-white font-semibold hover:opacity-95 transition"
                                   href="{{ route('admin.users.show', $u->id) }}">
                                    View →
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if(method_exists($users,'links'))
            <div class="mt-4">{{ $users->links() }}</div>
        @endif
    @endif
</div>
@endsection