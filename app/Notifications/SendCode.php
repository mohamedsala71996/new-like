<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendCode extends Notification
{
    use Queueable;

    protected $code; // Add a property to store the code

    /**
     * Create a new notification instance.
     *
     * @param string $code The verification code to send
     */
    public function __construct($code)
    {
        $this->code = $code; // Save the passed code to the property
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Verification Email')
            ->line('welcome to like4like ')
            ->action('verify now', url(route('verifyEmail',$this->code)))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
}
