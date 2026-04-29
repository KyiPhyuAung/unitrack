<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PaymentRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'method',
        'amount_mmks',
        'receipt_path',
        'status',
        'admin_note',
        'approved_by',
        'approved_at',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function approver()
    {
        return $this->belongsTo(\App\Models\User::class, 'approved_by');
    }
}