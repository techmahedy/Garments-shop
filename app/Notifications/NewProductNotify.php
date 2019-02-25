<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewProductNotify extends Notification
{
    use Queueable;
    
     public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
         return (new MailMessage)
                    ->subject('Hey , New product availabe')
                    ->greeting('Hello' , 'Dear Subscriber')
                    ->line('There is a new product , you may like it')
                    ->line('Post Title : '.$this->product->title)
                    ->action('Read Post' , url(route('product' , $this->product->slug)))
                    ->line('Thank you for being with us!');
    }

   
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
