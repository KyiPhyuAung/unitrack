<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'task_date',
        'task_time',
        'priority_color',
        'status',
        'notify_at',
        'reminded_at',
        'notification_seen_at',
    ];

    protected $casts = [
        'notify_at' => 'datetime',
        'reminded_at' => 'datetime',
        'notification_seen_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}