<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class single_invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_date',
        'patient_id',
        'doctor_id',
        'section_id',
        'Service_id',
        'price',
        'discount_value',
        'tax_rate',
        'tax_value',
        'total_with_tax',
        'type',
        'insurance_id',
        'insurance_discount',
        'company_rate',
        'insurance_amount',
        'patient_amount',
    ];

    public function Service()
    {
        return $this->belongsTo(Service::class,'Service_id');
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }


}
