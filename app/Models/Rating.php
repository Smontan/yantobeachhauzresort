<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'room_id',
        'stars_rated'
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
