<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $table = 'users_orders';

    protected $fillable = [
        'user_name',
        'phone_number',
        'email',
        'description'
    ];
}
