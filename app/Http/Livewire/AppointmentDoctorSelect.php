<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Section;
use App\Models\Doctor;

class AppointmentDoctorSelect extends Component
{
    public $sections, $doctors = [], $section_id, $doctor_id;

    public function mount()
    {
        // 'name' is translatable; load translations instead of selecting base column
        $this->sections = Section::withTranslation()->get(['id']);
    }

    public function updatedSectionId($id)
    {
        $this->doctor_id = null;
        if (!$id) {
            $this->doctors = [];
            return;
        }
        // 'name' is translatable; load translations instead of selecting base column
        $this->doctors = Doctor::where('section_id', $id)
            ->withTranslation()
            ->get(['id']);
    }

    public function render()
    {
        return view('livewire.appointment-doctor-select');
    }
}
