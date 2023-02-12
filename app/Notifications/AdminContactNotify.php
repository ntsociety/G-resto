<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminContactNotify extends Notification implements ShouldQueue
{
    use Queueable;
    public $recap;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($recap)
    {
        $this->recap = $recap;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hell ' . $notifiable->name. ' Vous avez un nouveau message sur Dtech Resto de '
            . $this->recap['name']. ', du sujet : ' . $this->recap['sujet']. ', avec message : ' .
            $this->recap['message'])
            ->action('Notification Action', url('/'))
            ->line('Merci!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
