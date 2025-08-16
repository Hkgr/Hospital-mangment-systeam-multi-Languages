<?php

namespace App\Http\Livewire\Appointments;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $doctors;
    public $sections;
    public $doctor;
    public $section;
    public $name;
    public $email;
    public $phone;
    public $notes;
    public $patients;
    public $patient_id;
    public $message = false;

    public function mount()
    {

        $this->sections = Section::get();
        $this->doctors = collect();
        $this->patients = Patient::get();
    }

    public function render()
    {
        return view(
            'livewire.appointments.create',
            [
                'sections' => Section::get(),
                'patients' => $this->patients
            ]
        );
    }

    public function updatedSection($section_id)
    {

        $this->doctors = Doctor::where('section_id', $section_id)->get();
    }

    public function store()
    {
        if ($this->patient_id) {
            $patient = Patient::find($this->patient_id);
        } else {
            $patient = Patient::firstOrCreate(
                ['email' => $this->email, 'Phone' => $this->phone],
                [
                    'Password' => Hash::make($this->phone),
                    'Date_Birth' => now(),
                    'Gender' => 'غير محدد',
                    'Blood_Group' => 'غير محدد',
                ]
            );
            $patient->setTranslation('name', app()->getLocale(), $this->name);
                        $patient->save();
        }

        $appointments = new Appointment();
        $appointments->doctor_id = $this->doctor;
        $appointments->section_id = $this->section;
        $appointments->patient_id = $patient->id;
        $appointments->notes = $this->notes;
        $appointments->save();
        $this->message = true;
    }
}
