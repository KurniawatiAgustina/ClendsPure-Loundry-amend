<?php

use App\Http\Controllers\AreaController;
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
    Auth::loginUsingId(1);
    return 1;
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
    Route::controller(AreaController::class)->name('area.')->group(function () {
        Route::get('cities', 'City')->name('cities');
        Route::get('subdistricts/{cityId}', 'subdistrict')->name('subdistricts');
        Route::get('villages/{subdistrictId}', 'villages')->name('villages');
    });
});
