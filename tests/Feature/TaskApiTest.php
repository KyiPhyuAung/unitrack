<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_premium_user_can_create_task(): void
    {
        $user = User::factory()->create([
            'role' => 'premium',
        ]);

        $response = $this->actingAs($user)->postJson('/api/tasks', [
            'title' => 'Finish UniTrack Report',
            'description' => 'Write Task 2 testing section',
            'task_date' => now()->addDay()->format('Y-m-d'),
            'task_time' => '13:10',
            'priority_color' => 'red',
            'status' => 'pending',
            'notify_at' => now()->addHour()->format('Y-m-d H:i:s'),
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('tasks', [
            'user_id' => $user->id,
            'title' => 'Finish UniTrack Report',
            'priority_color' => 'red',
            'status' => 'pending',
        ]);
    }

    public function test_standard_user_cannot_create_more_than_two_tasks(): void
    {
        $user = User::factory()->create([
            'role' => 'standard',
        ]);

        Task::factory()->count(2)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->postJson('/api/tasks', [
            'title' => 'Third Task',
            'description' => 'This should be blocked',
            'task_date' => now()->addDay()->format('Y-m-d'),
            'task_time' => '14:00',
            'priority_color' => 'blue',
            'status' => 'pending',
            'notify_at' => now()->addHour()->format('Y-m-d H:i:s'),
        ]);

        $response->assertStatus(403);

        $response->assertJson([
            'message' => 'Task limit reached. Upgrade to Premium to add more tasks.',
        ]);
    }

    public function test_user_can_update_task_and_reset_reminder_status(): void
    {
        $user = User::factory()->create([
            'role' => 'premium',
        ]);

        $task = Task::factory()->create([
            'user_id' => $user->id,
            'title' => 'Old Reminder Task',
            'notify_at' => now()->subHour()->format('Y-m-d H:i:s'),
            'reminded_at' => now(),
            'notification_seen_at' => now(),
        ]);

        $response = $this->actingAs($user)->patchJson("/api/tasks/{$task->id}", [
            'title' => 'Updated Reminder Task',
            'notify_at' => now()->addHour()->format('Y-m-d H:i:s'),
        ]);

        $response->assertStatus(200);

        $task->refresh();

        $this->assertEquals('Updated Reminder Task', $task->title);
        $this->assertNull($task->reminded_at);
        $this->assertNull($task->notification_seen_at);
    }

    public function test_user_can_delete_own_task(): void
    {
        $user = User::factory()->create([
            'role' => 'premium',
        ]);

        $task = Task::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}