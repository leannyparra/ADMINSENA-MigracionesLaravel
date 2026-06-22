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
Route::get('training-center/create', [TrainingCenterController::class, 'create']);
Route::post('training-center/store', [TrainingCenterController::class, 'store'])->name('training_center.store');

// Rutas para Computadores 
Route::get('computer/create', [ComputerController::class, 'create']);
Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');

// Rutas para areas 
Route::get('area/create',[AreaController::class,'create']);
Route::post('area/store',[AreaController::class,'store'])->name('area.store');

// Rutas para teachers
Route::get('teacher/create',[TeacherController::class,'create']);
Route::post('teacher/store',[TeacherController::class,'store'])->name('teacher.store');

// Rutas para courses
Route::get('course/create',[CourseController::class,'create']);
Route::post('course/store',[CourseController::class,'store'])->name('course.store');

// Rutas para apprentices
Route::get('apprentice/create',[ApprenticeController::class,'create']);
Route::post('apprentice/store',[ApprenticeController::class,'store'])->name('apprentice.store');

// Rutas para CourseTeacher
Route::get('course-teacher/create',[CourseTeacherController::class,'create']);
Route::post('course-teacher/store',[CourseTeacherController::class,'store'])->name('course-teacher.store');