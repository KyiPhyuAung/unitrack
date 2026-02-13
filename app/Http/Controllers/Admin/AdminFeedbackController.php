<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $pending = Feedback::where('is_public', false)->latest()->get();
        $approved = Feedback::where('is_public', true)->latest()->take(50)->get();

        return view('admin.feedback.index', compact('pending','approved'));
    }

    public function approve(Feedback $feedback)
    {
        $feedback->update(['is_public' => true]);
        return back()->with('success', 'Feedback approved ✅');
    }

    public function reject(Feedback $feedback)
    {
        $feedback->delete();
        return back()->with('success', 'Feedback removed 🗑️');
    }
}