<?php


use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_Doctor\LaboratorieController;
use App\Http\Controllers\Dashboard_Doctor\RayController;
use App\Http\Controllers\Dashboard_Doctor\PatientDetailsController;
use App\Http\Controllers\Dashboard_Ray_Employee\InvoiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    //################################ dashboard doctor ########################################

    Route::get('/dashboard/ray_employee', function () {
        return view('Dashboard.dashboard_RayEmployee.dashboard');
    })->middleware(['auth:ray_employee'])->name('dashboard.ray_employee');
    //################################ end dashboard doctor #####################################

    Route::middleware(['auth:ray_employee'])->group(function () {
        Route::view('ray_employee/profile', 'Dashboard.profile')->name('profile.ray_employee');
        Route::view('ray_employee/profile/edit', 'Dashboard.editprofile')->name('profile.edit.ray_employee');

    //############################# invoices route ##########################################
     Route::resource('invoices_ray_employee', InvoiceController::class);
     Route::get('ray/completed_invoices', [InvoiceController::class,'completed_invoices'])->name('ray_completed_invoices');
     Route::get('ray/view_rays/{id}', [InvoiceController::class,'viewRays'])->name('ray_view_rays');
     Route::get('ray/patient_details/{patient}', [InvoiceController::class,'patientDetails'])->name('ray_patient_details');
        //############################# end invoices route ######################################

    });



//---------------------------------------------------------------------------------------------------------------


    require __DIR__ . '/auth.php';

});





