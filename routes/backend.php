<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        //################################# User ###########################
        Route::get('/Dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('Dashboard.user');

       //############################### Admin #############################
        Route::get('/Dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('Dashboard.admin');

        //############################### doctor #############################
        Route::get('/Dashboard/doctor', function () {
            return view('Dashboard.Doctor.dashboard');
        })->middleware(['auth:doctor', 'verified'])->name('Dashboard.doctor');

       //############################ Section ############################

       Route::middleware('auth:admin')->group(function () {

       Route::resource('sections',SectionController::class);


        //############################# Doctors route ##########################################

        Route::resource('Doctors', DoctorController::class);
        Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
        Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');


        //############################# service route ##########################################

        Route::resource('Service', SingleServiceController::class);


        //############################# GroupServices route ##########################################

        Route::view('Add_GroupServices','livewire.GroupServices.include_create')->name('Add_GroupServices');


        //############################# insurance route ##########################################

        Route::resource('Insurance', InsuranceController::class);


        //############################# Ambulance route ##########################################

        Route::resource('Ambulance', AmbulanceController::class);


        //############################# Patients route ##########################################

        Route::resource('Patients', PatientController::class);


        //############################# single_invoices route ##########################################

        Route::view('single_invoices','livewire.single_invoices.index')->name('single_invoices');

        Route::view('Print_single_invoices','livewire.single_invoices.print')->name('Print_single_invoices');

       //############################# single_invoices route ##########################################

       Route::view('group_invoices','livewire.Group_invoices.index')->name('group_invoices');

       Route::view('group_Print_single_invoices','livewire.Group_invoices.print')->name('group_Print_single_invoices');

        //############################# Receipt route ##########################################

        Route::resource('Receipt', ReceiptAccountController::class);

        //############################# Payment route ##########################################

        Route::resource('Payment', PaymentAccountController::class);


       });

       //################################################################

        require __DIR__.'/auth.php';

    });
