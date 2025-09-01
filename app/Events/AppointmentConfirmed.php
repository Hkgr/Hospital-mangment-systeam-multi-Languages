<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $patient_id;
    public $doctor_id;
    public $created_at;

    public function __construct($message, $patient_id, $doctor_id)
    {
        $this->message = $message;
        $this->patient_id = $patient_id;
        $this->doctor_id = $doctor_id;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('confirm-appointment.patient.' . $this->patient_id),
            new PrivateChannel('confirm-appointment.doctor.' . $this->doctor_id),
        ];
    }

    public function broadcastAs()
    {
        return 'appointment-confirmed';
    }

    public function broadcastWhen()
    {
        return \App\Support\Net::online();
    }
}
