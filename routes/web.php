<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GenerateFormController;
use App\Http\Controllers\AttendanceDtrController;

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


Route::group(['middleware' => ['auth:sanctum', 'verified', 'approved']], function () {
    Route::get('dashboard', function(){
        return redirect('/residents');
    }
    )->name('dashboard');
    Route::view('residents', 'residents')->name('residents');
    Route::view('employees', 'employees')->name('employees');
    Route::view('employee-types', 'employee-types')->name('employee-types');
    Route::view('attendance', 'attendance')->name('attendance');
    Route::view('attendance/dtr', 'attendance-dtr')->name('attendance-dtr');
    Route::view('requests', 'requests')->name('requests');
    Route::view('documents', 'documents')->name('documents');
    Route::view('users', 'users')->name('users');
    // Display form to be printed
    Route::get('requests/{request_id}/preview', [GenerateFormController::class, 'index']);
    Route::get('attendance/dtr/{employee_id}/{year}/{month}/print', [AttendanceDtrController::class, 'index'])->name('attendance-dtr-print');
    Route::get('attendance/{year}/{month}/{day}/print', [AttendanceDtrController::class, 'todays_attendance'])->name('today-attendance-dtr-print');
});

// UN-AUTHED ROUTES

// Display request form
Route::view('requests/forms', 'requests-forms')->name('requests-forms');