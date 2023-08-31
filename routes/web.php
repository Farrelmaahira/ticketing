<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'login')->middleware('guest');
    Route::get('/register', 'register')->middleware('guest');
    Route::post('/auth/login', 'signin');
    Route::post('/auth/register', 'signup');
    Route::post('/auth/logout', 'logout');
});

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard/admin', 'admin')->middleware(['auth', 'role:admin']);
    Route::get('/home', 'user')->middleware(['auth', 'role:user']);
});
