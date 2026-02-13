@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto p-4 sm:p-6 space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-extrabold">Feedback approvals</h1>
  </div>

  @if(session('success'))
    <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800">
      {{ session('success') }}
    </div>
  @endif

  <div class="glass rounded-3xl p-6">
    <h2 class="font-bold text-lg">Pending</h2>
    <div class="mt-4 space-y-3">
      @forelse($pending as $f)
        <div class="rounded-2xl bg-white/70 border border-white/60 p-4">
          <div class="flex items-center justify-between gap-3">
            <div class="font-bold">{{ $f->display_name }}</div>
            <div class="flex items-center gap-2">
              <span class="pill text-xs">{{ $f->role_tag ?? 'User' }}</span>
              <span class="text-xl">{{ $f->emoji }}</span>
            </div>
          </div>

          <div class="mt-2 text-slate-700">“{{ $f->message }}”</div>

          <div class="mt-2 text-sm">
            @for($i=1;$i<=5;$i++)
              <span class="{{ $i <= (int)$f->rating ? '' : 'opacity-25' }}">⭐</span>
            @endfor
          </div>

          <div class="mt-3 flex gap-2">
            <form method="POST" action="{{ route('admin.feedback.approve',$f) }}">
              @csrf
              <button class="px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-semibold">Approve ✅</button>
            </form>
            <form method="POST" action="{{ route('admin.feedback.reject',$f) }}">
              @csrf
              <button class="px-4 py-2 rounded-xl bg-white/70 border border-white/60 text-sm font-semibold">Reject 🗑️</button>
            </form>
          </div>
        </div>
      @empty
        <div class="text-slate-600">No pending feedback 🎉</div>
      @endforelse
    </div>
  </div>
</div>
@endsection