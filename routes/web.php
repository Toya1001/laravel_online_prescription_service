<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'dashredirect'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['admin', 'auth'])->group(function () {
    Route::view('admin', 'admin.dashboard')->name('admin.dashboard');
    Route::view('admin/patient', 'admin.patients')->name('admin.patient');
    Route::view('admin/doctor', 'admin.doctors')->name('admin.doctor');
    Route::view('admin/pharmacist', 'admin.pharmacist')->name('admin.pharmacist');
    Route::view('admin/drug', 'admin.drugs')->name('admin.drug');
    Route::view('admin/prescription', 'admin.prescriptions')->name('admin.prescription');
});

Route::middleware(['auth', 'doctor'])->group(function () {
    Route::view('doctor', 'doctor.dashboard')->name('doctor.dashboard');
    Route::view('doctor/prescription', 'doctor.prescriptions')->name('doctor.prescription');
    Route::view('doctor/patient', 'doctor.patients')->name('doctor.patient');
});

Route::middleware(['auth', 'pharmacist'])->group(function () {
    //
    Route::view('pharmacist', 'pharmacist.dashboard')->name('pharmacist.dashboard');
    Route::view('pharmacist/patient', 'pharmacist.patients')->name('pharmacist.patient');
});

Route::middleware(['auth', 'patient'])->group(function () {
    //
});

Route::view('/test', 'test');
Route::view('contact', 'contact')->name('contact');
Route::view('faqs', 'faq')->name('faq');
Route::view('about', 'about')->name('about');




