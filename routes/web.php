<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin
    Route::get('admin/home', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/show', [BookingController::class, 'index'])->name('admin.show');
    Route::get('admin/booking', [BookingController::class, 'create'])->name('booking.index');
    Route::post('admin/insert', [BookingController::class, 'store'])->name('booking.store');
    Route::post('admin/status/{id}', [BookingController::class, 'approved'])->name('booking.approved');
    Route::get('admin/export', [BookingController::class, 'export'])->name('booking.export');
    // Route::get('admin/insert', [AdminController::class, 'insert'])->name('admin.insert');
    // Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    // Route::post('admin/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
    // Route::get('admin/insert', [AdminController::class, 'insert'])->name('admin.insert');
    // Route::delete('admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/password', [HomeController::class, 'changepassword'])->name('change-password');
    Route::post('/password', [HomeController::class, 'updatepassword'])->name('update-password');

    Route::get('admin/vehicle', [VehicleController::class, 'index'])->name('admin.vehicle');
    Route::get('admin/driver', [DriverController::class, 'index'])->name('admin.driver');

    Route::get('admin/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('admin/role/insert', [RoleController::class, 'insert'])->name('role.insert');
    Route::post('admin/role/insert', [RoleController::class, 'store'])->name('role.store');
    Route::get('admin/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('admin/role/edit/{id}', [RoleController::class, 'update'])->name('role.update');
});

Route::middleware('auth')->group(function () {
    // User
    Route::get('user/home', [UserController::class, 'index'])->name('user.index');
    Route::get('user/show', [UserController::class, 'show'])->name('user.show');
    Route::get('user/booking', [UserController::class, 'user'])->name('booking.user');
    Route::post('user/booking', [UserController::class, 'store'])->name('booking.user.store');
    Route::get('user/insert', [UserController::class, 'insert'])->name('user.insert');
    Route::post('user/insert', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user/insert', [UserController::class, 'insert'])->name('user.insert');
    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/password', [HomeController::class, 'changepassword'])->name('change-password');
    Route::post('/password', [HomeController::class, 'updatepassword'])->name('update-password');
});
