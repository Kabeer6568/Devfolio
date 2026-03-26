<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PortfolioController;


Route::get('/', function () {
    return view('layouts.index');
})->name('main.index');
// Route::get('/portfolio', function () {
//     return view('layouts.admin.portfolio');
// })->middleware('auth')->name('user.protfolio');

// Route::get('/projects', function () {
//     return view('layouts.admin.projects');
// })->middleware('auth')->name('user.project');

Route::get('/portfolio' , [PortfolioController::class , 'userPortfolio'])->middleware('auth')->name('user.protfolio');


Route::get('/projects' , [ProjectController::class , 'showProject'])->middleware('auth')->name('user.project');
Route::post('/projects' , [ProjectController::class , 'createProject'])->middleware('auth')->name('user.createProject');


Route::get('/skills', [SkillController::class, 'showSkills'])->middleware('auth')->name('user.skills');
Route::delete('/skills/{id}', [SkillController::class, 'deleteSkill'])->middleware('auth')->name('user.delSkills');

Route::post('/skills', [SkillController::class , 'CreateSkill'])->middleware('auth')->name('user.skillsAdded');

//Edit Profile

Route::get('/edit-profile' , [AuthController::class , 'editPage'])->middleware('auth')->name('user.edit');
Route::post('/edit-profile' , [AuthController::class , 'editProfile'])->middleware('auth')->name('user.editProfile');


// Dashboard

Route::get('/dashboard' , [AuthController::class , 'dash'])->middleware('auth')->name('user.dashboard');
Route::post('/register', [AuthController::class , 'register'])->name('user.register');
Route::post('/login', [AuthController::class , 'login'])->name('user.login');



// Authentication

Route::get('/{type}', [AuthController::class , 'showForm'])->name('user.create');


