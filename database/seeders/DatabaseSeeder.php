<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            AdminTableSeeder::class,
            //AppointmentSeeder::class,
            SectionTableSeeder::class,
            DoctorTableSeeder::class,
            ImageTableSeeder::class,
            PatientTableSeeder::class,
            PatientBulkSeeder::class,
            RayEmployeeTableSeeder::class,
            LaboratorieEmployeeTableSeeder::class,
            ServiceTableSeeder::class,
            InsuranceTableSeeder::class,
            GroupServiceSeeder::class,
            AmbulanceTableSeeder::class,
            SingleServiceInvoicesSeeder::class,
            GroupInvoicesSeeder::class,
            ReceiptAccountsSeeder::class,
            PaymentAccountsSeeder::class,
            AppointmentBulkSeeder::class,
        ]);

    }
}
