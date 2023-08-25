<?php

namespace App\Charts;

use App\Models\Reservation;
use ConsoleTVs\Charts\Classes\LineChart\Chart;

class BookingsChart extends Chart
{

    public function __construct()
    {
        parent::__construct();

        $bookingByDate = Reservation::groupBy('date')
            ->selectRaw('date, count(*) as count')
            ->orderBy('date')
            ->get();

        $this->labels($bookingByDate->pluck('date'));
        $this->dataset('Bookings', 'line', $bookingByDate->pluck('count'))
            ->color('rgba(255, 99, 132, 0.6)')
            ->backgroundcolor('rgba(255, 99, 132, 0.4)');
    }
}