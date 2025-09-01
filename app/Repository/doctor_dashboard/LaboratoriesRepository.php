<?php

namespace App\Repository\doctor_dashboard;

use App\Interfaces\doctor_dashboard\LaboratoriesRepositoryInterface;
use App\Models\Laboratorie;
use App\Models\Invoice;
use App\Models\LaboratorieEmployee;
use App\Models\Notification;
use App\Events\LaboratorieCreated;
use Carbon\Carbon;

class LaboratoriesRepository implements LaboratoriesRepositoryInterface
{

    public function store($request)
    {
        try {

            Laboratorie::create([
                'description'=>$request->description,
                'invoice_id'=>$request->invoice_id,
                'patient_id'=>$request->patient_id,
                'doctor_id'=>$request->doctor_id,
            ]);
            Invoice::findOrFail($request->invoice_id)->update([
                'invoice_status' => 3,
            ]);
            $message = 'تم إضافة طلب مختبر للمريض رقم ' . $request->patient_id;

            foreach (LaboratorieEmployee::all() as $employee) {
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

            event(new LaboratorieCreated($message, $request->patient_id, $request->doctor_id));

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
            $Laboratorie = Laboratorie::findOrFail($id);
            $Laboratorie->update([
                'description' => $request->description,
            ]);
            session()->flash('edit');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function review($request)
    {
        try {
            Laboratorie::create([
                'description'   => $request->description,
                'invoice_id'    => $request->invoice_id,
                'patient_id'    => $request->patient_id,
                'doctor_id'     => $request->doctor_id,
                'review_date'   => Carbon::parse($request->review_date),
                'needs_review'  => true,
            ]);


            Invoice::findOrFail($request->invoice_id)->update([
                'invoice_status' => 2 ,
            ]);
            $message = 'تم إضافة مراجعة مختبر للمريض رقم ' . $request->patient_id;

            foreach (LaboratorieEmployee::all() as $employee) {
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

            event(new LaboratorieCreated($message, $request->patient_id, $request->doctor_id));

            session()->flash('add');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Laboratorie ::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
