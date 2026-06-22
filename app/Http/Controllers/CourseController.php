<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Area;
use App\Models\TrainingCenter;

class CourseController extends Controller
{
    public function create(){
        $areas = Area::all();
        $training_centers = TrainingCenter::all();
        
        return view('course.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request){
        Course::create($request->all());

    }
}
