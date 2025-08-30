<?php


use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_Doctor\LaboratorieController;
use App\Http\Controllers\Dashboard_Doctor\RayController;
use App\Http\Controllers\Dashboard_Doctor\PatientDetailsController;

use App\Http\Controllers\doctor\InvoiceController;
use App\Http\Controllers\Dashboard\appointments\AppointmentController;
use App\Http\Livewire\Chat\Createchat;
use App\Http\Livewire\Chat\Main;
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

    Route::get('/dashboard/doctor', function () {
        return view('Dashboard.doctor.dashboard');
    })->middleware(['auth:doctor'])->name('dashboard.doctor');

    //################################ end dashboard doctor #####################################

//---------------------------------------------------------------------------------------------------------------


    Route::middleware(['auth:doctor'])->group(function () {
        Route::view('doctor/profile', 'Dashboard.profile')->name('profile.doctor');
        Route::view('doctor/profile/edit', 'Dashboard.editprofile')->name('profile.edit.doctor');

        Route::prefix('doctor')->group(function () {


            //############################# completed_invoices route ##########################################
            Route::get('completed_invoices', [InvoiceController::class,'completedInvoices'])->name('completedInvoices');
            //############################# end invoices route ################################################

            //############################# review_invoices route ##########################################
            Route::get('review_invoices', [InvoiceController::class,'reviewInvoices'])->name('reviewInvoices');
            //############################# end invoices route #############################################

            //############################# invoices route ##########################################
            Route::resource('invoices', InvoiceController::class);
            //############################# end invoices route ######################################
            
            //############################# appointments route ##########################################
            Route::get('appointments', [AppointmentController::class,'doctorAppointments'])->name('doctor.appointments');
            Route::get('appointments/expired', [AppointmentController::class,'doctorExpiredAppointments'])->name('doctor.appointments.expired');
            Route::post('appointments/{appointment}/finish', [AppointmentController::class, 'markAsFinished'])->name('doctor.appointments.finish');
            //############################# end appointments route ######################################

            //############################# review_invoices route ##########################################
            Route::post('add_review', [DiagnosticController::class,'addReview'])->name('add_review');
            //############################# end invoices route #############################################


            //############################# Diagnostics route ##########################################

            Route::resource('Diagnostics', DiagnosticController::class);

            //############################# end Diagnostics route ######################################


            //############################# rays route ##########################################
            Route::post('rays/review', [RayController::class, 'review'])->name('rays.review');
            Route::resource('rays', RayController::class);

            //############################# end rays route ######################################


            //############################# Laboratories route ##########################################
            Route::post('Laboratories/review', [LaboratorieController::class, 'review'])->name('Laboratories.review');
            Route::resource('Laboratories', LaboratorieController::class);
            Route::get('show_laboratorie/{id}', [InvoiceController::class,'showLaboratorie'])->name('show.laboratorie');

            //############################# end Laboratories route ######################################


            //############################# rays route ##########################################

            Route::get('patient_details/{id}', [PatientDetailsController::class,'index'])->name('patient_details');

            //############################# end rays route ######################################

            //############################# Chat route ##########################################
            Route::get('list/patients',Createchat::class)->name('list.patients');
            Route::get('chat/patients',Main::class)->name('chat.patients');
            //############################# end Chat route ######################################

        });


        Route::get('/404', function () {
            return view('Dashboard.404');
        })->name('404');


    });
    require __DIR__ . '/auth.php';


});





