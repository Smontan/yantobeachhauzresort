<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    
    public function index(int $checkId)
    {        
        //Check if user is authenticated
        if(!Auth::check()) {
            return redirect()->route('login');
        }else {
            $roomId = $checkId;
            
            $ratings = Rating::all();
            return view('user.reservation.index', compact('roomId', 'ratings'));
        }
    }
    public function userReservations()
    {
        $userReservations = Reservation::where('user_id' , auth()->user()->id)
            ->get();
        return view('user.reservation.show', compact('userReservations'));
    }

    public function view()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.view', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('admin.reservation.create', compact('rooms'));
    }

    public function history()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.history', compact('reservations'));
    }

    
}
