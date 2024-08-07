<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;
    protected $fillable = [
        'catagory_id',
        'name',
        'image',
        'price',
        'quantity',
        'count',
        'short_description',
        'description'
    ];
    public function catagory()
    {
        return $this->belongsTo(Catagory::class, 'catagory_id');
    }
}
