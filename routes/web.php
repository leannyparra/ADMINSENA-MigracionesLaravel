<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;

// Rutas para Centros de Formacion 
Route::get('training-center/create', [TrainingCenterController::class, 'create']);
Route::post('training-center/store', [TrainingCenterController::class, 'store'])->name('training_center.store');

// Rutas para Computadores 
Route::get('computer/create', [ComputerController::class, 'create']);
Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');

// Rutas para areas 
Route::get('area/create',[AreaController::class,'create']);
Route::post('area/store',[AreaController::class,'store'])->name('area.store');