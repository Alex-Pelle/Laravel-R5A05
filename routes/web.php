<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ModulesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('initialpage');});
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
