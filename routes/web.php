<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;
use App\Http\Controllers\Home;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModulesController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\NonAuthenticate;
use Illuminate\Support\Facades\Route;





Route::middleware(Authenticate::class)->group(function () {
    Route::get('/home', [Home::class, 'index'])->name('home');
    Route::resource('/modules', ModulesController::class);
    Route::resource('/eleves', EleveController::class);
    Route::resource("/evaluations", EvaluationController::class);
    Route::resource("/evaluations/{evaluation}/notes", EvaluationEleveController::class)->names([
        'index' => 'notes.index',
        'create' => 'notes.create',
        'store' => 'notes.store',
        'edit' => 'notes.edit',
        'update' => 'notes.update',
        'destroy' => 'notes.destroy',
    ]);




});

Route::middleware(NonAuthenticate::class)->group(function () {
    Route::get('/', function () {return view('root');});
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [LoginController::class, 'register'])->name('register');
});


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



