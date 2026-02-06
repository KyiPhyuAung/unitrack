<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Api\TaskApiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/', 'site.welcome');
Route::view('/about', 'site.about');
Route::view('/features', 'site.features');
Route::view('/pricing', 'site.pricing');
Route::view('/contact', 'site.contact');
Route::view('/faq', 'site.faq');
Route::view('/terms', 'site.terms');
Route::view('/privacy', 'site.privacy');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth']);


require __DIR__.'/auth.php';



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



Route::middleware(['auth'])->prefix('api')->group(function () {
    Route::get('/tasks', [TaskApiController::class, 'index']);
    Route::post('/tasks', [TaskApiController::class, 'store']);
    Route::patch('/tasks/{task}', [TaskApiController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskApiController::class, 'destroy']);
});

Route::get('/tasks', function () {
    return view('tasks.index');
})->middleware(['auth'])->name('tasks.index');


