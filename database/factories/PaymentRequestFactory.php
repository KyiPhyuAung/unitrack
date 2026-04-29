<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentRequestFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'method' => 'kbzpay',
            'amount_mmks' => 5000,
            'receipt_path' => 'receipts/sample.jpg',
            'status' => 'pending',
        ];
    }
}