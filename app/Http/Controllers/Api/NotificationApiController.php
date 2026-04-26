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
        $upcomingWindow = now()->addMinutes(5);

        $expired = Task::where('user_id', $user->id)
            ->where('status', '!=', 'done')
            ->whereNull('notification_seen_at')
            ->whereNotNull('task_date')
            ->get()
            ->filter(function ($task) use ($now) {
                $dueAt = $this->taskDueCarbon($task);
                return $dueAt && $dueAt->lte($now);
            })
            ->take(10)
            ->values();

        $reminders = Task::where('user_id', $user->id)
            ->where('status', '!=', 'done')
            ->whereNotNull('notify_at')
            ->whereNull('notification_seen_at')
            ->where('notify_at', '<=', $upcomingWindow)
            ->orderBy('notify_at')
            ->limit(10)
            ->get();

        $items = [];

        foreach ($expired as $task) {
            $items[] = [
                'id' => $task->id,
                'icon' => '⏳',
                'title' => $task->title,
                'message' => 'This task is overdue. Please update the status or reschedule it.',
                'badge' => 'Expired',
                'badgeClass' => 'bg-red-100 text-red-700',
                'created_at' => optional($task->updated_at)->diffForHumans(),
            ];
        }

        foreach ($reminders as $task) {
            $notifyAt = Carbon::parse($task->notify_at);
            $isUpcoming = $notifyAt->gt($now);

            $items[] = [
                'id' => $task->id,
                'icon' => $isUpcoming ? '⏰' : '🔔',
                'title' => $task->title,
                'message' => $isUpcoming
                    ? 'This task reminder is coming soon. Be ready.'
                    : 'Reminder time has arrived. Please check this task.',
                'badge' => $isUpcoming ? 'Upcoming' : 'Due',
                'badgeClass' => $isUpcoming
                    ? 'bg-yellow-100 text-yellow-700'
                    : 'bg-blue-100 text-blue-700',
                'created_at' => optional($task->notify_at)->diffForHumans(),
            ];
        }

        return response()->json([
            'count' => count($items),
            'items' => collect($items)->sortBy('id')->values(),
        ]);
    }

    public function clear(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'integer'],
        ]);

        Task::where('id', $data['id'])
            ->where('user_id', $request->user()->id)
            ->update([
                'notification_seen_at' => now(),
            ]);

        return response()->json([
            'success' => true,
            'cleared_id' => $data['id'],
        ]);
    }

    public function clearAll(Request $request)
    {
        $user = $request->user();
        $now = now();
        $upcomingWindow = now()->addMinutes(5);

        Task::where('user_id', $user->id)
            ->where('status', '!=', 'done')
            ->whereNull('notification_seen_at')
            ->where(function ($query) use ($now, $upcomingWindow) {
                $query->where(function ($q) use ($upcomingWindow) {
                    $q->whereNotNull('notify_at')
                      ->where('notify_at', '<=', $upcomingWindow);
                })
                ->orWhere(function ($q) use ($now) {
                    $q->whereNotNull('task_date');
                });
            })
            ->update([
                'notification_seen_at' => now(),
            ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function preview(Request $request)
    {
        $user = $request->user();

        $tasks = Task::where('user_id', $user->id)
            ->orderByRaw("CASE status WHEN 'pending' THEN 1 WHEN 'ongoing' THEN 2 WHEN 'done' THEN 3 ELSE 4 END")
            ->orderByDesc('created_at')
            ->limit(4)
            ->get()
            ->map(function ($task) {
                $badge = match ($task->status) {
                    'done' => 'Done ✅',
                    'ongoing' => 'Ongoing ⏳',
                    default => 'Pending 🕒',
                };

                $badgeClass = match ($task->status) {
                    'done' => 'bg-emerald-100 text-emerald-700',
                    'ongoing' => 'bg-purple-100 text-purple-700',
                    default => 'bg-slate-100 text-slate-700',
                };

                $meta = trim(($task->task_date ?? '') . ' ' . ($task->task_time ?? ''));

                if ($meta === '') {
                    $meta = 'No schedule set';
                }

                return [
                    'title' => $task->title,
                    'meta' => $meta,
                    'badge' => $badge,
                    'badgeClass' => $badgeClass,
                ];
            });

        return response()->json($tasks);
    }

    private function taskDueCarbon($task): ?Carbon
    {
        if (!$task->task_date) {
            return null;
        }

        $time = $task->task_time ?: '23:59:59';

        return Carbon::parse($task->task_date . ' ' . $time);
    }
}