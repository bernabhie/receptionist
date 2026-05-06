<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CheckInController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::patch('/appointments/{appointment}/confirm', [AppointmentController::class, 'confirm'])->name('appointments.confirm');
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/referrals', [ReferralController::class, 'index'])->name('referrals.index');
Route::patch('/referrals/{referral}/release', [ReferralController::class, 'release'])->name('referrals.release');
Route::get('/reminders', [ReminderController::class, 'index'])->name('reminders.index');
Route::post('/reminders/{appointment}/send', [ReminderController::class, 'send'])->name('reminders.send');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/check-in', [CheckInController::class, 'index'])->name('checkin.index');
Route::post('/check-in', [CheckInController::class, 'store'])->name('checkin.store');