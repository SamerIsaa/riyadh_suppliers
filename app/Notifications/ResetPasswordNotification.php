<?php

namespace App\Notifications;

use App\Model\Admin;
use App\Model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    private $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if ( $notifiable instanceof Admin ) {
            $url = route('panel.password.reset', [$this->token, 'email' => $notifiable->email]);
        } else if ( $notifiable instanceof User ) {
            $url = route('password.reset', [$this->token, 'email' => $notifiable->email , 'ssn' =>  $notifiable->ssn_id]);
        }


        return (new MailMessage)
            ->greeting('اعادة تعين كلمة المرور الخاصة بك في تطبيق السادة')
            ->subject('تطبيق السادة - اعادة تعين كلمة المرور')
            ->action('تغيير كلمة المرور', $url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


}
