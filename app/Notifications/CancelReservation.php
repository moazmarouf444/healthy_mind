<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CancelReservation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $reservation;
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'reservation_id' => $this->reservation['id'],
            'name' => $this->reservation->user['name'],
        ];
    }
}
