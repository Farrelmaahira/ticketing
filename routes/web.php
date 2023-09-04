<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
    Route::get('/dashboard/category/add', 'category')->middleware(['auth', 'role:admin']);
    Route::get('/home', 'user')->middleware(['auth', 'role:user']);
    Route::get('/dashboard/report/add', 'report')->middleware(['auth', 'role:user']);
});

Route::controller(CategoryController::class)->group(function(){
    Route::post('/dashboard/category', 'store')->middleware(['auth'], ['role:admin']);
    Route::get('/dashboard/category', 'index')->middleware(['auth'], ['role:admin']);
    Route::get('/dashboard/category/{id}', 'show')->middleware(['auth'], ['role:admin']);
    Route::get('/dashboard/category/edit/{id}', 'edit')->middleware(['auth', 'role:admin']);
    Route::put('/dashboard/category/{id}', 'update')->middleware(['auth', 'role:admin']);
    Route::delete('/dashboard/category/{id}', 'destroy')->middleware(['auth', 'role:admin']);
});

//INI HAPUS JADIIN SATU CONTROLLER AJA SAMA YANG REPORT -FARREL
// Route::controller(ReviewController::class)->group(function(){
//     Route::get('/review', 'index')->middleware(['auth'], ['role:admin']);
// });

Route::controller(ReportController::class)->group(function(){
    Route::post('/dashboard/report', 'store')->middleware(['auth', 'role:user']); 
    Route::get('/dashboard/report', 'index')->middleware(['auth', 'role:admin']);
    Route::get('/dashboard/report/{id}', 'show' )->middleware(['auth', 'role:admin']);
    Route::get('/dashboard/report/edit/{id}', 'edit')->middleware(['auth', 'role:admin']);
    Route::put('/dashboard/report/{id}', 'update')->middleware(['auth', 'role:admin']);
    Route::delete('/dashboard/report/{id}', 'destroy')->middleware(['auth', 'role:admin' ]);
});

//NAMA CONTROLLER GW GANTI JADI USERCONTROLLER -FARREL
Route::controller(UserController::class)->group(function(){
    Route::get('/dashboard/user/add', 'newUser')->middleware(['auth', 'role:admin']);
    Route::get('/dashboard/user', 'index')->middleware(['auth', 'role:admin']);    
    Route::post('/dashboard/user', 'storeUser')->middleware(['auth', 'role:admin']);    
    Route::get('/dashboard/user/{id}', 'show')->middleware(['auth', 'role:admin']);
    Route::get('/dashboard/user/edit/{id}', 'edit')->middleware(['auth', 'role:admin']);
    Route::put('/dashboard/user/{id}', 'update')->middleware(['auth', 'role:admin']);
    Route::delete('/dashboard/user/{id}', 'destroy')->middleware(['auth', 'role:admin']);
});
