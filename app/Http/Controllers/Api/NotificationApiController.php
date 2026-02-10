<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $now = now();

        // Expired = past due (date+time) and NOT done
        $expired = Task::where('user_id', $user->id)
            ->where('status', '!=', 'done')
            ->whereNotNull('task_date')
            ->get()
            ->filter(function ($t) use ($now) {
                $dt = $this->taskDueCarbon($t);
                return $dt && $dt->lte($now);
            })
            ->take(5)
            ->values();

        // Due reminders = notify_at reached AND not reminded yet AND not done
        $dueReminders = Task::where('user_id', $user->id)
            ->where('status', '!=', 'done')
            ->whereNotNull('notify_at')
            ->whereNull('reminded_at')
            ->where('notify_at', '<=', $now)
            ->orderBy('notify_at')
            ->limit(5)
            ->get();

        $items = [];

        foreach ($expired as $t) {
            $items[] = [
                'icon' => '⏳',
                'title' => $t->title,
                'message' => 'This task is expired. Please update status or reschedule.',
                'badge' => 'Expired',
                'badgeClass' => 'bg-red-100 text-red-700',
            ];
        }

        foreach ($dueReminders as $t) {
            $items[] = [
                'icon' => '🔔',
                'title' => $t->title,
                'message' => 'Notify time reached. Check the task now.',
                'badge' => 'Due',
                'badgeClass' => 'bg-blue-100 text-blue-700',
            ];
        }

        return response()->json([
            'count' => count($items),
            'items' => $items,
        ]);
    }

    public function preview(Request $request)
    {
        $user = $request->user();

        $tasks = Task::where('user_id', $user->id)
            ->orderByRaw("FIELD(status,'pending','ongoing','done')")
            ->orderByDesc('created_at')
            ->limit(4)
            ->get()
            ->map(function ($t) {
                $badge = match ($t->status) {
                    'done' => 'Done ✅',
                    'ongoing' => 'Ongoing ⏳',
                    default => 'Pending 🕒',
                };

                $badgeClass = match ($t->status) {
                    'done' => 'bg-emerald-100 text-emerald-700',
                    'ongoing' => 'bg-purple-100 text-purple-700',
                    default => 'bg-slate-100 text-slate-700',
                };

                $meta = trim(($t->task_date ?? '') . ' ' . ($t->task_time ?? ''));
                if ($meta === '') $meta = 'No schedule set';

                return [
                    'title' => $t->title,
                    'meta' => $meta,
                    'badge' => $badge,
                    'badgeClass' => $badgeClass,
                ];
            });

        return response()->json($tasks);
    }

    private function taskDueCarbon($task): ?Carbon
    {
        if (!$task->task_date) return null;
        $time = $task->task_time ?: '23:59:59';
        return Carbon::parse($task->task_date . ' ' . $time);
    }
}