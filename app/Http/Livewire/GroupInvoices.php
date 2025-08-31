<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Admin;
use App\Models\FundAccount;
use App\Models\Group;
use App\Models\group_invoice;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\DB;
use App\Models\Insurance;
use App\Events\CreateInvoice;
use App\Models\Notification;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class GroupInvoices extends Component
{
    public $InvoiceSaved = false;
    public $InvoiceUpdated = false;
    public $show_table = true;
    public $updateMode = false;
    public $group_invoice_id;
    public $Group_id;
    public $catchError;
    public $price = 0;
    public $patient_id, $doctor_id, $section_id, $type;
    public $discount_value = 0;
    public $tax_rate = 0;
    public $tax_value;
    public $insurance_id, $insurance_discount = 0, $company_rate = 0, $insurance_amount = 0, $patient_amount = 0;

    protected $rules = [
        'tax_rate' => 'nullable|numeric|min:0|max:100',
        'insurance_discount' => 'nullable|numeric|min:0|max:100',
        'company_rate' => 'nullable|numeric|min:0|max:100',
    ];



    public function render()
    {
        [$subtotal, $tax_value, $total, $insurance_amount, $patient_amount] = $this->calculateTotals();
        $this->insurance_amount = $insurance_amount;
        $this->patient_amount = $patient_amount;
        return view('livewire.group_invoices.group-invoices', [
            'group_invoices' => Invoice::where('invoice_type', 2)->get(),
            'Patients' => Patient::all(),
            'Doctors' => Doctor::all(),
            'Groups' => Group::all(),
            'Insurances' => Insurance::all(),
            'subtotal' => $subtotal,
            'tax_value' => $tax_value,
            'total' => $total,
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedInsuranceId($value)
    {
        if ($value) {
            $insurance = Insurance::find($value);
            $this->insurance_discount = $insurance->discount_percentage;
            $this->company_rate = $insurance->Company_rate;
        } else {
            $this->insurance_discount = 0;
            $this->company_rate = 0;
        }
    }

    private function calculateTotals()
    {
        $subtotal = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
        $subtotal -= $subtotal * ((is_numeric($this->insurance_discount) ? $this->insurance_discount : 0) / 100);
        $tax_value = $subtotal * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
        $total = $subtotal + $tax_value;
        $insurance_amount = $total * ((is_numeric($this->company_rate) ? $this->company_rate : 0) / 100);
        $patient_amount = $total - $insurance_amount;
        return [$subtotal, $tax_value, $total, $insurance_amount, $patient_amount];
    }



    public function show_form_add()
    {
        $this->show_table = false;
    }


    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;
    }

    public function get_price()
    {
        $this->price = Group::where('id', $this->Group_id)->first()->Total_before_discount;
        $this->discount_value = Group::where('id', $this->Group_id)->first()->discount_value;
        $this->tax_rate = Group::where('id', $this->Group_id)->first()->tax_rate;
    }


    public function store()
    {
        $this->validate();

        // في حالة كانت الفاتورة نقدي
        if ($this->type == 1) {

            try {
                // في حالة التعديل
                if ($this->updateMode) {

                    $group_invoices = Invoice::findorfail($this->group_invoice_id);
                    $group_invoices->invoice_type = 2;
                    $group_invoices->invoice_date = date('Y-m-d');
                    $group_invoices->patient_id = $this->patient_id;
                    $group_invoices->doctor_id = $this->doctor_id;
                    $group_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $group_invoices->Group_id = $this->Group_id;
                    $group_invoices->price = $this->price;
                    $group_invoices->discount_value = $this->discount_value;
                    $group_invoices->tax_rate = $this->tax_rate;
                    [$subtotal, $tax_value, $total, $insurance_amount, $patient_amount] = $this->calculateTotals();
                    $group_invoices->insurance_id = $this->insurance_id;
                    $group_invoices->insurance_discount = $this->insurance_discount;
                    $group_invoices->company_rate = $this->company_rate;
                    $group_invoices->tax_value = $tax_value;
                    $group_invoices->total_with_tax = $total;
                    $group_invoices->insurance_amount = $insurance_amount;
                    $group_invoices->patient_amount = $patient_amount;
                    $group_invoices->type = $this->type;
                    $group_invoices->save();

                    $fund_accounts = FundAccount::where('invoice_id', $this->group_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $group_invoices->id;
                    $fund_accounts->Debit = $group_invoices->patient_amount;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceUpdated = true;
                    $this->show_table = true;
                }

                // في حالة الاضافة
                else {

                    $group_invoices = new Invoice();
                    $group_invoices->invoice_type = 2;
                    $group_invoices->invoice_date = date('Y-m-d');
                    $group_invoices->patient_id = $this->patient_id;
                    $group_invoices->doctor_id = $this->doctor_id;
                    $group_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $group_invoices->Group_id = $this->Group_id;
                    $group_invoices->price = $this->price;
                    [$subtotal, $tax_value, $total, $insurance_amount, $patient_amount] = $this->calculateTotals();
                    $group_invoices->discount_value = $this->discount_value;
                    $group_invoices->tax_rate = $this->tax_rate;
                    $group_invoices->insurance_id = $this->insurance_id;
                    $group_invoices->insurance_discount = $this->insurance_discount;
                    $group_invoices->company_rate = $this->company_rate;
                    $group_invoices->tax_value = $tax_value;
                    $group_invoices->total_with_tax = $total;
                    $group_invoices->insurance_amount = $insurance_amount;
                    $group_invoices->patient_amount = $patient_amount;
                    $group_invoices->type = $this->type;
                    $group_invoices->save();

                    $fund_accounts = new FundAccount();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $group_invoices->id;
                    $fund_accounts->Debit = $group_invoices->patient_amount;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                    $this->rest();
                }
                
            } catch (\Exception $e) {
                $this->catchError = $e->getMessage();
            }
        }

        //----------------------------------------------------------------------------------------------------

        // في حالة الفاتورة اجل

        else {

            try {
                // في حالة التعديل
                if ($this->updateMode) {

                    $group_invoices = Invoice::findorfail($this->group_invoice_id);
                    $group_invoices->invoice_type = 2;
                    $group_invoices->invoice_date = date('Y-m-d');
                    $group_invoices->patient_id = $this->patient_id;
                    $group_invoices->doctor_id = $this->doctor_id;
                    $group_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $group_invoices->Group_id = $this->Group_id;
                    $group_invoices->price = $this->price;
                    [$subtotal, $tax_value, $total, $insurance_amount, $patient_amount] = $this->calculateTotals();
                    $group_invoices->discount_value = $this->discount_value;
                    $group_invoices->tax_rate = $this->tax_rate;
                    $group_invoices->insurance_id = $this->insurance_id;
                    $group_invoices->insurance_discount = $this->insurance_discount;
                    $group_invoices->company_rate = $this->company_rate;
                    $group_invoices->tax_value = $tax_value;
                    $group_invoices->total_with_tax = $total;
                    $group_invoices->insurance_amount = $insurance_amount;
                    $group_invoices->patient_amount = $patient_amount;
                    $group_invoices->type = $this->type;
                    $group_invoices->save();

                    $patient_accounts = PatientAccount::where('invoice_id', $this->group_invoice_id)->first();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $group_invoices->id;
                    $patient_accounts->patient_id = $group_invoices->patient_id;
                    $patient_accounts->Debit = $group_invoices->patient_amount;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    $this->InvoiceUpdated = true;
                    $this->show_table = true;
                    $this->rest();
                }

                // في حالة الاضافة
                else {


                    $group_invoices = new Invoice();
                    $group_invoices->invoice_type = 2;
                    $group_invoices->invoice_date = date('Y-m-d');
                    $group_invoices->patient_id = $this->patient_id;
                    $group_invoices->doctor_id = $this->doctor_id;
                    $group_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $group_invoices->Group_id = $this->Group_id;
                    $group_invoices->price = $this->price;
                    [$subtotal, $tax_value, $total, $insurance_amount, $patient_amount] = $this->calculateTotals();
                    $group_invoices->discount_value = $this->discount_value;
                    $group_invoices->tax_rate = $this->tax_rate;
                    $group_invoices->insurance_id = $this->insurance_id;
                    $group_invoices->insurance_discount = $this->insurance_discount;
                    $group_invoices->company_rate = $this->company_rate;
                    $group_invoices->tax_value = $tax_value;
                    $group_invoices->total_with_tax = $total;
                    $group_invoices->insurance_amount = $insurance_amount;
                    $group_invoices->patient_amount = $patient_amount;
                    $group_invoices->type = $this->type;
                    $group_invoices->save();

                    $patient_accounts = new PatientAccount();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $group_invoices->id;
                    $patient_accounts->patient_id = $group_invoices->patient_id;
                    $patient_accounts->Debit = $group_invoices->patient_amount;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                    $this->rest();
                }
                $invoiceType = $this->type == 1 ? 'نقدية' : 'آجل';
                $message = 'تم إنشاء فاتورة جماعية ' . $invoiceType;
                foreach ([$this->doctor_id, $this->patient_id] as $userId) {
                    $notification = new Notification();
                    $notification->user_id = $userId;
                    $notification->message = $message;
                    $notification->save();
                }
                foreach (Admin::all() as $admin) {
                    Notification::create([
                        'user_id' => $admin->id,
                        'message' => $message,
                    ]);
                }
                

                $data = [
                    'patient' => $this->patient_id,
                    'patient_id' => $this->patient_id,
                    'invoice_id' => $group_invoices->id,
                    'doctor_id' => $this->doctor_id,
                    'invoice_type' => 'فاتورة جماعية ' . $invoiceType,
                ];

                event(new CreateInvoice($data));
            } catch (\Exception $e) {
                $this->catchError = $e->getMessage();
            }
        }
    }


    public function edit($id)
    {

        $this->show_table = false;
        $this->updateMode = true;
        $group_invoices = Invoice::findorfail($id);
        $this->group_invoice_id = $group_invoices->id;
        $this->patient_id = $group_invoices->patient_id;
        $this->doctor_id = $group_invoices->doctor_id;
        $this->section_id = DB::table('section_translations')->where('id', $group_invoices->section_id)->first()->name;
        $this->Group_id = $group_invoices->Group_id;
        $this->price = $group_invoices->price;
        $this->discount_value = $group_invoices->discount_value;
        $this->tax_rate = $group_invoices->tax_rate;
        $this->tax_value = $group_invoices->tax_value;
        $this->type = $group_invoices->type;
        $this->insurance_id = $group_invoices->insurance_id;
        $this->insurance_discount = $group_invoices->insurance_discount;
        $this->company_rate = $group_invoices->company_rate;
        $this->insurance_amount = $group_invoices->insurance_amount;
        $this->patient_amount = $group_invoices->patient_amount;
    }

    public function delete($id)
    {
        $this->group_invoice_id = $id;
    }

    public function destroy()
    {
        Invoice::destroy($this->group_invoice_id);
        return redirect()->to('/group_invoices');
    }

    public function print($id)
    {
        $single_invoice = Invoice::findorfail($id);
        return Redirect::route('group_Print_single_invoices', [
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->Doctor->name,
            'section_id' => $single_invoice->Section->name,
            'Group_id' => $single_invoice->Group->name,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
            'insurance_name' => optional($single_invoice->insurance)->name,
            'insurance_discount' => $single_invoice->insurance_discount,
            'company_rate' => $single_invoice->company_rate,
            'insurance_amount' => $single_invoice->insurance_amount,
            'patient_amount' => $single_invoice->patient_amount,
        ]);
    }
}
