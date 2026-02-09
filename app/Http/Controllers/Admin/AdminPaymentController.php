<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $pending = PaymentRequest::with('user')
            ->where('status', 'pending')
            ->latest()
            ->get();

        $history = PaymentRequest::with(['user','approver'])
            ->whereIn('status', ['approved','rejected'])
            ->latest()
            ->limit(50)
            ->get();

        return view('admin.payments.index', compact('pending', 'history'));
    }

    public function approve(Request $request, PaymentRequest $payment)
    {
        abort_if($payment->status !== 'pending', 400);

        $payment->status = 'approved';
        $payment->admin_note = $request->input('admin_note');
        $payment->approved_by = $request->user()->id;
        $payment->approved_at = now();
        $payment->save();

        // upgrade the user
        $user = User::find($payment->user_id);
        if ($user) {
            $user->role = 'premium';
            $user->save();
        }

        return back()->with('success', 'Approved ✅ User is now Premium.');
    }

    public function reject(Request $request, PaymentRequest $payment)
    {
        abort_if($payment->status !== 'pending', 400);

        $payment->status = 'rejected';
        $payment->admin_note = $request->input('admin_note');
        $payment->approved_by = $request->user()->id;
        $payment->approved_at = now();
        $payment->save();

        return back()->with('success', 'Rejected ❌');
    }
}