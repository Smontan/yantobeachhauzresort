<?php

namespace App\Http\Livewire\Frontend\Room;

use App\Charts\BookingsChart;
use Livewire\Component;

class BookingsComponent extends Component
{

    public $bookingsChart;

    public function mount()
    {
        $this->bookingsChart = new BookingsChart();
    }

    public function render()
    {
        return view('livewire.bookings-component', [
            'bookingsChart' => $this->bookingsChart,
        ]);
    }
}
