<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('layouts.index');
})->name('main.index');


// Dashboard

Route::get('/dashboard' , [AuthController::class , 'dash'])->middleware('auth')->name('user.dashboard');


// Authentication

Route::get('/{type}', [AuthController::class , 'showForm'])->name('user.create');
Route::post('/register', [AuthController::class , 'register'])->name('user.register');
Route::post('/login', [AuthController::class , 'login'])->name('user.login');


