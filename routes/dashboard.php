
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.dashboard.general.dashboard');
})->name('dashboard');
