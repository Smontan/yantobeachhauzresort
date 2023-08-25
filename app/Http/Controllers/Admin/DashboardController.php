<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Reservation::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();
        $confirmedReservations = Reservation::where('status', 'confirmed')->count();
        $checkinReservations = Reservation::where('status', 'checkin')->count();
        $cancelReservations = Reservation::where('status', 'cancel')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $monthDate = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $rooms = Room::count();
        $todaysReservation = Room::whereDate('created_at', $todayDate)->count();
        
        $totalRevenue = Reservation::sum('total_price');
        $todayProfit = Reservation::whereDate('created_at', $todayDate)->sum('total_price');
        $monthlyProfit = Reservation::whereDate('created_at', $monthDate)->sum('total_price');
        $yearlyProfit = Reservation::whereDate('created_at', $thisYear)->sum('total_price');
        
        $users = User::count();
        $adminCount = User::where('role_as', '1')->count();
        $userCount = User::where('role_as', '0')->count();

        $latestReservations = Reservation::latest()->take(10)->get();

        return view('admin.dashboard.index', compact(
                    'reservations',
                    'rooms',
                    'users',
                    'pendingReservations',
                    'confirmedReservations',
                    'checkinReservations',
                    'cancelReservations',
                    'todaysReservation',
                    'adminCount',
                    'userCount',
                    'totalRevenue',
                    'todayProfit',
                    'monthlyProfit',
                    'yearlyProfit',
                    'latestReservations',

                ));
    }

   
}
