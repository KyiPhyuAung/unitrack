<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\PaymentRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PaymentRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_submit_payment_request(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'role' => 'standard',
        ]);

        $file = UploadedFile::fake()->image('receipt.jpg');

        $response = $this->actingAs($user)->post(route('payments.store'), [
            'method' => 'kbzpay',
            'amount_mmks' => 5000,
            'receipt' => $file,
        ]);

        $response->assertRedirect(route('payments.upgrade'));

        $this->assertDatabaseHas('payment_requests', [
            'user_id' => $user->id,
            'method' => 'kbzpay',
            'amount_mmks' => 5000,
            'status' => 'pending',
        ]);
    }

    public function test_user_cannot_submit_multiple_pending_requests(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'role' => 'standard',
        ]);

        PaymentRequest::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        $file = UploadedFile::fake()->image('receipt.jpg');

        $response = $this->actingAs($user)->post(route('payments.store'), [
            'method' => 'kbzpay',
            'amount_mmks' => 5000,
            'receipt' => $file,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error', 'You already submitted a receipt. Please wait for admin approval ✅');
    }

    public function test_premium_user_cannot_submit_payment_request(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'role' => 'premium',
        ]);

        $file = UploadedFile::fake()->image('receipt.jpg');

        $response = $this->actingAs($user)->post(route('payments.store'), [
            'method' => 'kbzpay',
            'amount_mmks' => 5000,
            'receipt' => $file,
        ]);

        $response->assertRedirect('/tasks');
        $response->assertSessionHas('success', 'You are already Premium 💎');
    }
}