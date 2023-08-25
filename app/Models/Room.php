<?php

namespace App\Models;

use App\Models\Amenity;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\RoomImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'promo_rate',
        'no_breakfast_price',
        'max_guests',
        'num_beds',
        'status'
    ];

    public function reservation()
    {
        return $this->belongsToMany(Reservation::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function roomImages()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function comments()
    { 
        return $this->hasMany(Comment::class, 'room_id', 'id');
    }

    public function ratings()
    {
        return $this-> hasMany(Rating::class, 'room_id', 'id');
    }

}