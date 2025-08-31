<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SingleServiceCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $message;
    public $created_at;

    public function __construct($name)
    {
        $this->name = $name;
        $this->message = 'خدمة مفردة جديدة: ' . $name;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function broadcastOn()
    {
        return new PrivateChannel('create-single-service.admin');
    }

    public function broadcastAs()
    {
        return 'single-service-created';
    }

    public function broadcastWhen()
    {
        return \App\Support\Net::online();
    }
}