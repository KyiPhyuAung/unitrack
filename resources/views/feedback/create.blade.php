@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4 sm:p-6">
    <div class="glass rounded-3xl p-6">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-extrabold text-slate-900">Send Feedback</h1>
            <a href="{{ route('dashboard') }}" class="text-sm text-slate-600 hover:underline">Back</a>
        </div>

        @if (session('success'))
            <div class="mt-4 p-3 rounded-xl bg-emerald-50 text-emerald-800 border border-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('feedback.store') }}" class="mt-6 space-y-4">
            @csrf

            <div>
                <label class="text-sm font-semibold text-slate-700">Name (optional)</label>
                <input name="display_name" value="{{ old('display_name') }}"
                       class="mt-1 w-full rounded-xl border border-slate-200 px-3 py-2 bg-white/70"
                       placeholder="e.g. Kyi Phyu" />
                @error('display_name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="text-sm font-semibold text-slate-700">Mood</label>
                <div class="mt-2 flex flex-wrap gap-2">
                    @foreach($emojis as $e)
                        <label class="cursor-pointer">
                            <input type="radio" name="emoji" value="{{ $e }}"
                                   class="hidden peer" {{ old('emoji','💬') === $e ? 'checked' : '' }}>
                            <span class="px-3 py-2 rounded-xl bg-white/60 border border-white/60
                                         peer-checked:bg-slate-900 peer-checked:text-white transition inline-block">
                                {{ $e }}
                            </span>
                        </label>
                    @endforeach
                </div>
                @error('emoji') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-sm font-semibold text-slate-700">Rating</label>
                <div class="mt-2 flex items-center gap-2">
                    @for($i=1; $i<=5; $i++)
                    <label class="cursor-pointer">
                        <input type="radio" name="rating" value="{{ $i }}" class="hidden peer"
                            {{ (int)old('rating',5) === $i ? 'checked' : '' }}>
                        <span class="px-3 py-2 rounded-xl bg-white/60 border border-white/60
                                    peer-checked:bg-slate-900 peer-checked:text-white transition inline-flex items-center gap-1">
                        <span>⭐</span><span class="text-sm">{{ $i }}</span>
                        </span>
                    </label>
                    @endfor
                </div>
                @error('rating') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            <div>
                <label class="text-sm font-semibold text-slate-700">Message</label>
                <textarea name="message" rows="5"
                          class="mt-1 w-full rounded-xl border border-slate-200 px-3 py-2 bg-white/70"
                          placeholder="Tell us what to improve...">{{ old('message') }}</textarea>
                @error('message') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <button class="w-full rounded-xl bg-slate-900 text-white font-semibold py-3 hover:opacity-95 transition">
                Submit feedback ✨
            </button>
        </form>
    </div>
</div>
@endsection