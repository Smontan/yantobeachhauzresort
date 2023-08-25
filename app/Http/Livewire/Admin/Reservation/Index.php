<?php

namespace App\Http\Livewire\Admin\Reservation;

use App\Models\Reservation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $reservation_id, $status, $check_in, $check_out;

    public $rules = [
        'status' => 'required',
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
    ];

    public function resetInput()
    {
        $this->status = NULL;
        $this->reservation_id = NULL;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function addReservation(int $reservation_id)
    {
        $this->reservation_id = $reservation_id;
    }

    public function confirmedReservation()
    {
    
        $reservation = Reservation::findOrFail($this->reservation_id);
        $reservation->status = 'confirmed';
        $reservation->save();
        $reservation->updateStatus();

        // session()->flash('message', 'Reservation confirmed successfully.');
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Reservation confirmed successfully.');
        $this->resetInput();
    }

    // public function editPendingReservation(int $reservation_id)
    // {

    //     $reservation = Reservation::findOrFail($reservation_id);
    //     $this->check_in = $reservation->check_in;
    //     $this->check_out = $reservation->check_out;

    // }

    // public function confirmEditReservation()
    // {
    //     $this->validate();

    //     dd($this->reservation->id);

    //     Reservation::findOrFail($this->$this->reservation_id)->update([
    //         'check_in' => $this->check_in,
    //         'check_out' => $this->check_out,
    //     ]);

    //     session()->flash('message', 'Reservation date updated successfully.');

    //     $this->resetInput();

    // }

    public function checkoutReservation(int $reservation_id)
    {
        $this->reservation_id = $reservation_id;
    }

    public function confirmCheckoutReservation()
    {
        Reservation::findOrFail($this->reservation_id)->update([
            'status' => 'complete',
        ]);
        // session()->flash('message', 'Reservation Checkout successfully.');
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Reservation Checkout successful.');

        $this->resetInput();
    }

    public function cancelReservation(int $reservation_id)
    {
        $this->reservation_id = $reservation_id;
    }

    public function confirmCancelReservation()
    {

        Reservation::findOrFail($this->reservation_id)->update([
            'status' => 'cancel',
        ]);
        // session()->flash('message', 'Reservation Cancel successfully');
        flash()
            ->option('timeout', 3000)
            ->addSuccess('Reservation cancel successful');

        $this->resetInput();
    }
    public function render()
    {

        $reservations = Reservation::all();

        // $reservations->updateStatus();

        return view('livewire.admin.reservation.index', [
            'reservations' => $reservations,
        ]);
    }
}