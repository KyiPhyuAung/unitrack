<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $pendingPayments = PaymentRequest::where('status', 'pending')->count();

        $totalUsers = User::count();
        $premiumUsers = User::where('role', 'premium')->count();
        $standardUsers = User::where('role', 'standard')->orWhereNull('role')->count();

        // tasks scheduled today (your DB uses task_date)
        $tasksToday = Task::whereDate('task_date', $today)->count();

        return view('admin.dashboard', compact(
            'pendingPayments',
            'totalUsers',
            'standardUsers',
            'premiumUsers',
            'tasksToday'
        ));
    }
}