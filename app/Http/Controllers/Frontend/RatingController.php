<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('room_rating');
        $room_id = $request->input('room_id');

        $room_check = Room::where('id', $room_id)->where('status', '0')->first();

        if ($room_check) {
            $existing_rating = Rating::where('user_id', Auth::id())->where('room_id', $room_id)->exists();

            if ($existing_rating) { 
                $update_rating = Rating::where('user_id', Auth::id())->where('room_id', $room_id)->first();
                $update_rating->stars_rated = $stars_rated;
                $update_rating->update();

                flash()
                    ->option('timeout', 3000)
                    ->addSuccess('You update the rating of this room.');
                return redirect()->back();
                // return redirect()->back()->with('status', 'You update the rating of this room successfully!');
            } else {
                Rating::create([
                    'user_id' => Auth::id(),
                    'room_id' => $room_id,
                    'stars_rated' => $stars_rated
                ]);
            }
            flash()
                ->option('timeout', 3000)
                ->addSuccess('Thank you for rating this room');
            return redirect()->back();
            // return redirect()->back()->with('status', 'Thank you for rating this room');
        } else {
            flash()
                ->option('timeout', 3000)
                ->addSuccess('The star rating of this room is currently unavailable');
            return redirect()->back();
            // return redirect()->back()->with('error', 'The star rating of this room is currently unavailable');
        }

    }
}