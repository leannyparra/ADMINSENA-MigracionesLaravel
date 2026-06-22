<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;

class CourseTeacherController extends Controller
{
    public function create()
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        
        return view('course_teacher.create', compact('teachers', 'courses'));
    }

    public function store(Request $request)
    {

        $teacher = Teacher::findOrFail($request->teacher_id);
        $teacher->courses()->syncWithoutDetaching($request->course_id);
        
  
    }
}
