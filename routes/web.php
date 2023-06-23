<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/user-registration', [LoginController::class, 'userRegistration']);

Route::post('/user-login', [LoginController::class, 'userLogin']);

Route::get('/sellerdashboard', function () {
    return view('seller/dashboard');
});

Route::get('/additem', function () {
    return view('seller/additem');
});
