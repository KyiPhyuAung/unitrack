<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    
    protected $fillable = [
    'user_id','display_name','role_tag','emoji','rating','message','is_public'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}