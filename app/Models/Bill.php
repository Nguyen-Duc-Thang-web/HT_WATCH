<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'phone',
        'address',
        'notes',
        'total',
        'status',
        'user_id',
    ];
}
