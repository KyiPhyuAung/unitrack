<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        abort_if(!$user, 401);

        return Task::where('user_id', $user->id)
            ->orderBy('task_date')
            ->orderBy('task_time')
            ->get();
    }

    public function store(Request $request)
    {
        $user = $request->user();
        abort_if(!$user, 401);

        $role = $user->role ?? 'standard';

        if ($role === 'standard' && \App\Models\Task::where('user_id', $user->id)->count() >= 2) {
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

        $task = Task::create($data);

        return response()->json($task, 201);
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

        $task->update($data);

        return response()->json($task);
    }

    public function destroy(Request $request, Task $task)
    {
        $user = $request->user();
        abort_if(!$user, 401);
        abort_if($task->user_id !== $user->id, 403);

        $task->delete();

        return response()->json(['message' => 'Deleted']);
    }
}