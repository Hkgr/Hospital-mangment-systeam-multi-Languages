<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AmbulanceCallCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $phone;
    public $address;
    public $details;
    public $message;
    public $created_at;

    public function __construct(array $data)
    {
        $this->phone = $data['phone'];
        $this->address = $data['address'];
        $this->details = $data['details'];
        $this->message = 'مكالمة إسعاف جديدة: ' . $data['details'];
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function broadcastOn()
    {
        return new PrivateChannel('create-ambulance-call.admin');
    }

    public function broadcastAs()
    {
        return 'ambulance-call-created';
    }

    public function broadcastWhen()
    {
        return \App\Support\Net::online();
    }
}