<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');


//===========================================================================
//                        For Admin Doctor Part
//===========================================================================
Route::get('/add_doctor',[AdminController::class,'add_doctor']);
Route::get('/all_doctor',[AdminController::class,'all_doctor']);
Route::get('/update_doctor/{id}',[AdminController::class,'update_doctor']);
Route::post('/edit_doctor/{id}',[AdminController::class,'edit_doctor']);
Route::get('/delete_doctor/{id}',[AdminController::class,'delete_doctor']);
Route::post('/upload_doctor',[AdminController::class,'upload']);


//===========================================================================
//                        For Admin Appointment
//===========================================================================
Route::get('/show_appointment',[AdminController::class,'show_appointment']);
Route::get('/approved/{id}',[AdminController::class, 'approved']);
Route::get('/canceled/{id}',[AdminController::class, 'canceled']);

Route::get('/emailview/{id}',[AdminController::class,'emailview']);
Route::post('/send_email/{id}',[AdminController::class,'send_email']);



//===========================================================================
//                        For User Appointment
//===========================================================================
Route::post('/appointment',[HomeController::class, 'appointment']);
Route::get('/myappointment',[HomeController::class, 'myappointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class, 'cancel_appoint']);
























Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
