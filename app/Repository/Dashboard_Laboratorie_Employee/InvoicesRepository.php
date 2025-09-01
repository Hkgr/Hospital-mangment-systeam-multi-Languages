<?php

namespace App\Repository\Dashboard_Laboratorie_Employee;

use App\Interfaces\Dashboard_Laboratorie_Employee\InvoicesRepositoryInterface;
use App\Models\Laboratorie;
use App\Models\Patient;
use App\Models\LaboratorieEmployee;
use App\Models\Notification;
use App\Events\LaboratorieDiagnosisCreated;
use App\Traits\UploadTrait;

class InvoicesRepository implements InvoicesRepositoryInterface
{

    use UploadTrait;

    public function index()
    {
        $invoices = Laboratorie::where('case',0)->get();
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.index',compact('invoices'));
    }

    public function completed_invoices()
    {
        $invoices = Laboratorie::where('case',1)->where('employee_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.completed_invoices',compact('invoices'));
    }

    public function edit($id)
    {
        $invoice = Laboratorie::findorFail($id);
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.add_diagnosis',compact('invoice'));
    }

    public function update($request, $id)
    {
        $invoice = Laboratorie::findorFail($id);

        $invoice->update([
            'employee_id'=> auth()->user()->id,
            'description_employee'=> $request->description_employee,
            'case'=> 1,
        ]);


        if( $request->hasFile( 'photos' ) ) {
            foreach ($request->photos as $photo) {
                //Upload img
                $this->verifyAndStoreImageForeach($photo,'laboratories','upload_image',$invoice->id,'App\Models\Laboratorie');
            }
        }
        $message = 'تم إضافة تشخيص تحليل للمريض رقم ' . $invoice->patient_id;

        foreach (LaboratorieEmployee::all() as $employee) {
            Notification::create([
                'user_id' => $employee->id,
                'message' => $message,
            ]);
        }

        Notification::create([
            'user_id' => $invoice->patient_id,
            'message' => $message,
        ]);

        Notification::create([
            'user_id' => $invoice->doctor_id,
            'message' => $message,
        ]);

        event(new LaboratorieDiagnosisCreated($message, $invoice->patient_id, $invoice->doctor_id));

        session()->flash('edit');
        return redirect()->route('invoices_ray_employee.index');

    }

    public function view_laboratories($id)
    {
        $laboratorie = Laboratorie::findorFail($id);
        if($laboratorie->employee_id !=auth()->user()->id){
            //abort(404);
            return redirect()->route('404');
        }
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.patient_details', compact('laboratorie'));
    }

    public function patient_details($patientId)
    {
        $hasAssignment = Laboratorie::where('patient_id', $patientId)
            ->where('employee_id', auth()->id())
            ->exists();

        if (!$hasAssignment) {
            return redirect()->route('404');
        }

        $patient = Patient::findOrFail($patientId);
        // فقط التحاليل الخاصة بالمريض الحالي والموظف الحالي
        $patient_Laboratories = Laboratorie::where('patient_id', $patientId)
            ->where('employee_id', auth()->id())
            ->get();

        return view(
            'Dashboard.dashboard_LaboratorieEmployee.invoices.patient_details',
            compact('patient','patient_Laboratories')
        );
    }

    public function doctor_images($doctorId)
    {
        $laboratories = Laboratorie::where('doctor_id', $doctorId)
            ->where('employee_id', auth()->id())
            ->with(['Patient','images'])
            ->get();

        if ($laboratories->isEmpty()) {
            return redirect()->route('404');
        }

        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.doctor_images', compact('laboratories'));
    }
}
