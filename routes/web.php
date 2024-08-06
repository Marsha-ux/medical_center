<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StatusController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/date', [App\Http\Controllers\reservationController::class, 'show'])->name('show')->middleware('check_auth');
Route::get('/date/add1', [App\Http\Controllers\reservationController::class, 'create'])->middleware('check_auth');;
Route::post('/date/save', [App\Http\Controllers\reservationController::class, 'store'])->middleware('check_auth');;
Route::get('/date/edit1/{id}', [App\Http\Controllers\reservationController::class, 'edit'])->middleware('check_auth');;
Route::put('/date/update/{id}', [App\Http\Controllers\reservationController::class, 'update'])->middleware('check_auth');;
Route::get('/date/delete/{id}', [App\Http\Controllers\reservationController::class, 'destroy'])->middleware('check_auth');;
Route::get('/date/search', [App\Http\Controllers\reservationController::class, 'search'])->middleware('check_auth');;


/*---------------------------------------------[Patients]---------------------------------------------*/
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index')->middleware('check_auth');;                 

Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create')->middleware('check_auth');;        

Route::post('/patients', [PatientController::class, 'store'])->name('patients.store')->middleware('check_auth');;        

Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search')->middleware('check_auth');;

Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patients.show')->middleware('check_auth');;

Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit')->middleware('check_auth');;
Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update')->middleware('check_auth');;

Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy')->middleware('check_auth');;


/*----------------------------------------------[status]------------------------------------*/

Route::get('/status/add',[StatusController::class,'create'])->middleware('check_auth');;
Route::post('/status/save',[StatusController::class,'store'])->middleware('check_auth');;