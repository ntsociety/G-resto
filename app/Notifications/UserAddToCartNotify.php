<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserAddToCartNotify extends Notification implements ShouldQueue
{
    use Queueable;
    public $user;
    public $recap;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $recap)
    {
        $this->user = $user;
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
                    ->line('Hell ' . $notifiable->name. ' Votre commande sur Dtech Resto du Menu '
                    . $this->recap['menu_name']. ', quantité : ' . $this->recap['quantity']. ', prix unitaire ' .
                    $this->recap['price']. ' et prix total ' . $this->recap['total_price'].'  a été bien enregistré.')
                    ->action('Notification Action', url('menus/'.$this->recap['menu_name']))
                    ->line('Nous vous remercions pour votre commande!');
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
