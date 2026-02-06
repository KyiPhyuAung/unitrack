<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordOtpMail;
use App\Models\AdminPasswordOtp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AdminForgotPasswordController extends Controller
{
    public function showEmailForm()
    {
        return view('admin_auth.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $email = strtolower(trim($data['email']));

        // Only admins can use this route
        $admin = User::where('email', $email)->where('role', 'admin')->first();
        if (!$admin) {
            return back()->withErrors([
                'email' => 'This email is not registered as an admin.',
            ])->withInput();
        }

        // Basic throttling: allow one OTP per 60 seconds per email
        $recent = AdminPasswordOtp::where('email', $email)
            ->where('created_at', '>=', now()->subSeconds(60))
            ->first();
        if ($recent) {
            return back()->withErrors([
                'email' => 'Please wait 1 minute before requesting another code.',
            ])->withInput();
        }

        // Generate OTP
        $otp = (string) random_int(100000, 999999);

        // Delete old OTP records for this email (clean)
        AdminPasswordOtp::where('email', $email)->delete();

        // Store hashed OTP
        AdminPasswordOtp::create([
            'email' => $email,
            'code_hash' => Hash::make($otp),
            'expires_at' => now()->addMinutes(10),
            'attempts' => 0,
        ]);

        // Send email
        Mail::to($email)->send(new AdminPasswordOtpMail($otp, 10));

        // Store email in session for verification step
        $request->session()->put('admin_otp_email', $email);

        return redirect()->route('admin.otp.form')
            ->with('status', 'Verification code sent to your email.');
    }

    public function showOtpForm(Request $request)
    {
        $email = $request->session()->get('admin_otp_email');

        if (!$email) {
            return redirect()->route('admin.forgot.form');
        }

        return view('admin_auth.verify-otp', [
            'email' => $email,
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $email = $request->session()->get('admin_otp_email');
        if (!$email) {
            return redirect()->route('admin.forgot.form');
        }

        $data = $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $record = AdminPasswordOtp::where('email', $email)->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'No active code found. Please request a new one.']);
        }

        if (now()->greaterThan($record->expires_at)) {
            AdminPasswordOtp::where('email', $email)->delete();
            return back()->withErrors(['otp' => 'Code expired. Please request a new one.']);
        }

        if ($record->attempts >= 5) {
            AdminPasswordOtp::where('email', $email)->delete();
            return back()->withErrors(['otp' => 'Too many attempts. Please request a new code.']);
        }

        $record->attempts += 1;
        $record->save();

        if (!Hash::check($data['otp'], $record->code_hash)) {
            return back()->withErrors(['otp' => 'Invalid code. Please try again.']);
        }

        // OTP correct: delete record and send the standard Laravel reset link email
        AdminPasswordOtp::where('email', $email)->delete();
        $request->session()->forget('admin_otp_email');

        $status = Password::sendResetLink(['email' => $email]);

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('login')->with('status', __($status))
            : redirect()->route('admin.forgot.form')->withErrors(['email' => __($status)]);
    }
}
