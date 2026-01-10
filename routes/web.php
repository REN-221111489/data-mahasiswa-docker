<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MahasiswaController;

Route::get('/test', function () {
    return 'Laravel jalan';
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/operator/dashboard', function () {
    return view('operator.dashboard');
});

Route::get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
});

/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/
Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'dashboardMahasiswa']);
Route::get('/mahasiswa/data-diri', [MahasiswaController::class, 'dataDiri']);
Route::post('/mahasiswa/data-diri', [MahasiswaController::class, 'simpanDataDiri']);

/*
|--------------------------------------------------------------------------
| OPERATOR
|--------------------------------------------------------------------------
*/
Route::get('/operator/dashboard', [MahasiswaController::class, 'dashboardOperator']);

Route::get('/operator/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/operator/mahasiswa', [MahasiswaController::class, 'store']);

Route::get('/operator/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::post('/operator/mahasiswa/{id}/update', [MahasiswaController::class, 'update']);

Route::post('/operator/mahasiswa/{id}/delete', [MahasiswaController::class, 'destroy']);
