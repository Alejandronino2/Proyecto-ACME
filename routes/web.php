<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    //Route::middleware(['auth', 'role:admin'])->group(function () { --- Arreglar error de logica de rol //
    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('owners', OwnerController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('assignments', AssignmentController::class);

    Route::get('/informe-vehiculos', [VehicleController::class, 'report'])->name('vehicles.report');
});


require __DIR__.'/auth.php';
