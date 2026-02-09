<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\PaymentRequestController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminReportController;

Route::view('/', 'welcome')->name('home');

Route::view('/about', 'site.about');
Route::view('/features', 'site.features');
Route::view('/pricing', 'site.pricing');
Route::view('/contact', 'site.contact');
Route::view('/faq', 'site.faq');
Route::view('/terms', 'site.terms');
Route::view('/privacy', 'site.privacy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Upgrade (user payment request)
    Route::get('/upgrade', [PaymentRequestController::class, 'create'])->name('payments.upgrade');
    Route::post('/upgrade', [PaymentRequestController::class, 'store'])->name('payments.store');

    // Tasks page (web UI)
    Route::get('/tasks', function () {
        return view('tasks.index');
    })->name('tasks.index');
});

/**
 * Admin Forgot Password (OTP flow)
 * Keep this as guest-only so logged-in users don't use it.
 */
Route::middleware('guest')->group(function () {
    Route::get('/admin/forgot-password', [AdminForgotPasswordController::class, 'showEmailForm'])
        ->name('admin.forgot.form');

    Route::post('/admin/forgot-password', [AdminForgotPasswordController::class, 'sendOtp'])
        ->name('admin.forgot.send');

    Route::get('/admin/verify-otp', [AdminForgotPasswordController::class, 'showOtpForm'])
        ->name('admin.otp.form');

    Route::post('/admin/verify-otp', [AdminForgotPasswordController::class, 'verifyOtp'])
        ->name('admin.otp.verify');
});

/**
 * Admin Area (MUST be auth + admin)
 * This replaces ALL your old /admin closure routes and duplicates.
 */
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports');

    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
    Route::post('/payments/{payment}/approve', [AdminPaymentController::class, 'approve'])->name('admin.payments.approve');
    Route::post('/payments/{payment}/reject', [AdminPaymentController::class, 'reject'])->name('admin.payments.reject');
});

/**
 * API routes for tasks (used by your frontend)
 * Still protected by auth.
 */
Route::middleware('auth')->prefix('api')->group(function () {
    Route::get('/tasks', [TaskApiController::class, 'index']);
    Route::post('/tasks', [TaskApiController::class, 'store']);
    Route::patch('/tasks/{task}', [TaskApiController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskApiController::class, 'destroy']);
});

require __DIR__ . '/auth.php';