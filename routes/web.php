<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Permissions Routes
    // Route::get('/permissions',[PermissionController::class,'index'])->name('permissions.index');
    // Route::get('/permissions/create',[PermissionController::class,'create'])->name('permissions.create');
    // Route::post('/permissions',[PermissionController::class,'store'])->name('permissions.store');
    // Route::get('/permissions/{permission}/edit',[PermissionController::class,'edit'])->name('permissions.edit');
    // Route::put('/permissions/{permission}',[PermissionController::class,'update'])->name('permissions.update');
    // Route::delete('/permissions/{permission}',[PermissionController::class,'destroy'])->name('permissions.destroy');
    Route::resource('permissions', PermissionController::class)->except(['show']);
    // Users Routes
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    // Roles Routes
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::post('/logout',[UserController::class,'logout'])->name('logout');
});
