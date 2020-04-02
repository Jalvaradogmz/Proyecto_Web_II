<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/login.php', function () {
    return view('login');
});
Route::get('/registro.php', function () {
    return view('registro');
});
Route::get('/logout.php', function () {
    return view('logout');
});
Route::get('/privada.php', function () {
    return view('privada');
});