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

Route::get('/', function () {
    return view('login');
});


            // session flash chỉ được tồn tại duy nhất trong một request
            Route::get('/home', function () {
                return view('home');
               })->name('home');
               
               Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showFormLogin'])->name('auth.showFormLogin');
               Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
               Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');