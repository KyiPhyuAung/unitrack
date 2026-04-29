<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_due_notification(): void
    {
        $user = User::factory()->create(['role' => 'premium']);

        Task::factory()->create([
            'user_id' => $user->id,
            'title' => 'Due Reminder Task',
            'status' => 'pending',
            'notify_at' => now()->subMinute()->format('Y-m-d H:i:s'),
            'notification_seen_at' => null,
        ]);

        $response = $this->actingAs($user)->getJson('/api/notifications');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => 'Due Reminder Task',
            'badge' => 'Due',
        ]);
    }

    public function test_user_can_clear_single_notification(): void
    {
        $user = User::factory()->create(['role' => 'premium']);

        $task = Task::factory()->create([
            'user_id' => $user->id,
            'title' => 'Clear This Notification',
            'notify_at' => now()->subMinute()->format('Y-m-d H:i:s'),
            'notification_seen_at' => null,
        ]);

        $response = $this->actingAs($user)->postJson('/api/notifications/clear', [
            'id' => $task->id,
        ]);

        $response->assertStatus(200);

        $task->refresh();

        $this->assertNotNull($task->notification_seen_at);
    }
}