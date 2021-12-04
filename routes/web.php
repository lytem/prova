<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\DoctorController;
use App\Http\controllers\PatientController;
use App\Http\controllers\HomeController;
use App\Http\controllers\AppointmentController;
use App\Http\controllers\DepartmentController;
use App\Http\controllers\ExamController;
use App\Http\controllers\SpecialtyController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('clinica')->group(function () {
    Route::resource('doctors', DoctorController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::get('doctors/{doctorId}/patients',[PatientController::class,'patientDoctor']);
    Route::resource('departments', DepartmentController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('specialties', SpecialtyController::class);
});
