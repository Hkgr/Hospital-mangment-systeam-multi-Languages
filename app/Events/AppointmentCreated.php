<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppointmentCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $message;
    public $created_at;

    public function __construct($name)
    {
        $this->name = $name;
        $this->message = 'موعد جديد للمريض: ' . $name;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function broadcastOn()
    {
        return new PrivateChannel('create-appointment.admin');
    }

    public function broadcastAs()
    {
        return 'appointment-created';
    }

    public function broadcastWhen()
    {
        return \App\Support\Net::online();
    }
}