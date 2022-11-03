<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\DashboardController;

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
// Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware(['is_verify_email', 'auth']);
Route::get('test', [LoginController::class, 'test'])->name('test');
Route::get('errorpage', [LoginController::class, 'errorpage'])->name('errorpage');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware(['is_verify_email', 'auth']);


Route::middleware('auth','is_verify_email', 'CheckRole:Admin')->group(function () {
    
    Route::get('admindashboard', [DashboardController::class, 'admindashboard'])->name('admindashboard');


});
Route::middleware('auth','is_verify_email', 'CheckRole:User')->group(function () {
    Route::get('userdashboard', [DashboardController::class, 'userdashboard'])->name('userdashboard');


});






///email verification
Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');
////forgetpassword
Route::get('forget-password',  [ForgotPasswordController::class, 'getEmail']);
Route::post('forget-password',  [ForgotPasswordController::class, 'postEmail']);

///reset password
Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);
   