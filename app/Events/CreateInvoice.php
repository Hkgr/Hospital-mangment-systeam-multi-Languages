<?php

namespace App\Events;

use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateInvoice implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $patient;
    public $patient_id;
    public $invoice_id;
    public $doctor_id;
    public $invoice_type;
    public $message;
    public $created_at;


    public function __construct($data)
    {
        $patient = Patient::find($data['patient']);
        $this->patient = $patient->name;
        $this->patient_id = $patient->id;
        $this->doctor_id = $data['doctor_id'];
        $this->invoice_id = $data['invoice_id'];
        $this->invoice_type = $data['invoice_type'] ?? '';
        $this->message = "كشف جديد : " . $this->invoice_type;
        $this->created_at = date('Y-m-d H:i:s');
    }


    public function broadcastOn()
    {
        return [
            new PrivateChannel('create-invoice.' . $this->doctor_id),
            new PrivateChannel('create-invoice.admin'),
            new PrivateChannel('create-invoice.patient.' . $this->patient_id),
        ];
    }

    public function broadcastAs()
    {
        return 'create-invoice';
    }
}