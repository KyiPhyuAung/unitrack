<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\University;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_name_and_university(): void
    {
        $user = User::factory()->create([
            'name' => 'Old Name',
            'role' => 'standard',
        ]);

        $university = University::create([
            'name' => 'University of Mandalay',
        ]);

        $response = $this->actingAs($user)->patch(route('profile.update'), [
            'name' => 'New Student Name',
            'email' => $user->email,
            'university_id' => $university->id,
        ]);

        $response->assertRedirect();

        $user->refresh();

        $this->assertEquals('New Student Name', $user->name);
        $this->assertEquals($university->id, $user->university_id);
    }
}