<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        abort_if(!$user, 401);

        return Task::where('user_id', $user->id)
            ->orderBy('task_date')
            ->orderBy('task_time')
            ->get()
            ->map(fn ($task) => $this->formatTask($task));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        abort_if(!$user, 401);

        if (($user->role ?? 'standard') === 'standard' && Task::where('user_id', $user->id)->count() >= 2) {
            return response()->json([
                'message' => 'Task limit reached. Upgrade to Premium to add more tasks.'
            ], 403);
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'task_date' => ['required', 'date'],
            'task_time' => ['nullable', 'date_format:H:i'],
            'priority_color' => ['required', 'string'],
            'status' => ['required', 'in:pending,ongoing,done'],
            'notify_at' => ['nullable', 'date'],
        ]);

        $data['user_id'] = $user->id;

        if (!empty($data['notify_at'])) {
            $data['notify_at'] = Carbon::parse($data['notify_at'])->format('Y-m-d H:i:s');
        }

        $task = Task::create($data);

        return response()->json($this->formatTask($task), 201);
    }

    public function update(Request $request, Task $task)
    {
        $user = $request->user();
        abort_if(!$user, 401);
        abort_if($task->user_id !== $user->id, 403);

        $data = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'task_date' => ['sometimes', 'required', 'date'],
            'task_time' => ['nullable', 'date_format:H:i'],
            'priority_color' => ['sometimes', 'required', 'string'],
            'status' => ['sometimes', 'required', 'in:pending,ongoing,done'],
            'notify_at' => ['nullable', 'date'],
        ]);

        if (array_key_exists('notify_at', $data)) {
            $data['notify_at'] = !empty($data['notify_at'])
                ? Carbon::parse($data['notify_at'])->format('Y-m-d H:i:s')
                : null;

            // important: allow email + website notification again after update
            $data['reminded_at'] = null;
            $data['notification_seen_at'] = null;
        }

        $task->update($data);

        return response()->json($this->formatTask($task->fresh()));
    }

    public function destroy(Request $request, Task $task)
    {
        $user = $request->user();
        abort_if(!$user, 401);
        abort_if($task->user_id !== $user->id, 403);

        $task->delete();

        return response()->json(['message' => 'Deleted']);
    }

    private function formatTask(Task $task): array
    {
        return [
            'id' => $task->id,
            'user_id' => $task->user_id,
            'title' => $task->title,
            'description' => $task->description,
            'task_date' => $task->task_date,
            'task_time' => $task->task_time ? substr($task->task_time, 0, 5) : null,
            'priority_color' => $task->priority_color,
            'status' => $task->status,
            'notify_at' => $task->notify_at
                ? Carbon::parse($task->notify_at)->format('Y-m-d H:i:s')
                : null,
            'reminded_at' => $task->reminded_at,
            'notification_seen_at' => $task->notification_seen_at,
            'created_at' => $task->created_at,
            'updated_at' => $task->updated_at,
        ];
    }
}