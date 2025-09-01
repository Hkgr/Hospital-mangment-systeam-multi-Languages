<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReceiptCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $patient_id;
    public $doctor_id;
    public $created_at;

    public function __construct($message, $patient_id, $doctor_id = null)
    {
        $this->message = $message;
        $this->patient_id = $patient_id;
        $this->doctor_id = $doctor_id;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function broadcastOn()
    {
        $channels = [
            new PrivateChannel('create-receipt.admin'),
            new PrivateChannel('create-receipt.patient.' . $this->patient_id),
        ];

        if ($this->doctor_id) {
            $channels[] = new PrivateChannel('create-receipt.doctor.' . $this->doctor_id);
        }

        return $channels;
    }

    public function broadcastAs()
    {
        return 'receipt-created';
    }

    public function broadcastWhen()
    {
        return \App\Support\Net::online();
    }
}