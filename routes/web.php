<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
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
    // Route::get('/register', 'register')->middleware('guest');
    Route::post('/auth/login', 'signin');
    // Route::post('/auth/register', 'signup');
    Route::post('/auth/logout', 'logout');
});

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard/admin', 'admin')->middleware(['auth', 'role:admin']);
    Route::get('/dashboard/category', 'category')->middleware(['auth', 'role:admin']);
    Route::get('/home', 'user')->middleware(['auth', 'role:user']);
    Route::get('/dashboard/report', 'report')->middleware(['auth', 'role:user']);
});

Route::controller(CategoryController::class)->group(function(){
    Route::post('/dashboard/category', 'store')->middleware(['auth'], ['role:admin']);
    Route::get('/category', 'index')->middleware(['auth'], ['role:admin']);
    Route::get('/categorylist', 'show')->middleware(['auth'], ['role:admin']);
});

Route::controller(ReviewController::class)->group(function(){
    Route::get('/review', 'index')->middleware(['auth'], ['role:admin']);
});

Route::controller(ReportController::class)->group(function(){
    Route::post('/dashboard/report', 'store')->middleware(['auth', 'role:user']);
    Route::patch('/dashboard/report', 'update')->middleware(['auth', 'role:admin']);
});

Route::controller(NewUserController::class)->group(function(){
    Route::get('/newuser', 'newUser')->middleware(['auth', 'role:admin']);
    Route::get('/userlist', 'index')->middleware(['auth', 'role:admin']);
});
