<?php

namespace Database\Seeders;

use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use Illuminate\Database\Seeder;

class ReceiptAccountsSeeder extends Seeder
{
    public function run()
    {
        $patientIds = Patient::pluck('id')->all();
        if (empty($patientIds)) {
            return; // need patients
        }

        for ($i = 0; $i < 200; $i++) {
            $patientId = $patientIds[array_rand($patientIds)];
            $amount = random_int(10, 500);

            $receipt = new ReceiptAccount();
            $receipt->date = date('Y-m-d', strtotime('-'.random_int(0, 365).' days'));
            $receipt->patient_id = $patientId;
            $receipt->amount = $amount;
            $receipt->description = 'سند قبض رقم ' . ($i + 1);
            $receipt->save();

            // قيود محاسبية مرتبطة
            $fund = new FundAccount();
            $fund->date = $receipt->date;
            $fund->receipt_id = $receipt->id;
            $fund->Debit = $amount;
            $fund->credit = 0.00;
            $fund->save();

            $pa = new PatientAccount();
            $pa->date = $receipt->date;
            $pa->patient_id = $patientId;
            $pa->receipt_id = $receipt->id;
            $pa->credit = $amount; // لصالح المريض
            $pa->Debit = 0.00;
            $pa->save();
        }
    }
}

