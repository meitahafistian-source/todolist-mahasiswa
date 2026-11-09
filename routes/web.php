
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\DashboardController;

// Halaman awal
Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.store');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

// Halaman yang membutuhkan login
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Daftar tugas
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::patch('/tugas/{id}/status', [TugasController::class, 'updateStatus'])->name('tugas.updateStatus');
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');

    // Mata kuliah
    Route::get('/mata-kuliah', [MataKuliahController::class, 'index'])->name('mata_kuliah.index');
    Route::post('/mata-kuliah', [MataKuliahController::class, 'store'])->name('mata_kuliah.store');
    Route::put('/mata-kuliah/{id}', [MataKuliahController::class, 'update'])->name('mata_kuliah.update');
    Route::delete('/mata-kuliah/{id}', [MataKuliahController::class, 'destroy'])->name('mata_kuliah.destroy');

});
