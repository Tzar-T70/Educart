<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendVerificationCode extends Notification implements ShouldQueue
{
    use Queueable;

    public $code;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        // Generate a 6-digit code
        $this->code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
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
        // Save the code and expiry time to the user
        $notifiable->verification_code = $this->code;
        $notifiable->verification_code_expires_at = now()->addMinutes(10); // Code expires in 10 minutes
        $notifiable->save();

        return (new MailMessage)
                    ->subject('Your Educart Verification Code')
                    ->line('Here is your 6-digit verification code:')
                    ->line($this->code)
                    ->line('This code will expire in 10 minutes.')
                    ->line('If you did not create an account, no further action is required.');
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