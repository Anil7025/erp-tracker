<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

// ─── Frontend (public landing pages) ──────────────────────────────────────
Route::name('frontend.')->group(function () {
    Route::get('/', fn () => view('frontend.index'))->name('home');
    Route::view('/product', 'frontend.product')->name('product');
    Route::view('/features', 'frontend.features')->name('features');
    Route::view('/pricing', 'frontend.pricing')->name('pricing');
    Route::view('/about', 'frontend.about')->name('about');
    Route::view('/contact', 'frontend.contact')->name('contact');
    Route::view('/sign-in', 'frontend.login')->name('login');
    Route::view('/sign-up', 'frontend.register')->name('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'permission:view dashboard'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('super-admin')->middleware('role:super admin')->name('super-admin.')->group(function () {
        Route::get('/', [SuperAdminController::class, 'index'])->name('index');
        Route::get('/users', [SuperAdminController::class, 'users'])->name('users');
        Route::post('/users', [SuperAdminController::class, 'storeUser'])->name('users.store');
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

    Route::view('/modules/employees', 'modules.show', ['title' => 'Employees', 'description' => 'Employee and HR management module.'])->middleware('permission:manage employees')->name('modules.employees');
    Route::view('/modules/attendance', 'modules.show', ['title' => 'Attendance', 'description' => 'Attendance management module.'])->middleware('permission:manage attendance')->name('modules.attendance');
    Route::view('/modules/payroll', 'modules.show', ['title' => 'Payroll', 'description' => 'Payroll management module.'])->middleware('permission:manage payroll')->name('modules.payroll');
    Route::view('/modules/projects', 'modules.show', ['title' => 'Projects', 'description' => 'Project and team tracking module.'])->middleware('permission:manage projects')->name('modules.projects');
    Route::view('/modules/tasks', 'modules.show', ['title' => 'Tasks', 'description' => 'Task tracking module.'])->middleware('permission:manage tasks')->name('modules.tasks');
    Route::view('/modules/reports', 'modules.show', ['title' => 'Reports', 'description' => 'Reports and insights module.'])->middleware('permission:view reports')->name('modules.reports');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ─── Override auth login/register with frontend pages ─────────────────────
// These come after auth.php so they override the default auth routes.
// The POST routes are already registered by auth.php for /login and /register.
Route::view('/login', 'frontend.login')->name('frontend.login-alt');
Route::view('/register', 'frontend.register')->name('frontend.register-alt');

// ─── POST handlers for /sign-in and /sign-up (same controllers as auth) ───
// auth.php defines POST for /login and /register but not /sign-in and /sign-up.
// The frontend forms submit via POST to their own URL (action="#"), so we need
// POST routes that point to the same Auth controllers.
Route::post('/sign-in', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::post('/sign-up', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
