<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => 'Sample Task',
            'description' => 'Sample task description',
            'task_date' => now()->addDay()->format('Y-m-d'),
            'task_time' => '13:10',
            'priority_color' => 'blue',
            'status' => 'pending',
            'notify_at' => now()->addHour()->format('Y-m-d H:i:s'),
            'reminded_at' => null,
            'notification_seen_at' => null,
        ];
    }
}