<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

Route::get('/tes', function () {
    dd(Auth::user());
});

Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('login', 'loginPage')->name('loginPage');
    Route::post('login', 'login')->name('login');
    Route::get('register', 'registerPage')->name('registerPage');
    Route::post('register', 'register')->name('register');
    Route::get('logout', 'logout')->name('logout');
});

Route::prefix('data-getter')->group(function () {
});
