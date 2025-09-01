<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DiagnosisCreated implements ShouldBroadcast
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
            new PrivateChannel('create-diagnosis.patient.' . $this->patient_id),
            new PrivateChannel('create-diagnosis.doctor.' . $this->doctor_id),
        ];
    }

    public function broadcastAs()
    {
        return 'diagnosis-created';
    }

    public function broadcastWhen()
    {
        return \App\Support\Net::online();
    }
}
