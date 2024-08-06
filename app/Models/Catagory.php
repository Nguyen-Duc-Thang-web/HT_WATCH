<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'image',
        'count',
    ];
    public function watches()
    {
        return $this->hasMany(Watch::class, 'catagory_id');
    }
}
