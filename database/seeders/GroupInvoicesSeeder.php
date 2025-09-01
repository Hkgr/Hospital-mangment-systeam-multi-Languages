<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Group;
use App\Models\Insurance;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use Illuminate\Database\Seeder;

class GroupInvoicesSeeder extends Seeder
{
    public function run()
    {
        $patients = Patient::pluck('id')->all();
        $doctorIds = Doctor::pluck('id')->all();
        $groups = Group::pluck('id')->all();
        $insuranceIds = Insurance::pluck('id')->all();

        if (empty($patients) || empty($doctorIds) || empty($groups)) {
            return; // require base data
        }

        for ($i = 0; $i < 100; $i++) {
            $patientId = $patients[array_rand($patients)];
            $doctorId = $doctorIds[array_rand($doctorIds)];
            $doctor = Doctor::find($doctorId);
            $sectionId = $doctor->section_id;

            $groupId = $groups[array_rand($groups)];
            $group = Group::find($groupId);

            $price = (float) $group->Total_before_discount;
            $discount = (float) $group->discount_value;
            $taxRate = (float) $group->tax_rate; // stored as string but numeric

            // insurance (optional)
            $useInsurance = !empty($insuranceIds) && (random_int(0, 1) === 1);
            $insuranceId = $useInsurance ? $insuranceIds[array_rand($insuranceIds)] : null;
            $insuranceDiscount = 0.0;
            $companyRate = 0.0;
            if ($insuranceId) {
                $ins = Insurance::find($insuranceId);
                $insuranceDiscount = (float) ($ins->discount_percentage ?? 0);
                $companyRate = (float) ($ins->Company_rate ?? 0);
            }

            // Calculate totals (same logic as component)
            $subtotal = max($price - $discount, 0);
            $subtotal -= round($subtotal * ($insuranceDiscount / 100), 2);
            $taxValue = round($subtotal * ($taxRate / 100), 2);
            $total = round($subtotal + $taxValue, 2);
            $insuranceAmount = round($total * ($companyRate / 100), 2);
            $patientAmount = round($total - $insuranceAmount, 2);

            $invoice = new Invoice();
            $invoice->invoice_type = 2; // group services
            $invoice->invoice_date = date('Y-m-d', strtotime('-'.random_int(0, 365).' days'));
            $invoice->patient_id = $patientId;
            $invoice->doctor_id = $doctorId;
            $invoice->section_id = $sectionId;
            $invoice->Group_id = $groupId;
            $invoice->Service_id = null;
            $invoice->price = $price;
            $invoice->discount_value = $discount;
            $invoice->tax_rate = (string)$taxRate;
            $invoice->tax_value = (string)$taxValue;
            $invoice->total_with_tax = $total;
            $invoice->type = random_int(1, 2); // cash/credit
            $invoice->invoice_status = 1;
            $invoice->insurance_id = $insuranceId;
            $invoice->insurance_discount = $insuranceDiscount;
            $invoice->company_rate = $companyRate;
            $invoice->insurance_amount = $insuranceAmount;
            $invoice->patient_amount = $patientAmount;
            $invoice->save();

            if ($invoice->type == 1) {
                $fund = new FundAccount();
                $fund->date = $invoice->invoice_date;
                $fund->invoice_id = $invoice->id;
                $fund->Debit = $patientAmount;
                $fund->credit = 0.00;
                $fund->save();
            } else {
                $pa = new PatientAccount();
                $pa->date = $invoice->invoice_date;
                $pa->invoice_id = $invoice->id;
                $pa->patient_id = $patientId;
                $pa->Debit = $patientAmount;
                $pa->credit = 0.00;
                $pa->save();
            }
        }
    }
}

