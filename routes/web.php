<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthManager;

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
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/signup', [AuthManager::class, 'signup'])->name('signup');
Route::post('/signup', [AuthManager::class, 'signupPost'])->name('signup.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/studymaterial', function () {
    if(Auth::check()){
        return view('/dashboard');
    }
    return view('login');
})->name('studymaterial');

Route::get('/dashboard', function () {
    if(Auth::check()){
        return view('/dashboard');
    }
    return view('login');
});

Route::get('/taskmanager', function () {
    if(Auth::check()){
        return view('/taskmanager');
    }
    return view('login');
});