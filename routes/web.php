<?php

use App\Http\Controllers\ControllersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\OeeMachineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HistoryLogController;
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
    $data['page_title'] = "Login";
    return view('auth.login', $data);
})->name('user.login');

Route::middleware('auth:web')->group(function () {

    //oee
    Route::resource('oee', OeeMachineController::class);

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');

    // Machine Overview
    Route::get('machine-overview',[DashboardController::class,'machineOverview'])->name('machine-overview');

    // Machine Analysis
    Route::get('machine-analysis',[DashboardController::class,'machineAnalysis'])->name('machine-analysis');

    // Breakdown Analysis
    Route::get('breakdown-analysis', [DashboardController::class, 'breakdownAnalysis'])->name('breakdown-analysis');

    // Master Data
    Route::prefix('/master-data')->name('master-data.')->group(function () {
        Route::get('/', function () {
            $data['page_title'] = 'Master Data';
            $data['breadcrumb'] = 'Master Data';
            return view('master-data.index', $data);
        })->name('index');

        // Departement
        Route::resource('departements', DepartementController::class);

        // Users
        Route::patch('change-password', [UserController::class, 'changePassword'])->name('users.change-password');
        Route::resource('users', UserController::class)->except([
            'show'
        ]);;
    });


    // History Log
    Route::resource('history-log', HistoryLogController::class)->except([
        'show', 'create', 'store', 'edit', 'update'
    ]);;

});
