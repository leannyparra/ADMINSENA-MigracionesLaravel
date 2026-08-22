<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\AuthController;

//main
Route::get('/nosotros', function () {return view('main'); })->name('nosotros');

//login
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/inicio-usuario', function () {return view('usuario.inicio');})->name('inicio.usuario');

// register
Route::get('/register', function () {return view('auth.register');})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


// Rutas para Centros de Formacion 
Route::get('training-center/list', [TrainingCenterController::class, 'index'])->name('trainingCenter.index');
Route::get('training-center/create', [TrainingCenterController::class, 'create'])->name('trainingCenter.create');
Route::post('training-center/store', [TrainingCenterController::class, 'store'])->name('trainingCenter.store');
Route::delete('training-center/{trainingCenter}',[TrainingCenterController::class,'destroy'])->name('trainingCenter.destroy');

Route::get('training-center/{id}', [TrainingCenterController::class, 'show'])->name('trainingCenter.show');
Route::get('training-center/{trainingCenter}/editar', [TrainingCenterController::class, 'edit'])->name('trainingCenter.edit');
Route::put('training-center/{trainingCenter}', [TrainingCenterController::class, 'update'])->name('trainingCenter.update');


// Rutas para Computadores 
Route::get('computer/{computer}/editar',[ComputerController::class,'edit'])->name('computer.edit');
Route::put('computer/{computer}',[ComputerController::class,'update'])->name('computer.update');
Route::delete('computer/{computer}',[ComputerController::class,'destroy'])->name('computer.destroy');

Route::get('computer/list',[ComputerController::class,'index'])->name('computer.index');
Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');
Route::get('computer/{computer}',[ComputerController::class,'show'])->name('computer.show');
Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');

// Rutas para areas 
Route::get('area/{area}/editar',[AreaController::class,'edit'])->name('area.edit');
Route::put('area/{area}',[AreaController::class,'update'])->name('area.update');
Route::delete('area/{area}',[AreaController::class,'destroy'])->name('area.destroy');

Route::get('area/list',[AreaController::class,'index'])->name('area.index');
Route::get('area/create',[AreaController::class,'create'])->name('area.create');
Route::get('area/{area}',[AreaController::class,'show'])->name('area.show');
Route::post('area/store',[AreaController::class,'store'])->name('area.store');

// Rutas para teachers 
Route::get('teacher/{teacher}/editar',[TeacherController::class,'edit'])->name('teacher.edit');
Route::put('teacher/{teacher}',[TeacherController::class,'update'])->name('teacher.update');
Route::delete('teacher/{teacher}',[TeacherController::class,'destroy'])->name('teacher.destroy');

Route::get('teacher/list',[TeacherController::class,'index'])->name('teacher.index');
Route::get('teacher/create',[TeacherController::class,'create'])->name('teacher.create');
Route::get('teacher/{teacher}',[TeacherController::class,'show'])->name('teacher.show');
Route::post('teacher/store',[TeacherController::class,'store'])->name('teacher.store');

// Rutas para courses
Route::get('course/{course}/editar',[CourseController::class,'edit'])->name('course.edit');
Route::put('course/{course}',[CourseController::class,'update'])->name('course.update');
Route::delete('course/{course}',[CourseController::class,'destroy'])->name('course.destroy');

Route::get('course/list',[CourseController::class,'index'])->name('course.index');
Route::get('course/create',[CourseController::class,'create'])->name('course.create');
Route::get('course/{course}',[CourseController::class,'show'])->name('course.show');
Route::post('course/store',[CourseController::class,'store'])->name('course.store');

// Rutas para apprentices 
Route::get('apprentice/{apprentice}/editar',[ApprenticeController::class,'edit'])->name('apprentice.edit');
Route::put('apprentice/{apprentice}',[ApprenticeController::class,'update'])->name('apprentice.update');
Route::delete('apprentice/{apprentice}',[ApprenticeController::class,'destroy'])->name('apprentice.destroy');

Route::get('apprentice/list',[ApprenticeController::class,'index'])->name('apprentice.index');
Route::get('apprentice/create',[ApprenticeController::class,'create'])->name('apprentice.create');
Route::get('apprentice/{apprentice}',[ApprenticeController::class,'show'])->name('apprentice.show');
Route::post('apprentice/store',[ApprenticeController::class,'store'])->name('apprentice.store');

// Rutas para CourseTeacher--PIVOTE
Route::get('course-teacher/create',[CourseTeacherController::class,'create']);
Route::post('course-teacher/store',[CourseTeacherController::class,'store'])->name('course-teacher.store');

