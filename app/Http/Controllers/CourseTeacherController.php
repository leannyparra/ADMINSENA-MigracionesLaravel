<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class CourseTeacherController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $course->teachers()->syncWithoutDetaching($validated['teacher_id']);

        return response()->json([
            'message' => 'Instructor asignado correctamente',
            'course' => $course->load('teachers')
        ], 201);
    }


    public function destroy(Course $course, Teacher $teacher)
    {
        if (!$course->teachers()->where('teachers.id', $teacher->id)->exists()) {
            return response()->json([
                'message' => 'El instructor no esta asignado a este curso'
            ], 404);
        }

        $course->teachers()->detach($teacher->id);

        return response()->json([
            'message' => 'Instructor desasignado correctamente'
        ], 200);
    }
}
