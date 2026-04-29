<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\PaymentRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPaymentApprovalTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_approve_payment_and_upgrade_user(): void
    {
        // Create admin
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        // Create standard user
        $user = User::factory()->create([
            'role' => 'standard',
        ]);

        // Create pending payment request
        $payment = PaymentRequest::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        // Admin approves payment
        $response = $this->actingAs($admin)->post(route('admin.payments.approve', $payment->id));

        // Check redirect
        $response->assertRedirect();

        // Refresh models
        $user->refresh();
        $payment->refresh();

        // ✅ User becomes premium
        $this->assertEquals('premium', $user->role);

        // ✅ Payment becomes approved
        $this->assertEquals('approved', $payment->status);
    }
}