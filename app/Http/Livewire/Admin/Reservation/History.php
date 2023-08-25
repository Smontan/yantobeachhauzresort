<?php

namespace App\Http\Livewire\Admin\Reservation;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\Exceptions\PublicPropertyNotFoundException;

class History extends Component
{

    public $reservations, $reservation_id;
    
    
    public function mount($reservations)
    {
        $this->reservations = $reservations;
    }

    public function resetInput()
    {
        $this->reservation_id = NULL;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function deleteReservation($reservation_id)
    {
        $this->reservation_id = $reservation_id;
        
    }

    public function destroyReservation()
    {
        Reservation::findOrFail($this->reservation_id)->delete();
        session()->flash('message', 'Reservation deleted successfully');
        $this->resetInput(); 
    }

    public function render()
    {
        $reservations = Reservation::all();
        
        return view('livewire.admin.reservation.history', ['reservations' => $reservations])
                        ->extends('layouts.admin')
                        ->section('content');
    }
}
