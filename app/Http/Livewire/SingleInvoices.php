<?php

namespace App\Http\Livewire;

use App\Events\CreateInvoice;
use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Service;
use App\Models\single_invoice;
use Illuminate\Database\Eloquent\Model;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class SingleInvoices extends Component
{
    public $InvoiceSaved,$InvoiceUpdated;
    public $show_table = true;
    public $username;
    public $tax_rate = 17;
    public $updateMode = false;
    public $price,$discount_value = 0 ,$patient_id,$doctor_id,$section_id,$type,$Service_id,$single_invoice_id,$catchError;
    public $insurance_id,$insurance_discount = 0,$company_rate = 0,$insurance_amount = 0,$patient_amount = 0;

    protected $rules = [
        'tax_rate' => 'nullable|numeric|min:0|max:100',
        'insurance_discount' => 'nullable|numeric|min:0|max:100',
        'company_rate' => 'nullable|numeric|min:0|max:100',
    ];



    public function mount(){

        $this->username = auth()->user()->name;
     }



    public function render()
    {
        [$subtotal,$tax_value,$total_with_tax,$insurance_amount,$patient_amount] = $this->calculateTotals();
        $this->insurance_amount = $insurance_amount;
        $this->patient_amount = $patient_amount;
        return view('livewire.single_invoices.single-invoices', [
            'single_invoices'=>Invoice::where('invoice_type',1)->get(),
            'Patients'=> Patient::all(),
            'Doctors'=> Doctor::all(),
            'Services'=> Service::all(),
            'Insurances'=> Insurance::all(),
            'subtotal' => $subtotal,
            'tax_value'=> $tax_value,
            'total'=>$total_with_tax,
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedInsuranceId($value)
    {
        if($value){
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
        return [$subtotal,$tax_value,$total,$insurance_amount,$patient_amount];
    }

    public function show_form_add(){
        $this->show_table = false;
    }

    public function print($id)
    {
        $single_invoice = Invoice::findorfail($id);
        return Redirect::route('Print_single_invoices',[
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->Doctor->name,
            'section_id' => $single_invoice->Section->name,
            'Service_id' => $single_invoice->Service->name,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);

    }

    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;

    }

    public function get_price()
    {
        $this->price = Service::where('id', $this->Service_id)->first()->price;
    }


    public function edit($id){

        $this->show_table = false;
        $this->updateMode = true;
        $single_invoice = Invoice::findorfail($id);
        $this->single_invoice_id = $single_invoice->id;
        $this->patient_id = $single_invoice->patient_id;
        $this->doctor_id = $single_invoice->doctor_id;
        $this->section_id = DB::table('section_translations')->where('id', $single_invoice->section_id)->first()->name;
        $this->Service_id = $single_invoice->Service_id;
        $this->price = $single_invoice->price;
        $this->discount_value = $single_invoice->discount_value;
        $this->type = $single_invoice->type;
        $this->insurance_id = $single_invoice->insurance_id;
        $this->insurance_discount = $single_invoice->insurance_discount;
        $this->company_rate = $single_invoice->company_rate;
        $this->insurance_amount = $single_invoice->insurance_amount;
        $this->patient_amount = $single_invoice->patient_amount;


    }



    public function store(){
        $this->validate();
        // في حالة كانت الفاتورة نقدي
        if($this->type == 1){

            DB::beginTransaction();
            try {

                // في حالة التعديل
                if($this->updateMode){

                    $single_invoices = Invoice::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    [$subtotal,$tax_value,$total,$insurance_amount,$patient_amount] = $this->calculateTotals();
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    $single_invoices->insurance_id = $this->insurance_id;
                    $single_invoices->insurance_discount = $this->insurance_discount;
                    $single_invoices->company_rate = $this->company_rate;
                    $single_invoices->tax_value = $tax_value;
                    $single_invoices->total_with_tax = $total;
                    $single_invoices->insurance_amount = $insurance_amount;
                    $single_invoices->patient_amount = $patient_amount;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $fund_accounts = FundAccount::where('invoice_id',$this->single_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $single_invoices->id;
                    $fund_accounts->Debit = $single_invoices->patient_amount;
                                        $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceUpdated =true;
                    $this->show_table =true;


                }

                // في حالة الاضافة
                else{

                    $single_invoices = new Invoice();
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    [$subtotal,$tax_value,$total,$insurance_amount,$patient_amount] = $this->calculateTotals();
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    $single_invoices->insurance_id = $this->insurance_id;
                    $single_invoices->insurance_discount = $this->insurance_discount;
                    $single_invoices->company_rate = $this->company_rate;
                    $single_invoices->tax_value = $tax_value;
                    $single_invoices->total_with_tax = $total;
                    $single_invoices->insurance_amount = $insurance_amount;
                    $single_invoices->patient_amount = $patient_amount;
                    $single_invoices->type = $this->type;
                    $single_invoices->invoice_status = 1;
                    $single_invoices->save();

                    $fund_accounts = new FundAccount();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $single_invoices->id;
                    $fund_accounts->Debit = $single_invoices->patient_amount;
                                        $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceSaved =true;
                    $this->show_table =true;

                    $notifications = new Notification();
                    $notifications->user_id = $this->doctor_id;
                    $patient = Patient::find($this->patient_id);
                    $notifications->message = "كشف جديد : ".$patient->name;
                    $notifications->save();


                    $data=[
                        'patient'=>$this->patient_id,
                        'invoice_id'=>$single_invoices->id,
                        'doctor_id'=>$this->doctor_id,
                    ];

                    event(new CreateInvoice($data));

                }
                DB::commit();
            }

            catch (\Exception $e) {
                DB::rollback();
                $this->catchError = $e->getMessage();
            }

        }


        //------------------------------------------------------------------------

        // في حالة كانت الفاتورة اجل
        else{

            DB::beginTransaction();
            try {

                // في حالة التعديل
                if($this->updateMode){

                    $single_invoices = Invoice::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    [$subtotal,$tax_value,$total,$insurance_amount,$patient_amount] = $this->calculateTotals();
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    $single_invoices->insurance_id = $this->insurance_id;
                    $single_invoices->insurance_discount = $this->insurance_discount;
                    $single_invoices->company_rate = $this->company_rate;
                    $single_invoices->tax_value = $tax_value;
                    $single_invoices->total_with_tax = $total;
                    $single_invoices->insurance_amount = $insurance_amount;
                    $single_invoices->patient_amount = $patient_amount;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();


                    $patient_accounts = PatientAccount::where('invoice_id',$this->single_invoice_id)->first();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->Debit = $single_invoices->patient_amount;
                                        $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    $this->InvoiceUpdated =true;
                    $this->show_table =true;

                }

                // في حالة الاضافة
                else{

                    $single_invoices = new Invoice();
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    [$subtotal,$tax_value,$total,$insurance_amount,$patient_amount] = $this->calculateTotals();
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    $single_invoices->insurance_id = $this->insurance_id;
                    $single_invoices->insurance_discount = $this->insurance_discount;
                    $single_invoices->company_rate = $this->company_rate;
                    $single_invoices->tax_value = $tax_value;
                    $single_invoices->total_with_tax = $total;
                    $single_invoices->insurance_amount = $insurance_amount;
                    $single_invoices->patient_amount = $patient_amount;
                    $single_invoices->type = $this->type;
                    $single_invoices->invoice_status = 1;
                    $single_invoices->save();

                    $patient_accounts = new PatientAccount();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->Debit = $single_invoices->patient_amount;
                                        $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    $this->InvoiceSaved =true;
                    $this->show_table =true;
                }

                DB::commit();
            }

            catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }


        }

    }


    public function delete($id){

     $this->single_invoice_id = $id;

    }

    public function destroy(){
        Invoice::destroy($this->single_invoice_id);
        return redirect()->to('/single_invoices');
    }



}