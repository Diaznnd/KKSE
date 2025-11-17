<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FullscreenWrapperController;

// Landing page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Fullscreen wrapper (embed all pages in fullscreen mode)
Route::get('/fs', [FullscreenWrapperController::class, 'index'])->name('fullscreen');

// Visitor form
Route::get('/form', [VisitorController::class, 'create'])->name('visitor.form');
Route::post('/form', [VisitorController::class, 'store'])->name('visitor.store');

// Authentication
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Admin dashboard (protected)
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/export', [DashboardController::class, 'export'])->name('admin.dashboard.export');
});
