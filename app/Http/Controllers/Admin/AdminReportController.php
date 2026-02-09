<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminReportController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $totalUsers = User::count();
        $premiumUsers = User::where('role', 'premium')->count();
        $standardUsers = User::where('role', 'standard')->orWhereNull('role')->count();

        $tasksTotal = Task::count();
        $tasksToday = Task::whereDate('created_at', $today)->count();

        $byStatus = [
            'pending' => Task::where('status','pending')->count(),
            'ongoing' => Task::where('status','ongoing')->count(),
            'done'    => Task::where('status','done')->count(),
        ];

        // Overdue = task_date/time passed AND NOT done (uses notify_at if you want, but this uses task_date + task_time)
        $overdueCount = Task::where('status','!=','done')
            ->whereNotNull('task_date')
            ->where(function($q){
                $q->whereRaw("TIMESTAMP(task_date, COALESCE(task_time,'23:59:59')) < ?", [now()]);
            })
            ->count();

        // Payments pending (if your model exists)
        $pendingPayments = class_exists(\App\Models\PaymentRequest::class)
            ? \App\Models\PaymentRequest::where('status','pending')->count()
            : 0;

        // last 7 days users signups
        $days = collect(range(6,0))->map(function($i){
            $d = now()->subDays($i)->startOfDay();
            return [
                'label' => $d->format('D'),
                'date'  => $d->toDateString(),
            ];
        });

        $signupSeries = $days->map(fn($x) => User::whereDate('created_at', $x['date'])->count())->values();
        $signupLabels = $days->pluck('label')->values();

        return view('admin.reports', compact(
            'totalUsers','premiumUsers','standardUsers',
            'tasksTotal','tasksToday','byStatus','overdueCount',
            'pendingPayments','signupSeries','signupLabels'
        ));
    }
}