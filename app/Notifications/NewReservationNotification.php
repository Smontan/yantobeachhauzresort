<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;

class NewReservationNotification extends Notification
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
        return ['mail', 'vonage'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        return (new MailMessage)
                    // ->subject('Booking Confirmation')
                    // ->line('Your booking has been process by Admin, wait for confirmation.')
                    // ->action('View Booking', url('/user/reservations/'))
                    // ->line('Thank you for using our application!');

                    ->subject($this->reservationData['title'])
                    ->line($this->reservationData['body'])
                    ->line('Booking details:')
                    ->line($this->reservationData['room'])
                    ->line($this->reservationData['check-in'])
                    ->line($this->reservationData['check-out'])
                    ->line($this->reservationData['total-payment'])
                    ->action($this->reservationData['reservationDataText'],$this->reservationData['url'])
                    ->line($this->reservationData['thankyou']);
    }

    // Get sms notification
    // public function toVonage(object $notifiable)
    // {

    //     return (new VonageMessage)
    //                 ->content($this->reservationData['body'])
    //                 ->from('63909009');
    // }

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
