<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentRequestController;
use App\Http\Controllers\FeedbackController;

use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\Api\NotificationApiController;

use App\Http\Controllers\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminUserController;

use App\Models\Feedback;

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $feedbacks = Feedback::where('is_public', true)
        ->latest()
        ->take(12)
        ->get();

    return view('welcome', compact('feedbacks'));
})->name('home');

Route::view('/about', 'site.about')->name('site.about');
Route::view('/features', 'site.features')->name('site.features');
Route::view('/pricing', 'site.pricing')->name('site.pricing');
Route::view('/contact', 'site.contact')->name('site.contact');
Route::view('/faq', 'site.faq')->name('site.faq');
Route::view('/terms', 'site.terms')->name('site.terms');
Route::view('/privacy', 'site.privacy')->name('site.privacy');

/*
|--------------------------------------------------------------------------
| Authenticated - Student Area ONLY
| (Admins should NOT enter these)
|--------------------------------------------------------------------------
| Requires: 'not_admin' middleware alias (Laravel 11 => bootstrap/app.php)
*/

Route::middleware(['auth', 'not_admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Tasks (web UI)
    Route::get('/tasks', function () {
        return view('tasks.index');
    })->name('tasks.index');

    // Upgrade (user payment request)
    Route::get('/upgrade', [PaymentRequestController::class, 'create'])->name('payments.upgrade');
    Route::post('/upgrade', [PaymentRequestController::class, 'store'])->name('payments.store');

    // Feedback (users only - admins shouldn't give feedback)
    Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Forgot Password (OTP flow) - Guest only
|--------------------------------------------------------------------------
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

/*
|--------------------------------------------------------------------------
| Admin Area (auth + admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports');

    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments/{payment}/approve', [AdminPaymentController::class, 'approve'])->name('payments.approve');
    Route::post('/payments/{payment}/reject', [AdminPaymentController::class, 'reject'])->name('payments.reject');

    Route::get('/feedback', [AdminFeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/feedback/{feedback}/approve', [AdminFeedbackController::class, 'approve'])->name('feedback.approve');
    Route::post('/feedback/{feedback}/reject', [AdminFeedbackController::class, 'reject'])->name('feedback.reject');

    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('users.role');
    Route::post('/users/{user}/delete', [AdminUserController::class, 'destroy'])->name('users.delete');
});

/*
|--------------------------------------------------------------------------
| API - Auth required
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('api')->group(function () {
    Route::get('/tasks', [TaskApiController::class, 'index']);
    Route::post('/tasks', [TaskApiController::class, 'store']);
    Route::patch('/tasks/{task}', [TaskApiController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskApiController::class, 'destroy']);

    Route::get('/notifications', [NotificationApiController::class, 'index']);
    Route::get('/tasks/preview', [NotificationApiController::class, 'preview']);
});

/*
|--------------------------------------------------------------------------
| Auth routes (Breeze / Jetstream)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';