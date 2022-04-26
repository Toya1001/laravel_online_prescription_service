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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::view('/test', 'test');
Route::view('contact', 'contact')->name('contact');
Route::view('faqs', 'faq')->name('faq');
Route::view('about', 'about')->name('about');
Route::view('dashboard', 'admin.dashboard');
Route::view('admin/patient', 'admin.patients')->name('admin.patient');
Route::view('admin/doctor', 'admin.doctors')->name('admin.doctor');
Route::view('admin/pharmacist', 'admin.pharmacist')->name('admin.pharmacist');
Route::view('admin/drug', 'admin.drugs')->name('admin.drug');
Route::view('admin/prescription', 'admin.prescriptions')->name('admin.prescription');


