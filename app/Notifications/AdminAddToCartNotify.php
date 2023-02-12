<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminAddToCartNotify extends Notification implements ShouldQueue
{
    use Queueable;
    public $rec;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($rec)
    {
        $this->rec = $rec;
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
        ->line('Hell ' . $notifiable->name. ' Vous avez une nouvelle commande sur Dtech Resto du Menu '
        . $this->rec['menu_name']. ', quantité : ' . $this->rec['quantity']. ', prix unitaire ' .
        $this->rec['price']. ' à la date de ' . $this->rec['date_reserv'])
        ->action('Notification Action', url('menus/'.$this->rec['menu_name']))
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
