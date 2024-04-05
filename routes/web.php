<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('admin.Layout.index');
});
Route::get('/', function () {
    return view('Guess.index');
});
Route::get('/Login', function() { 
    return view('Login');
});
Route::get('/Register', function() { 
    return view('Register');
});
