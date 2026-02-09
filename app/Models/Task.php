<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    protected $fillable = [
    'user_id',
    'title',
    'description',
    'task_date',
    'task_time',
    'priority_color',
    'status',
    'notify_at',
    ];

}
