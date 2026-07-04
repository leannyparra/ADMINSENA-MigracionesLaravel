<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseTeacherController;

// Rutas para Centros de Formacion 
Route::get('training-center/list',[TrainingCenterController::class,'index'])->name('trainingCenter.index');
Route::get('training-center/create', [TrainingCenterController::class, 'create'])->name('trainingCenter.create');
Route::get('training-center/{id}',[TrainingCenterController::class,'show'])->name('trainingCenter.show');
Route::post('training-center/store', [TrainingCenterController::class, 'store'])->name('trainingCenter.store');

// Rutas para Computadores 
Route::get('computer/list',[ComputerController::class,'index'])->name('computer.index');
Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');
Route::get('computer/{id}',[ComputerController::class,'show'])->name('computer.show');
Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');

// Rutas para areas 
Route::get('area/list',[AreaController::class,'index'])->name('area.index');
Route::get('area/create',[AreaController::class,'create'])->name('area.create');
Route::get('area/{id}',[AreaController::class,'show'])->name('area.show');
Route::post('area/store',[AreaController::class,'store'])->name('area.store');

// Rutas para teachers 
Route::get('teacher/list',[TeacherController::class,'index'])->name('teacher.index');
Route::get('teacher/create',[TeacherController::class,'create'])->name('teacher.create');
Route::get('teacher/{id}',[TeacherController::class,'show'])->name('teacher.show');
Route::post('teacher/store',[TeacherController::class,'store'])->name('teacher.store');

// Rutas para courses
Route::get('course/list',[CourseController::class,'index'])->name('course.index');
Route::get('course/create',[CourseController::class,'create'])->name('course.create');
Route::get('course/{id}',[CourseController::class,'show'])->name('course.show');
Route::post('course/store',[CourseController::class,'store'])->name('course.store');

// Rutas para apprentices 
Route::get('apprentice/list',[ApprenticeController::class,'index'])->name('apprendice.index');
Route::get('apprentice/create',[ApprenticeController::class,'create'])->name('apprentice.create');
Route::get('apprentice/{id}',[ApprenticeController::class,'show'])->name('apprentice.show');
Route::post('apprentice/store',[ApprenticeController::class,'store'])->name('apprentice.store');

// Rutas para CourseTeacher--PIVOTE
Route::get('course-teacher/create',[CourseTeacherController::class,'create']);
Route::post('course-teacher/store',[CourseTeacherController::class,'store'])->name('course-teacher.store');