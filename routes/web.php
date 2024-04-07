<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;

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


Route::middleware(['auth'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.Master.index');
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', function() { 
        return view('Login');
    });
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/register', function() { 
        return view('Admin.Master.daftarakun');
    });
    Route::post('register', [AuthController::class, 'Register'])->name('register');
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('edit.karyawan');
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('delete.karyawan');
});