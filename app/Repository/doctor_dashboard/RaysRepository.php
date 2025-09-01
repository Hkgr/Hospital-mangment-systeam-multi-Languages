<?php

namespace App\Repository\doctor_dashboard;
use App\Interfaces\doctor_dashboard\RaysRepositoryInterface;
use App\Models\Invoice;
use App\Models\Ray;
use App\Models\RayEmployee;
use App\Models\Notification;
use App\Events\RayCreated;
use Carbon\Carbon;

class RaysRepository implements RaysRepositoryInterface
{

    public function store($request)
    {
        try {
            Ray::create([
                'description'=>$request->description,
                'invoice_id'=>$request->invoice_id,
                'patient_id'=>$request->patient_id,
                'doctor_id'=>$request->doctor_id,
            ]);
            Invoice::findOrFail($request->invoice_id)->update([
                'invoice_status' => 3,
            ]);
            $message = 'تم إضافة طلب أشعة للمريض رقم ' . $request->patient_id;

            foreach (RayEmployee::all() as $employee) {
                Notification::create([
                    'user_id' => $employee->id,
                    'message' => $message,
                ]);
            }

            Notification::create([
                'user_id' => $request->patient_id,
                'message' => $message,
            ]);

            Notification::create([
                'user_id' => $request->doctor_id,
                'message' => $message,
            ]);

            event(new RayCreated($message, $request->patient_id, $request->doctor_id));

            session()->flash('add');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $Ray = Ray::findOrFail($id);
            $Ray->update([
                'description' => $request->description,
            ]);
            session()->flash('edit');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Ray ::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function review($request)
    {
        try {
            Ray::create([
                'description'   => $request->description,
                'invoice_id'    => $request->invoice_id,
                'patient_id'    => $request->patient_id,
                'doctor_id'     => $request->doctor_id,
                'review_date'   => Carbon::parse($request->review_date),
                'needs_review'  => true,
            ]);

            Invoice::findOrFail($request->invoice_id)->update([
                'invoice_status' => 2,
            ]);

            $message = 'تم إضافة مراجعة أشعة للمريض رقم ' . $request->patient_id;

            foreach (RayEmployee::all() as $employee) {
                Notification::create([
                    'user_id' => $employee->id,
                    'message' => $message,
                ]);
            }

            Notification::create([
                'user_id' => $request->patient_id,
                'message' => $message,
            ]);

            Notification::create([
                'user_id' => $request->doctor_id,
                'message' => $message,
            ]);

            event(new RayCreated($message, $request->patient_id, $request->doctor_id));

            session()->flash('add');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
