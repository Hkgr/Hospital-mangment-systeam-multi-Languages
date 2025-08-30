<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Web\AmbulanceCallController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
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
    ],
    function () {

        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/Services', function () {
            return view('Services');
        });

        Route::get('/deps/Neurology', function () {
            return view('Neurology');
        });

        Route::get('/deps/Urology', function () {
            return view('Urology');
        });

        Route::get('/deps/Gastroenterology', function () {
            return view('Gastroenterology');
        });


        Route::get('/deps/Cardiology', function () {
            return view('Cardiology');
        });

        Route::get('/deps/eye', function () {
            return view('eye');
        });


        Route::get('/Articles/1', function () {
            return view('art1');
        });

        Route::get('/Articles/2', function () {
            return view('art2');
        });

        Route::post('/ambulance-call', [AmbulanceCallController::class, 'store'])
            ->name('ambulance.call.store');

            
        Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])
        ->name('notifications.markAllRead');
    }
);
