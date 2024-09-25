<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderUpdateStatusEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $order;
    /**
     * Create a new event instance.
     */
    public function __construct($order)
    {
        $this->order=$order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('Order.update.status.'.$this->order->customer_id),
        ];
    }
    public function broadcastAs(): string
    {
        return 'order-update-status';
    }

    public function broadcastWith()
    {
        return [
            'message'=>"your order # {$this->order->id} status has been changed to {$this->order->order_status}",
            'order'=>$this->order
        ];
    }
}
