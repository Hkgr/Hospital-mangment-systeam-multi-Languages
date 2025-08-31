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
    public $section_id;
    // public $patients;
    // public $patient_id;
    public $gender;
    public $blood_group;
    public $address;
    public $date_birth;
    public $message = false;

    public function mount()
    {

        $this->sections = Section::get();
        $this->doctors = collect();
        // $this->patients = Patient::all();
        // $this->patient_id = 'new';
    }

    public function render()
    {
        // return view(
        //     'livewire.appointments.create',
        //     [
        //         'sections' => Section::get(),
        //         'patients' => $this->patients
        //     ]
        // );
        return view('livewire.appointments.create');
    }

    public function loadDoctors($section_id)
    {
        $this->section_id = $section_id;
        $this->doctors = Doctor::where('section_id', $section_id)->get();
    }
    public function updatedSection($section_id)
    {
        $this->loadDoctors($section_id);
    }

    public function store()
    {
        $this->validate([
            'section_id' => 'required|exists:sections,id',
            'doctor'     => 'required|exists:doctors,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required',
            'gender'     => 'required',
            'blood_group' => 'required',
            'address'    => 'required',
            'date_birth' => 'required|date',
        ]);
        // if ($this->patient_id && $this->patient_id !== 'new') {
        //     $patient = Patient::findOrFail($this->patient_id);
        // } else {
        //     $patient = Patient::create([
        //         'email' => $this->email,
        //         'Password' => Hash::make($this->phone),
        //         'Date_Birth' => now(),
        //         'Phone' => $this->phone,
        //         'Gender' => $this->gender,
        //         'Blood_Group' => $this->blood_group,
        //     ]);
        //     $patient->translateOrNew(app()->getLocale())->name = $this->name;
        //     $patient->translateOrNew(app()->getLocale())->Address = $this->address;
        //     $patient->save();
        // }
        $patient = Patient::create([
            'email' => $this->email,
            'Password' => Hash::make($this->phone),
            'Date_Birth' => $this->date_birth,
            'Phone' => $this->phone,
            'Gender' => $this->gender,
            'Blood_Group' => $this->blood_group,
        ]);
        $patient->translateOrNew(app()->getLocale())->name = $this->name;
        $patient->translateOrNew(app()->getLocale())->Address = $this->address;
        $patient->save();

        $appointments = new Appointment();
        $appointments->doctor_id = $this->doctor;
        $appointments->section_id = $this->section_id;
        $appointments->patient_id = $patient->id;
        $appointments->notes = $this->notes;
        $appointments->save();
        $this->message = true;
    }
}
