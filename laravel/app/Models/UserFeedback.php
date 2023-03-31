<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    use HasFactory;
    protected $table = 'users_feedbacks';
    protected $fillable=[
        'user_name',
        'feedback'
    ];
}
