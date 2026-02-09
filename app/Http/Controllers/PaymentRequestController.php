<?php

namespace App\Http\Controllers;

use App\Models\PaymentRequest;
use Illuminate\Http\Request;

class PaymentRequestController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        // If already premium, no need
        if (($user->role ?? 'standard') === 'premium') {
            return redirect('/tasks')->with('success', 'You are already Premium 💎');
        }

        // If they already have a pending request, show the page but tell them
        $pending = PaymentRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->latest()
            ->first();

        return view('payments.upgrade', compact('pending'));
    }

    public function store(Request $request)
    {
        $user = $request->user();

        if (($user->role ?? 'standard') === 'premium') {
            return redirect('/tasks')->with('success', 'You are already Premium 💎');
        }

        // Prevent multiple pending spam
        $hasPending = PaymentRequest::where('user_id', $user->id)->where('status', 'pending')->exists();
        if ($hasPending) {
            return back()->with('error', 'You already submitted a receipt. Please wait for admin approval ✅');
        }

        $data = $request->validate([
            'method' => ['required', 'string', 'in:kbzpay,wavepay,bank_kbz,bank_cb,bank_mab'],
            'amount_mmks' => ['required', 'integer', 'min:1000', 'max:10000000'],
            'receipt' => ['required', 'image', 'max:4096'], // 4MB
        ]);

        $path = $request->file('receipt')->store('receipts', 'public');

        PaymentRequest::create([
            'user_id' => $user->id,
            'method' => $data['method'],
            'amount_mmks' => $data['amount_mmks'],
            'receipt_path' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('payments.upgrade')->with('success', 'Receipt uploaded ✅ Admin will confirm soon.');
    }
}