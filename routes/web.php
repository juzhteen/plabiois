<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GenerateFormController;

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


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('residents', 'residents')->name('residents');
    Route::view('employees', 'employees')->name('employees');
    Route::view('employee-types', 'employee-types')->name('employee-types');
    Route::view('attendance', 'attendance')->name('attendance');
    Route::view('requests', 'requests')->name('requests');
});

// UN-AUTHED ROUTES

// Display request form
Route::view('requests/forms', 'requests-forms')->name('requests-forms');

// Display form to be printed
Route::get('requests/{request_id}/preview', [GenerateFormController::class, 'index']);