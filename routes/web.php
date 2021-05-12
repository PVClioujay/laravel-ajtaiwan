<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController as login;

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

Route::get('/login', [login::class, 'index']);

Route::any('/logout', function () {
    return view('welcome');
});


Route::any('/register', function () {
    return view('welcome');
});

Route::any('/restPwd', function () {
    return view('welcome');
});
