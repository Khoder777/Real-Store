<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;
    public $order;
    public $admin;
    /**
     * Create a new notification instance.
     */
    public function __construct($order,$admin)
    {
        $this->order=$order;
        $this->admin=$admin;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast'];
    }

    public function toBroadcast(object $notifiable){
        return [
            'message'=>'new order big boss',
            'data'=>$this->order,
            'url'=>url(route('admin.order.show',$this->order->id))
        ];
    }

    public function broadcastOn(){
        return [
            new PrivateChannel('order.created.admin.'.$this->admin->id),
        ];
    }

    public function broadcastAs(){
        return 'ordercreated';
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
