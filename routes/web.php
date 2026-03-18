<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('layouts.index');
})->name('main.index');

//Edit Profile

Route::get('/edit-profile' , [AuthController::class , 'editPage'])->middleware('auth')->name('user.edit');
Route::post('/edit-profile' , [AuthController::class , 'editProfile'])->middleware('auth')->name('user.editProfile');


// Dashboard

Route::get('/dashboard' , [AuthController::class , 'dash'])->middleware('auth')->name('user.dashboard');
Route::post('/register', [AuthController::class , 'register'])->name('user.register');
Route::post('/login', [AuthController::class , 'login'])->name('user.login');



// Authentication

Route::get('/{type}', [AuthController::class , 'showForm'])->name('user.create');


