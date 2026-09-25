<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    //public function index(){

    //$teachers=Teacher::all();
    //{

    //return view('teacher.index',compact('teachers'));

    //}
    //}

    public function index()
    {
        $teachers = Teacher::all();
        return response()->json($teachers, 200);
    }


    public function store(Request $request){
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:teachers,email',
                'area_id' => 'nullable|exists:areas,id',
                'training_center_id' => 'nullable|exists:training_centers,id',
            ]);

            $teacher = Teacher::create($validated);

            return response()->json([
                'message' => 'Instructor creado correctamente',
                'teacher' => $teacher
            ],201);
        }
    }

    public function show (int $id)
    {
     $teacher = Teacher::findOrFail($id);
       return response()->json($teacher, 200);

    }

    public function update(Request $request, int $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:teachers,email,' . $teacher->id,
            'area_id' => 'nullable|exists:areas,id',
            'training_center_id' => 'nullable|exists:training_centers,id',
        ]);

        $teacher->update($validated);

        return response()->json([
            'message' => 'Instructor actualizado correctamente',
            'teacher' => $teacher
        ], 200);
    }


    public function destroy(int $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return response()->json([
            'message' => 'Instructor eliminado correctamente'
        ], 200);
    }
}