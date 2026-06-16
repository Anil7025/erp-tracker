<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'permission:view dashboard'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('super-admin')->middleware('role:super admin')->name('super-admin.')->group(function () {
        Route::get('/', [SuperAdminController::class, 'index'])->name('index');
        Route::get('/users', [SuperAdminController::class, 'users'])->name('users');
        Route::put('/users/{user}/access', [SuperAdminController::class, 'updateUserAccess'])->name('users.access.update');
        Route::get('/roles', [SuperAdminController::class, 'roles'])->name('roles');
        Route::post('/permissions', [SuperAdminController::class, 'storePermission'])->name('permissions.store');
        Route::put('/roles/{role}/permissions', [SuperAdminController::class, 'updateRolePermissions'])->name('roles.permissions.update');
    });

    Route::prefix('admin-panel')->middleware('role:super admin|admin')->name('admin-panel.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
        Route::put('/users/{user}/role', [AdminController::class, 'updateUserRole'])->name('users.role.update');
        Route::get('/roles', [AdminController::class, 'roles'])->name('roles');
        Route::post('/permissions', [AdminController::class, 'storePermission'])->name('permissions.store');
        Route::put('/roles/{role}/permissions', [AdminController::class, 'updateRolePermissions'])->name('roles.permissions.update');
    });

    Route::view('/admin', 'dashboard')->middleware('role:super admin|admin')->name('admin.dashboard');
    Route::view('/hr', 'dashboard')->middleware('role:super admin|hr')->name('hr.dashboard');
    Route::view('/manager', 'dashboard')->middleware('role:super admin|manager')->name('manager.dashboard');
    Route::view('/staff', 'dashboard')->middleware('role:super admin|staff')->name('staff.dashboard');
    Route::view('/user', 'dashboard')->middleware('role:super admin|user')->name('user.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
