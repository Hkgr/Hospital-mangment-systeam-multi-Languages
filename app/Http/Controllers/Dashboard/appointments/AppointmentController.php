<?php

namespace App\Http\Controllers\Dashboard\appointments;

use App\Events\AppointmentCreated;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_id'  => 'nullable|exists:patients,id',
            'name'        => 'required_without:patient_id|string',
            'email'       => 'required_without:patient_id|email',
            'phone'       => 'required_without:patient_id',
            'Date_Birth'  => 'required_without:patient_id|date',
            'Gender'      => 'required_without:patient_id|integer|in:1,2',
            'Blood_Group' => 'required_without:patient_id',
            'Address'     => 'required_without:patient_id|string',
            'section_id'  => 'required|exists:sections,id',
            'doctor_id'   => 'required|exists:doctors,id',
            'appointment' => 'nullable|date',
            'notes'       => 'nullable|string',
        ]);

        if (!empty($data['patient_id'])) {
            $patient = Patient::find($data['patient_id']);
        } else {
            $patient = Patient::firstOrCreate(
                ['email' => $data['email']],
                [
                    'Password'    => Hash::make($data['phone']),
                    'Date_Birth'  => $data['Date_Birth'],
                    'Phone'       => $data['phone'],
                    'Gender'      => $data['Gender'],
                    'Blood_Group' => $data['Blood_Group'],
                ]
            );
            $patient->translateOrNew(app()->getLocale())->name    = $data['name'];
            $patient->translateOrNew(app()->getLocale())->Address = $data['Address'];
            $patient->save();
        }

        Appointment::create([
            'patient_id'  => $patient->id,
            'section_id'  => $data['section_id'],
            'doctor_id'   => $data['doctor_id'],
            'appointment' => $data['appointment'] ?? null,
            'notes'       => $data['notes'] ?? null,
        ]);

        foreach (Admin::all() as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'message' => 'تم إنشاء موعد جديد: ' . ($data['name'] ?? $patient->name),
            ]);
        }
        event(new AppointmentCreated($patient->name));

        return redirect()->route('appointments.create')->with('add', true);
    }

    public function create()
    {
        $Section  = Section::all();
        $patients = Patient::all();
        $doctors  = Doctor::all();
        return view('Dashboard.appointments.create', compact('Section', 'patients', 'doctors'));
    }

    public function getDoctors($id)
    {
        return Doctor::where('section_id', $id)
            ->withTranslation()
            ->get(['id'])
            ->map(fn ($d) => ['id' => $d->id, 'name' => $d->name])
            ->values();
    }

    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor', 'section'])->where('type','غير مؤكد')->get();
        return view('Dashboard.appointments.index', compact('appointments'));
    }

    public function index2()
    {
        $appointments = Appointment::where('type', 'مؤكد')->get();
        return view('Dashboard.appointments.index2', compact('appointments'));
    }

    public function doctorAppointments()
    {
        $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->id())
            ->where('type', '!=', 'منتهي')
            ->get();
        return view('Dashboard.appointments.doctor-index', compact('appointments'));
    }

    public function doctorExpiredAppointments()
    {
        $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->id())
            ->where('type', 'منتهي')
            ->get();
        return view('Dashboard.appointments.doctor-expired', compact('appointments'));
    }

    public function markAsFinished(Appointment $appointment)
    {
        if ($appointment->doctor_id !== Auth::guard('doctor')->id()) {
            abort(403);
        }
        $appointment->update(['type' => 'منتهي']);
        return redirect()->back()->with('add', true);
    }

    public function ExpiredDates()
    {
        $appointments = Appointment::where('type', 'منتهي')->get();
        return view('Dashboard.appointments.ExpiredDates', compact('appointments'));
    }

    public function approval(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'type'        => 'مؤكد',
            'appointment' => $request->appointment,
        ]);
        session()->flash('add');
        return back();
    }

    public function destroy(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'type'        => 'منتهي',
            'appointment' => $request->appointment,
        ]);
        session()->flash('delete');
        return back();
    }
}
