<?php

namespace App\Notifications;

use App\Mail\NewOrderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

/**
 * Class NewOrderNotification
 * @package App\Notifications
 */
class NewOrderNotification extends Notification
//    implements ShouldQueue
{
    use Queueable;

    private $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): NewOrderMail
    {
        return new NewOrderMail($this->data);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => __('You have a new order')
        ];
    }
}
