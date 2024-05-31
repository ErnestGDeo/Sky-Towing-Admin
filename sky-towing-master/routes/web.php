<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::middleware('super_admin')->group(function () {
        Route::get('/', [AnalyticsController::class, 'analytics'])->name('home');
        Route::get('/analytics', [AnalyticsController::class, 'analytics'])->name('analytics.index');
        Route::redirect('/', '/analytics');

        Route::get('/report/report', [ReportController::class, 'index'])->name('report.report');
        Route::post('/report/report', [ReportController::class, 'report'])->name('report.export');
        Route::resource('users', UserController::class);
    });
    Route::get('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/services', [ServiceController::class, 'getServices']);
    Route::get('/services/{service}', [ServiceController::class, 'choiceService']);

    Route::resource('drivers', DriverController::class);
    Route::resource('profits', ProfitController::class);
    Route::post('profits/report', [ProfitController::class, 'report'])->name('profits.report');
    Route::get('profits/salary/{profit}', [ProfitController::class, 'downloadSalary'])->name('profits.salary');
    Route::resource('expenses', ExpenseController::class);
    Route::post('expenses/report', [ExpenseController::class, 'report'])->name('expenses.report');
});
