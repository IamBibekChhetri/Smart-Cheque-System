<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ChequeController;
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

// Dashboard Routes here =================================================
Route::prefix('')->middleware('auth')->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/userRole', UserRoleController::class);
    Route::resource('/companyInfo', CompanyInfoController::class);
});

Route::resource('cheque', ChequeController::class)->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
