<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;
use App\Models\Area;
use App\Models\TrainingCenter;

class TeacherController extends Controller
{
        public function index(){

        $teachers=Teacher::all();
        {

            return view('teacher.index',compact('teachers'));

        }
    }
    public function create(){

        $areas = Area::all();
        $training_centers = TrainingCenter::all();
        
        return view('teacher.create', compact('areas', 'training_centers'));

    }

    public function store(Request $request){

        Teacher::create($request->all());
        

    }
    public function show ($id)
    {
     $teacher=Teacher::find($id);
       return view('teacher.show',compact('teacher'));

    }



        public function edit(teacher $teacher)
    { 
        $areas = Area::all();
        $training_centers = TrainingCenter::all();

        return view('teacher.edit', compact('teacher', 'areas', 'training_centers'));
    }

         public function update(Request $request, teacher $teacher){
        $teacher->update($request->all());

        return redirect()->route('teacher.index');

      }
}
