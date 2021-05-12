<?php
use App\Http\Controllers\LoginController as login;
use App\Http\Controllers\RegisterController as register;
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

Route::get('/login', [login::class, 'index']);
Route::post('/login', [login::class, 'check']);

Route::get('/register', [register::class, 'index']);
Route::post('/register', [register::class, 'create']);

Route::any('/logout', function () {
    return view('welcome');
});
