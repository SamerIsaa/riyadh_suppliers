<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $operation;

    public function __construct($operation)
    {
        $this->operation = $operation;
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        if ($this->operation == "add") {
            return [
                'title' => 'تم اضافة اشترك شهري',
                'description' => 'شكرا لك على تعاونك'
            ];
        } elseif ($this->operation == "accept") {
            return [
                'title' => 'تم قبول اشترك شهري',
                'description' => 'شكرا لك على تعاونك'
            ];
        }elseif ($this->operation == "reject"){
            return [
                'title' => 'تم رفض اشترك شهري',
                'description' => ''
            ];
        }elseif ($this->operation == "cancel"){
            return [
                'title' => 'تم الغاء الاشترك الشهري الخاص بك',
                'description' => ''
            ];
        }elseif ($this->operation == "active"){
            return [
                'title' => 'تم تفعيل الاشترك الشهري الخاص بك',
                'description' => ''
            ];
        }
    }
}
