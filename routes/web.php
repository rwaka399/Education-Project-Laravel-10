<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
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


//index
Route::get('/', [Controller::class, 'index']);

//login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('log-proses', [AuthController::class, 'logproses'])->name('log-proses');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/reg-proses', [AuthController::class, 'regproses'])->name('reg-proses');

// Route group only Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function (){
    Route::get('/home', [Controller::class, 'home'])->name('home');
    
    Route::get('/users', [Controller::class, 'user'])->name('user');
    Route::get('/create', [Controller::class, 'create'])->name('user.create');
    Route::post('/newuser', [Controller::class, 'newUser'])->name('user.newUser');
    
    //edit data
    Route::get('/edit/{id}', [Controller::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [Controller::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [Controller::class, 'delete'])->name('delete');
    
    Route::get('/sidebar', [Controller::class, 'sidebar'])->name('sidebar');
});
