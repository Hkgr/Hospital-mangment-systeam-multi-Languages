<?php

namespace App\Http\Controllers\Dashboard_Patient;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\PatientAccount;
use App\Models\Ray;
use App\Models\Diagnostic;
use App\Models\ReceiptAccount;
use Illuminate\Http\Request;
use App\Models\Appointment;

class PatientController extends Controller
{
    public function invoices()
    {
        $invoices = Invoice::with(['Doctor','Service','Group'])
            ->where('patient_id', auth()->user()->id)
            ->get();
        return view('Dashboard.dashboard_patient.invoices', compact('invoices'));
    }

    public function laboratories()
    {
        $laboratories = Laboratorie::where('patient_id', auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.laboratories', compact('laboratories'));
    }

    public function viewLaboratories($id)
    {
        $laboratorie = Laboratorie::findorFail($id);
        if ($laboratorie->patient_id != auth()->user()->id) {
            return redirect()->route('404');
        }
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.patient_details', compact('laboratorie'));
    }

    public function rays()
    {
        $rays = Ray::where('patient_id', auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.rays', compact('rays'));
    }

    public function viewRays($id)
    {
        $rays = Ray::findorFail($id);
        if ($rays->patient_id != auth()->user()->id) {
            return redirect()->route('404');
        }
        return view('Dashboard.dashboard_RayEmployee.invoices.patient_details', compact('rays'));
    }

    public function records()
    {
        $records = Diagnostic::where('patient_id', auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.records', compact('records'));
    }

    public function payments()
    {
        $payments = ReceiptAccount::where('patient_id', auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.payments', compact('payments'));
    }

    public function appointments()
    {
        $appointments = Appointment::where('patient_id', auth()->id())
            ->where('type', '!=', 'منتهي')
            ->get();

        return view('Dashboard.dashboard_patient.appointments.index', compact('appointments'));
    }

    public function appointmentsExpired()
    {
        $appointments = Appointment::where('patient_id', auth()->id())
            ->where('type', 'منتهي')
            ->get();
        $appointments = Appointment::where('patient_id', auth()->id())->get();
        return view('Dashboard.dashboard_patient.appointments.expired', compact('appointments'));
    }
}
