<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //public function index(){

    //$courses=Course::all();
    //{

    //return view('course.index',compact('courses'));

    //}
    //}

    public function index()
    {
        $courses = Course::all();
        return response()->json($courses, 200);
    }


    public function store(Request $request){
        {
            $validated = $request->validate([
                'course_number' => 'required|string|max:255|unique:courses,course_number',
                'day' => 'required|string|max:255',
                'area_id' => 'nullable|exists:areas,id',
                'training_center_id' => 'nullable|exists:training_centers,id',
            ]);

            $course = Course::create($validated);

            return response()->json([
                'message' => 'Curso creado correctamente',
                'course' => $course
            ],201);
        }
    }

    public function show (int $id)
    {
     $course = Course::with(['area','training_center','teachers'])->findOrFail($id);
       return response()->json($course, 200);

    }

    public function update(Request $request, int $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'course_number' => 'required|string|max:255|unique:courses,course_number,' . $course->id,
            'day' => 'required|string|max:255',
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $course->update($validated);

        return response()->json([
            'message' => 'Curso actualizado correctamente',
            'course' => $course
        ], 200);
    }


    public function destroy(int $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json([
            'message' => 'Curso eliminado correctamente'
        ], 200);
    }
}