<?php

namespace App\Http\Livewire\Admin\Reservation;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $user_id;
    public $room_id;
    public $check_in;
    public $check_out;
    public $num_guests, $last_name, $first_name, $phone, $address, $totalAmount;
    public $withBreakfast = false;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'room_id' => 'required|exists:rooms,id',
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required',
        'num_guests' => 'required',
    ];


    public function resetInput() {
        $this->check_in = NULL;
        $this->check_out = NULL;
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
  
    public function createReservation()
    {
        $this->validate();

        $existingReservation = Reservation::where('room_id', $this->room_id)
            ->where(function ($query) {
                $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                    ->orWhereBetween('check_out', [$this->check_in, $this->check_out]);
            })
            ->first();

        if ($existingReservation) {
            $this->addError('room_id', 'The room is already reserved for the selected dates.');
            return;
        }
    }

    public function confirmReservation()
    {
        $this->validate();

        $existingReservation = Reservation::where('room_id', $this->room_id)
            ->where(function ($query) {
                $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                    ->orWhereBetween('check_out', [$this->check_in, $this->check_out]);
            })
            ->first();

        if ($existingReservation) {
            $this->addError('room_id', 'The room is already reserved for the selected dates.');
            return;
        }

        Reservation::create([
            'user_id' => $this->user_id,
            'room_id' => $this->room_id,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'num_guests' => $this->num_guests,
            'total_price' => $this->totalAmount,
            'status' => 'pending',
        ]);

        
        $this->reset();

        // return redirect('admin/reservation/view')->session()->flash('message', 'Reservation created successfully.');
        redirect('/admin/reservation/view')->with('message', 'Reservation added successfully');
    }


    public function render()
    {
        $users = User::where('role_as', 0)->get();
        $rooms = Room::all();

        $totalAmount = 0;
        if ($this->room_id && $this->check_in && $this->check_out) {
            $totalDays = $this->check_in && $this->check_out ? (strtotime($this->check_out) - strtotime($this->check_in)) / 86400 : 0;
            $room = Room::find($this->room_id);

            if($room->promo_rate) {
                $totalAmount = $room->promo_rate * $totalDays;
            } else {

                $totalAmount = $room->price * $totalDays;
            }
            if ($this->withBreakfast) {
                $totalAmount += 200;
            }

            $this->totalAmount = $totalAmount;
        }

        
        return view('livewire.admin.reservation.create', [
            'users' => $users,
            'rooms' => $rooms,
            'totalAmount' => $totalAmount,
        ]);
    }


}
