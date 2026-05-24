<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'date',
        'price',
        'location',
        'image',
        'category',
        'is_recommended',
        'is_popular'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}