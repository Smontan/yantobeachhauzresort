<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'reservations';

    protected $fillable = [
        'room_id',
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'address',
        'time_in',
        'time_out',
        'check_in',
        'check_out',
        'num_guests',
        'total_price',
        'status'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function updateStatus()
    {
        if ($this->status == 'confirmed' && $this->check_in == date('Y-m-d')) {
            $this->status = 'checkin';
            $this->save();
        }
    }
    public function routeNotificationForVonage($notification)
    {
        return $this->phone;
    }
}