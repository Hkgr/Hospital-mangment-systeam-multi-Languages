<?php

namespace App\Http\Controllers\Dashboard\appointments;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_id' => 'nullable|exists:patients,id',
            'name'       => 'required_without:patient_id|string',
            'email'      => 'required_without:patient_id|email',
            'phone'      => 'required_without:patient_id',
            'Date_Birth' => 'required_without:patient_id|date',
            'Gender'     => 'required_without:patient_id|integer|in:1,2',
            'Blood_Group' => 'required_without:patient_id',
            'Address'    => 'required_without:patient_id|string',
            'section_id' => 'required|exists:sections,id',
            'doctor_id'  => 'required|exists:doctors,id',
            'appointment' => 'nullable|date',
            'notes'      => 'nullable|string',
        ]);

        if (!empty($data['patient_id'])) {
            $patient = Patient::find($data['patient_id']);
        } else {
            $patient = Patient::firstOrCreate(
                ['email' => $data['email']],
                [
                    'Password'   => Hash::make($data['phone']),
                    'Date_Birth'  => $data['Date_Birth'],
                    'Phone'      => $data['phone'],
                    'Gender'     => $data['Gender'],
                    'Blood_Group' => $data['Blood_Group'],
                ]
            );
            $patient->translateOrNew(app()->getLocale())->name    = $data['name'];
            $patient->translateOrNew(app()->getLocale())->Address = $data['Address'];
            $patient->save();
        }

        $patient_id    = $patient->id;
        $data['name']  = $patient->name;
        $data['email'] = $patient->email;
        $data['phone'] = $patient->Phone;

        $appointmentData = [
            'patient_id' => $patient_id,
            'section_id' => $data['section_id'],
            'doctor_id'  => $data['doctor_id'],
            'appointment' => $data['appointment'] ?? null,
            'notes'      => $data['notes'] ?? null,
        ];

        $appointment = Appointment::create($appointmentData);

        return redirect()->route('appointments.index')
            ->with('add', 'تم إضافة الموعد بنجاح');
    }
    public function create()
    {
        $Section = \App\Models\Section::all();
        $doctors = \App\Models\Doctor::all();
        $patients = Patient::all();
        return view('Dashboard.appointments.create', compact('Section', 'doctors', 'patients'));
    }

    public function index()
    {

        $appointments = Appointment::where('type', 'غير مؤكد')->get();
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

        return redirect()->back()->with('add', 'تم تحويل الموعد إلى منتهي بنجاح');
    }

    public function ExpiredDates()
    {

        $appointments = Appointment::where('type', 'منتهي')->get();
        return view('Dashboard.appointments.ExpiredDates', compact('appointments'));
    }

    public function approval(Request $request, $id)
    {
        $appointment = Appointment::findorFail($id);
        $appointment->update([
            'type' => 'مؤكد',
            'appointment' => $request->appointment
        ]);

        // // send email
        // Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment->name,$appointment->appointment));

        // // send message mob
        // $receiverNumber = $appointment->phone;
        // $message = "عزيزي المريض" . " " . $appointment->name . " " . "تم حجز موعدك بتاريخ " . $appointment->appointment;

        // $account_sid = getenv("TWILIO_SID");
        // $auth_token = getenv("TWILIO_TOKEN");
        // $twilio_number = getenv("TWILIO_FROM");
        // $client = new Client($account_sid, $auth_token);
        // $client->messages->create($receiverNumber,[
        //     'from' => $twilio_number,
        //     'body' => $message
        // ]);
        session()->flash('add');
        return back();
    }

    public function destroy(Request $request, $id)
    {
        $appointment = Appointment::findorFail($id);
        $appointment->update([
            'type' => 'منتهي',
            'appointment' => $request->appointment
        ]);
        session()->flash('delete');
        return back();
    }
}