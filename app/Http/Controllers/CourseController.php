<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Area;
use App\Models\TrainingCenter;

class CourseController extends Controller
{
        public function index(){

        $courses=Course::all();
        {

            return view('course.index',compact('courses'));

        }
    }

    public function create(){
        $areas = Area::all();
        $training_centers = TrainingCenter::all();
        
        return view('course.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request){
        Course::create($request->all());

    }
    public function show ($id)
    {
     $course=Course::find($id);
       return view('course.show',compact('course'));

    }






    public function edit(course $course)
    { 
        $areas = Area::all();
        $training_centers = TrainingCenter::all();

        return view('course.edit', compact('course', 'areas', 'training_centers'));
    }



         public function update(Request $request, course $course){
        $course->update($request->all());

        return redirect()->route('course.index');

      }
}
