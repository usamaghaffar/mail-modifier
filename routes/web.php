<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [EmailController::class, 'mail'])->name('mail');

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('email.send')->middleware('modify-email-body');

