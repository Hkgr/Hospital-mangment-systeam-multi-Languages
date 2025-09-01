<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $patient_id;
    public $created_at;

    public function __construct($message, $patient_id)
    {
        $this->message = $message;
        $this->patient_id = $patient_id;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('create-payment.admin'),
            new PrivateChannel('create-payment.patient.' . $this->patient_id),
        ];
    }

    public function broadcastAs()
    {
        return 'payment-created';
    }

    public function broadcastWhen()
    {
        return \App\Support\Net::online();
    }
}
