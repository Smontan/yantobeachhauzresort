<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;
use Vonage\Client;

class ReservationSmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $reservationData;

    /**
     * Create a new notification instance.
     */
    public function __construct($reservationData)
    {
        $this->reservationData = $reservationData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['vonage'];
    }

    /**
     * Get the Vonage / SMS representation of the notification.
    //  */
    public function toVonage(object $notifiable): VonageMessage
    {

        return (new VonageMessage)
                    // ->from('Yanto Beach Hauz')
                    // ->content('Your SMS message content');

            ->content($this->reservationData['body'].'. Your total payment as of now is '.$this->reservationData['total-payment']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
