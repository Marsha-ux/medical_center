<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//      return view('home');
//  });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//route of doctors

Route::get('/', [App\Http\Controllers\DoctorController::class, 'home']);
Route::get('doctors/index',[App\Http\Controllers\DoctorController::class,'index'])->name('doctors.index');
Route::get('doctors/{id}',[App\Http\Controllers\DoctorController::class,'show']);
Route::get('doctors.create',[App\Http\Controllers\DoctorController::class,'create'])->name('doctors.create');
Route::post('doctors/store',[App\Http\Controllers\DoctorController::class,'store'])->name('doctors.store');
Route::get('doctors.edit/{id}',[App\Http\Controllers\DoctorController::class,'edit'])->name('doctors.edit');
Route::get('doctors.destroy/{id}',[App\Http\Controllers\DoctorController::class,'destroy'])->name('doctors.destroy');
Route::post('doctors/{id}',[App\Http\Controllers\DoctorController::class,'update'])->name('doctors.update');


//route of specializations


     Route::get('specializations/index', [App\Http\Controllers\SpecializationController::class, 'index'])->name('specializations.index');
     Route::get('specializations/create',[App\Http\Controllers\SpecializationController::class,'create'])->name('specializations.create');
     Route::post('specializations/store',[App\Http\Controllers\SpecializationController::class,'store'])->name('specializations.store');
