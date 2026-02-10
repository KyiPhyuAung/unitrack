<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
    {
        $emojis = ['😍','🔥','✅','🧠','⚡','🎯','👏','💎','🙂','😅','🤔','😡','🐛','💡','🚀'];
        return view('feedback.create', compact('emojis'));
    }

    public function store(Request $request)
    {
        $emojis = ['😍','🔥','✅','🧠','⚡','🎯','👏','💎','🙂','😅','🤔','😡','🐛','💡','🚀'];

        $data = $request->validate([
            'display_name' => ['nullable','string','max:50'],
            'emoji'        => ['required','string','max:8'],
            'rating'       => ['required','integer','min:1','max:5'], // ⭐ NEW
            'message'      => ['required','string','min:3','max:1000'],
        ]);

        if (!in_array($data['emoji'], $emojis, true)) {
            return back()->withErrors(['emoji' => 'Invalid emoji selected.'])->withInput();
        }

        \App\Models\Feedback::create([
            'user_id' => $request->user()->id,
            'display_name' => $data['display_name'] ?: $request->user()->name,
            'emoji' => $data['emoji'],
            'rating' => (int) $data['rating'],
            'message' => $data['message'],
            'is_public' => true,
        ]);

        return redirect()->route('feedback.create')->with('success', 'Thanks! Your feedback was sent 🎉');
    }
}