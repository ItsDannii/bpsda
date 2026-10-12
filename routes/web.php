<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController as MainDashboardController;
use App\Http\Controllers\Operator\DashboardController as OperatorDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/dashboard', [MainDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::get('/reports', 'reports')->name('reports');
    Route::get('/settings', 'settings')->name('settings');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});

Route::prefix('operator')->name('operator.')->middleware(['auth', 'role:operator'])->controller(OperatorDashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::get('/monitoring', 'monitoring')->name('monitoring');
    Route::get('/reports', 'reports')->name('reports');
});
