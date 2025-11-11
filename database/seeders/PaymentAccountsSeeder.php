<?php

namespace Database\Seeders;

use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\PaymentAccount;
use Illuminate\Database\Seeder;

class PaymentAccountsSeeder extends Seeder
{
    public function run()
    {
        $patientIds = Patient::pluck('id')->all();
        if (empty($patientIds)) {
            return; // patients required
        }

        for ($i = 0; $i < 25; $i++) {
            $patientId = $patientIds[array_rand($patientIds)];
            $amount = random_int(20, 400);

            $payment = new PaymentAccount();
            $payment->date = date('Y-m-d', strtotime('-'.random_int(0, 365).' days'));
            $payment->patient_id = $patientId;
            $payment->amount = $amount;
            $payment->description = 'سند صرف رقم ' . ($i + 1);
            $payment->save();

            // قيود صندوق: دائن
            $fund = new FundAccount();
            $fund->date = $payment->date;
            $fund->Payment_id = $payment->id;
            $fund->credit = $amount;
            $fund->Debit = 0.00;
            $fund->save();

            // قيد حساب المريض: مدين
            $pa = new PatientAccount();
            $pa->date = $payment->date;
            $pa->patient_id = $patientId;
            $pa->Payment_id = $payment->id;
            $pa->Debit = $amount;
            $pa->credit = 0.00;
            $pa->save();
        }
    }
}

