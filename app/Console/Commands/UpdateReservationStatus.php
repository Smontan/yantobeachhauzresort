<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateReservationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-reservation-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reservations = Reservation::where('status', 'confirmed')
            ->where('check_in', Carbon::today())
            ->get();

        foreach ($reservations as $reservation) {
            $reservation->status = 'checkin';
            $reservation->save();
        }

        $this->info(count($reservations), 'reservation(s) updated');
    }
}
