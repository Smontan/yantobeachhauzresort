<?php

namespace App\Http\Livewire\Reservation;

use App\Models\Rating;
use App\Models\Reservation;
use App\Models\Room;

use App\Models\User;
use App\Notifications\NewReservationNotification;
use App\Notifications\ReservationEmailNotification;
use App\Notifications\ReservationSmsNotification;
use Illuminate\Notifications\Facades\Vonage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Index extends Component
{
    public  $room_id, $check_in, $check_out, $first_name, $last_name, $phone, $num_guests, $address, $time_in, $time_out;
    public $withBreakfast = false;

    public $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
        'time_in' => 'required|date_format:H:i',
        'time_out' => 'required|date_format:H:i',
        'address' => 'required',
        // 'num_guests' => 'required',
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',        
    ];

    public function resetInput() {
        $this->check_in = NULL;
        $this->check_out = NULL;
        $this->time_in = NULL;
        $this->time_out = NULL;
        $this->first_name = NULL;
        $this->last_name = NULL;
        $this->phone = NULL;
        $this->address = NULL;
        $this->num_guests = NULL;
        $this->withBreakfast = NULL;
    }

  

    public function closeModal()
    {
    $this->resetInput();
    }

    public function closeModalOnError()
    {
        $this->emit('closeModalOnError');
    }

    public function mount($roomId)
    {
        $this->room_id = $roomId;
    }

    public function roomReservation($totalAmount)
    {
        
        $reservations = Reservation::where('room_id', $this->room_id)
        ->where(function ($query) {
            $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                ->orWhereBetween('check_out', [$this->check_in, $this->check_out]);
        })
        ->get();

        $reservationStatus = Reservation::where('room_id', $this->room_id)
        ->where(function ($query) {
            $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                ->orWhereBetween('check_out', [$this->check_in, $this->check_out])
                ->where('status', 'cancel');
        })
        ->get();

        if ($reservations->count() > 0) {
            if($reservationStatus->count() > 0){
                $this->validate();
            }else {
                // session()->flash('error', 'The selected check-in date or check-out date is not available for this room.');

                flash()
                    ->option('timeout', 3000)
                    ->addError('The selected check-in date or check-out date is not available for this room.');

                $this->resetInput();
                $this->closeModalOnError();
                return;
            }
        } else {
            $this->validate();
        }
    }

    public function confirmReservation($totalAmount)
    {
        $user = User::first();
        $max_cancellation = 3;

        if($user->cancellation_count >= $max_cancellation) {
            // User reach the cancellation limit
            // session()->flash('error', "You have reach the maximum number of cancellations. You can't make any reservation, please contact Admin for more details");
            flash()->option('timeout', 3000)->addError("You have reach the maximum number of cancellations. You can't make any reservation, please contact Admin for more details");
        } else {

            if($this->validate()) {
    
    
                $reservation = Reservation::create([
                    'room_id' => $this->room_id,
                    'user_id' => Auth::user()->id,
                    'check_in' => $this->check_in,
                    'check_out' => $this->check_out,
                    'time_in' => $this->time_in,
                    'time_out' => $this->time_out,
                    'num_guests' => $this->num_guests,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'phone' => $this->phone,
                    'address' => $this->address,
                    'total_price' => $totalAmount,
                ]); 
               
                $reservationData = [
                    'title' => 'Booking Confirmation',
                    'body' => 'Your reservation is processed by Admin, wait for a confirmation',
                    'room' => 'Room name: '. $reservation->room->name,
                    'check-in' => 'Check-in: '.$reservation->check_in,
                    'check-out' => 'Check-out: '.$reservation->check_out,
                    'total-payment' => 'P '.$totalAmount.'.00',
                    'reservationDataText' => 'View Booking',
                    'url' => url('/user/reservations'),
                    'phone' => $reservation->phone,
                    'thankyou' => 'Thak you for choosing us',
                ];
    
                // $user->notify(new NewReservationNotification($reservationData));
                $reservation->user->notify(new ReservationEmailNotification($reservationData));
                // $reservation->notify(new ReservationSmsNotification($reservationData));
    
                // session()->flash('message', 'Please confirm your reservation in your email notification!');
                flash()
                    ->option('timeout', 3000)
                    ->addSuccess('Please confirm your reservation in your email notification!');
    
                return $reservation;
    
            } else {
                $this->validate();
    
                $this->closeModalOnError();
                // session()->flash('error', 'Oops there is something wrong with your fillup form!');
                flash()
                    ->option('timeout', 3000)
                    ->addError('Oops there is something wrong with your fillup form!');
                $this->resetInput();
            }
        }

    }

    public function render()
    {
        $totalAmount = 0;
                
        if ($this->room_id) {
            $room = Room::find($this->room_id);

            if ($room) {              
                $pricePerNight = $room->promo_rate ?? $room->price;
                $totalNights = $this->check_in && $this
                                    ->check_out ? (strtotime($this->check_out) - strtotime($this->check_in)) / 86400 : 0;
                $subTotal = $pricePerNight * $totalNights;
                $totalAmount = $pricePerNight * $totalNights;
                if ($this->withBreakfast) {
                    $totalAmount += 200;
                }
            }

            $ratings = Rating::where('room_id', $this->room_id)->get();
            $rating_sum = Rating::where('room_id', $this->room_id)->sum('stars_rated');

           if($ratings->count() > 0)
           {
            $rating_value = $rating_sum/$ratings->count();
           }else {
            $rating_value = 0;
           }
            return view('livewire.reservation.index', [
                'room' => $room,
                'totalAmount' => $totalAmount,
                'totalNights' => $totalNights,
                'subTotal' => $subTotal,
                'ratings' => $ratings,
                'rating_value' => $rating_value,
            ]);
        }

        $ratings = Rating::where('room_id', $this->room_id)->get();
        return view('livewire.reservation.index', [
            'totalAmount' => $totalAmount,
            'ratings' => $ratings,
            
        ]);
    }
}