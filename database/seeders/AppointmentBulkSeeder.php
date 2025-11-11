<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AppointmentBulkSeeder extends Seeder
{
    public function run()
    {
        $patientIds = Patient::pluck('id')->all();
        $doctorIds = Doctor::pluck('id')->all();
        if (empty($patientIds) || empty($doctorIds)) {
            return; // need patients and doctors
        }

        for ($i = 0; $i < 20; $i++) {
            $patient = Patient::find($patientIds[array_rand($patientIds)]);
            $doctor = Doctor::find($doctorIds[array_rand($doctorIds)]);

            $appointment = new Appointment();
            $appointment->doctor_id = $doctor->id;
            $appointment->section_id = $doctor->section_id;
            $appointment->patient_id = $patient->id;
            // Fill legacy columns only if present
            if (Schema::hasColumn('appointments', 'name')) {
                $appointment->name = $patient->name;
            }
            if (Schema::hasColumn('appointments', 'email')) {
                $appointment->email = $patient->email;
            }
            if (Schema::hasColumn('appointments', 'phone')) {
                $appointment->phone = $patient->Phone;
            }

            // Appointment within next 60 days at 15-minute intervals
            $days = random_int(0, 60);
            $hour = random_int(8, 17);
            $minuteOptions = [0, 15, 30, 45];
            $minute = $minuteOptions[array_rand($minuteOptions)];
            $ts = strtotime("+{$days} days");
            $date = date('Y-m-d', $ts) . sprintf(' %02d:%02d:00', $hour, $minute);
            $appointment->appointment = $date;
            $appointment->notes = 'موعد تم توليده تلقائياً';
            $appointment->save();
        }
    }
}

