<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AmbulanceCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $car_number;
    public $message;
    public $created_at;

    public function __construct($carNumber)
    {
        $this->car_number = $carNumber;
        $this->message = 'سيارة إسعاف جديدة: ' . $carNumber;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function broadcastOn()
    {
        return new PrivateChannel('create-ambulance.admin');
    }

    public function broadcastAs()
    {
        return 'ambulance-created';
    }

    public function broadcastWhen()
    {
        return \App\Support\Net::online();
    }
}