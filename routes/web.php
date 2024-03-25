<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome')->name('welcome');
});

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/register',[AuthManager::class, 'register'])->name('register');
Route::post('/register',[AuthManager::class, 'registerpost'])->name('register.post');

Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginpost'])->name('login.post');

Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');

//only authenticated user can access this route
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [AuthManager::class, 'home'])->name('home');
});