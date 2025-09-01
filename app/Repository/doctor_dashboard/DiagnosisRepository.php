<?php

namespace App\Repository\doctor_dashboard;

use App\Interfaces\doctor_dashboard\DiagnosisRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Invoice;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Events\DiagnosisCreated;

class DiagnosisRepository implements DiagnosisRepositoryInterface
{
    public function store($request)
    {
        DB::beginTransaction();

        try {

            $this->invoice_status($request->invoice_id, 3);
            $diagnosis = new Diagnostic();
            if ($request->filled('review_date')) {
                $diagnosis->review_date = $request->review_date;
            }
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->date = now();
            $diagnosis->save();

            $message = 'تم إضافة تشخيص للمريض رقم ' . $request->patient_id;

            Notification::create([
                'user_id' => $request->patient_id,
                'message' => $message,
            ]);

            Notification::create([
                'user_id' => $request->doctor_id,
                'message' => $message,
            ]);

            event(new DiagnosisCreated($message, $request->patient_id, $request->doctor_id));

            DB::commit();
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $patient_records = Diagnostic::where('patient_id', $id)->get();
        return view('Dashboard.Doctor.invoices.patient_record', compact('patient_records'));
    }

    public function addReview($request)
    {
        DB::beginTransaction();
        try {

            $this->invoice_status($request->invoice_id, 2);
            $diagnosis = new Diagnostic();
            $diagnosis->date = now();
            if ($request->filled('review_date')) {
                $diagnosis->review_date = Carbon::parse($request->review_date);
            }
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->save();

            $message = 'تم إضافة مراجعة للمريض رقم ' . $request->patient_id;

            Notification::create([
                'user_id' => $request->patient_id,
                'message' => $message,
            ]);

            Notification::create([
                'user_id' => $request->doctor_id,
                'message' => $message,
            ]);

            event(new DiagnosisCreated($message, $request->patient_id, $request->doctor_id));

            DB::commit();
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function invoice_status($invoice_id, $id_status)
    {
        $invoice_status = Invoice::findorFail($invoice_id);
        $invoice_status->update([
            'invoice_status' => $id_status
        ]);
    }
}
