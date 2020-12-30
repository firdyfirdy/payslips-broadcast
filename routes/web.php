<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MailBroadcastController;
use App\Http\Controllers\PaySlipController;
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

Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth', 'verified')->group(function () {
	Route::view('dashboard', 'dashboard')->name('dashboard');
	Route::view('profile', 'profile')->name('profile');

	Route::get('payslips/broadcast', [PaySlipController::class, 'broadcast'])->name('payslips.broadcast');
	Route::post('payslips/send', [PaySlipController::class, 'send'])->name('payslips.send');
	Route::post('payslips/set_session', [PaySlipController::class, 'setSession'])->name('payslips.set_session');

	Route::resource('employees', EmployeeController::class);
	Route::resource('payslips', PaySlipController::class);
	Route::resource('mailbroadcasts', MailBroadcastController::class);
	
});
