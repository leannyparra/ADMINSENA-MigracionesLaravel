<?php

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseTeacherController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//computer
Route::get('computer', [ComputerController::class,'index'])->name('api.v1.computer.index');
Route::post('computer',[ComputerController::class, 'store'])->name('api.v1.computer.store');
Route::get('computer/{computer}',[ComputerController::class,'show'])->name('api.v1.computer.show');
Route::put('computer/{computer}',[ComputerController::class,'update'])->name('api.v1.computer.update');
Route::delete('computer/{computer}',[ComputerController::class,'destroy'])->name('api.v1.computer.destroy');

//area
Route::get('area', [AreaController::class,'index'])->name('api.v1.area.index');
Route::post('area',[AreaController::class, 'store'])->name('api.v1.area.store');
Route::get('area/{area}',[AreaController::class,'show'])->name('api.v1.area.show');
Route::put('area/{area}',[AreaController::class,'update'])->name('api.v1.area.update');
Route::delete('area/{area}',[AreaController::class,'destroy'])->name('api.v1.area.destroy');

//training Center
Route::get('training-center', [TrainingCenterController::class,'index'])->name('api.v1.trainingCenter.index');
Route::post('training-center',[TrainingCenterController::class, 'store'])->name('api.v1.trainingCenter.store');
Route::get('training-center/{trainingCenter}',[TrainingCenterController::class,'show'])->name('api.v1.trainingCenter.show');
Route::put('training-center/{trainingCenter}',[TrainingCenterController::class,'update'])->name('api.v1.trainingCenter.update');
Route::delete('training-center/{trainingCenter}',[TrainingCenterController::class,'destroy'])->name('api.v1.trainingCenter.destroy');

//teacher
Route::get('teacher', [TeacherController::class,'index'])->name('api.v1.teacher.index');
Route::post('teacher',[TeacherController::class, 'store'])->name('api.v1.teacher.store');
Route::get('teacher/{teacher}',[TeacherController::class,'show'])->name('api.v1.teacher.show');
Route::put('teacher/{teacher}',[TeacherController::class,'update'])->name('api.v1.teacher.update');
Route::delete('teacher/{teacher}',[TeacherController::class,'destroy'])->name('api.v1.teacher.destroy');

//course
Route::get('course', [CourseController::class,'index'])->name('api.v1.course.index');
Route::post('course',[CourseController::class, 'store'])->name('api.v1.course.store');
Route::get('course/{course}',[CourseController::class,'show'])->name('api.v1.course.show');
Route::put('course/{course}',[CourseController::class,'update'])->name('api.v1.course.update');
Route::delete('course/{course}',[CourseController::class,'destroy'])->name('api.v1.course.destroy');

//course-teacher (pivote)
Route::post('course/{course}/teachers',[CourseTeacherController::class,'store'])->name('api.v1.course.teachers.store');
Route::delete('course/{course}/teachers/{teacher}',[CourseTeacherController::class,'destroy'])->name('api.v1.course.teachers.destroy');

//apprendice
Route::get('apprentice', [ApprenticeController::class,'index'])->name('api.v1.apprentice.index');
Route::post('apprentice',[ApprenticeController::class, 'store'])->name('api.v1.apprentice.store');
Route::get('apprentice/{apprentice}',[ApprenticeController::class,'show'])->name('api.v1.apprentice.show');
Route::put('apprentice/{apprentice}',[ApprenticeController::class,'update'])->name('api.v1.apprentice.update');
Route::delete('apprentice/{apprentice}',[ApprenticeController::class,'destroy'])->name('api.v1.apprentice.destroy');