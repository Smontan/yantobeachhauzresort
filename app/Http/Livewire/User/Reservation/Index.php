<?php

namespace App\Http\Livewire\User\Reservation;

use App\Models\Reservation;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $userReservation, $userReservationId, $user_id;

    public function mount($userReservations)
    {
        $this->userReservation = $userReservations;

    }


    public function cancelUserReservation($userReservationItem_id)
    {
        $this->userReservationId = $userReservationItem_id;
    }

    public function confirmCancelUserReservation()
    {
        $reservation = Reservation::findOrFail($this->userReservationId);

        //Increment cancellation count for the user
        $user = $reservation->user;
        $user->cancellation_count++;
        $user->save();

        //Update reservation status
        $reservation->update([
            'status' => 'cancel'
        ]);

        // session()->flash('message', 'Your reservation has been canceled');
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Your reservatiion has been canceled');

    }

    public function render()
    {

        $reservations = Reservation::where('user_id' , auth()->user()->id)
            ->orderBy('id', 'DESC')->paginate(5);

        return view('livewire.user.reservation.index', [
            'reservations' => $reservations,
        ]);
    }
}