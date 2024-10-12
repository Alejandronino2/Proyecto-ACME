<?php
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AssignmentController;
use App\Models\Assignment;
use App\Models\Driver;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    $assignments = Assignment::with(['vehicle', 'driver'])->paginate(10);
    return view('dashboard', compact('assignments'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::middleware(['auth'])->group(function () {
    Route::resource('owners', OwnerController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('assignments', AssignmentController::class);

    Route::get('/informe-vehiculos', [VehicleController::class, 'report'])->name('vehicles.report');
});


require __DIR__.'/auth.php';
