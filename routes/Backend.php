<?php

use App\Events\MyEvent;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\appointments\AppointmentController;
use App\Http\Controllers\Dashboard\AmbulanceCallController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\LaboratorieEmployeeController;
use App\Http\Controllers\Dashboard\LaboratorieController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\RayEmployeeController;
use App\Http\Controllers\Dashboard\SearchController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\Admin\AdminRayInvoiceController;
use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/Dashboard_Admin', [DashboardController::class, 'index']);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::get('/search', [SearchController::class, 'index'])->name('search');
        
        //################################ dashboard user ##########################################
        Route::get('/dashboard/user', function () {

            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('dashboard.user');

        Route::middleware(['auth'])->group(function () {
            Route::view('user/profile', 'Dashboard.profile')->name('profile.user');
            Route::view('user/profile/edit', 'Dashboard.editprofile')->name('profile.edit.user');
        });
        Route::middleware(['auth:web,admin,doctor,patient,laboratorie_employee,ray_employee'])->put('profile', [ProfileController::class, 'update'])->name('profile.update');
        //################################ end dashboard user #####################################



        //################################ dashboard admin ########################################
        Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])
            ->middleware(['auth:admin'])->name('dashboard.admin');

        //################################ end dashboard admin #####################################



        //---------------------------------------------------------------------------------------------------------------


        Route::middleware(['auth:admin'])->group(function () {
            Route::view('admin/profile', 'Dashboard.profile')->name('profile.admin');
            Route::view('admin/profile/edit', 'Dashboard.editprofile')->name('profile.edit.admin');


            //############################# sections route ##########################################

            Route::resource('Sections', SectionController::class);
            Route::get('create_section', [SectionController::class, 'create'])->name('Sections.index2');

            
            //############################# end sections route ######################################


            //############################# Doctors route ##########################################

            Route::resource('Doctors', DoctorController::class);
            Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');

            //############################# end Doctors route ######################################


            //############################# sections route ##########################################

            Route::resource('Service', SingleServiceController::class);

            //############################# end sections route ######################################

            //############################# GroupServices route ##########################################

            Route::view('Add_GroupServices', 'livewire.GroupServices.include_create')->name('Add_GroupServices');

            //############################# end GroupServices route ######################################

            //############################# insurance route ##########################################

            Route::resource('insurance', InsuranceController::class);

            //############################# end insurance route ######################################

            //############################# Ambulance route ##########################################

            Route::resource('Ambulance', AmbulanceController::class);

            //############################# end Ambulance route ######################################


            //############################# Ambulance Calls route ##########################################

            Route::resource('AmbulanceCalls', AmbulanceCallController::class)->only(['index','destroy']);
            Route::put('AmbulanceCalls/{id}/status/{status}', [AmbulanceCallController::class, 'updateStatus'])->name('AmbulanceCalls.updateStatus');

            //############################# end Ambulance Calls route ######################################
            
            //############################# Patients route ##########################################

            Route::resource('Patients', PatientController::class);
            Route::get('admin/view_rays/{id}', [PatientController::class,'viewRays'])->name('admin.rays.view');
            Route::get('admin/view_laboratories/{id}', [PatientController::class,'viewLaboratories'])->name('admin.laboratories.view');

            //############################# end Patients route ######################################


            //############################# single_invoices route ##########################################

            Route::view('single_invoices', 'livewire.single_invoices.index')->name('single_invoices');

            Route::view('Print_single_invoices', 'livewire.single_invoices.print')->name('Print_single_invoices');

            //############################# end single_invoices route ######################################

            //############################# Receipt route ##########################################

            Route::resource('Receipt', ReceiptAccountController::class);

            //############################# end Receipt route ######################################


            //############################# Payment route ##########################################

            Route::resource('Payment', PaymentAccountController::class);

            //############################# end Payment route ######################################


            //############################# RayEmployee route ##########################################

            Route::resource('ray_employee', RayEmployeeController::class)
            ->whereNumber('ray_employee');
            Route::get('rays/invoices', [AdminRayInvoiceController::class, 'index'])
            ->name('admin.ray_invoices.index');
            //############################# end RayEmployee route ######################################


            //############################# laboratorie_employee route ##########################################

            Route::resource('laboratorie_employee', LaboratorieEmployeeController::class)
                ->whereNumber('laboratorie_employee');
            //############################# end laboratorie_employee route ######################################

            //############################# laboratories route (admin scoped) ############################
            Route::get('admin/laboratories', [LaboratorieController::class, 'index'])->name('admin.laboratorie.index');
            Route::get('admin/laboratories/{laboratorie}', [LaboratorieController::class, 'show'])->name('admin.laboratorie.show');
            //############################# end laboratories route ######################################
            
            //############################# single_invoices route ##########################################

            Route::view('group_invoices', 'livewire.Group_invoices.index')->name('group_invoices');

            Route::view('group_Print_single_invoices', 'livewire.Group_invoices.print')->name('group_Print_single_invoices');

            //############################# end single_invoices route ######################################

            Route::get('appointments/index', [AppointmentController::class, 'index'])->name('appointments.index');
            Route::put('appointments/approval/{id}', [AppointmentController::class, 'approval'])->name('appointments.approval');
            Route::get('appointments/approval', [AppointmentController::class, 'index2'])->name('appointments.index2');
            Route::get('appointments/ExpiredDates', [AppointmentController::class, 'ExpiredDates'])->name('appointments.ExpiredDates');
            Route::delete('appointments/destroy/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
            Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
            Route::post('appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');

            //############################# end RayEmployee route ######################################


        });


        require __DIR__ . '/auth.php';
    }
);
