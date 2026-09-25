<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;

class ApprenticeController extends Controller
{
    //public function index(){

    //$apprentices=Apprentice::all();
    //{

    //return view('apprentice.index',compact('apprentices'));

    //}
    //}

    public function index()
    {
        $apprentices = Apprentice::with(['course','computer'])->get();
        return response()->json($apprentices, 200);
    }


    public function store(Request $request){
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:apprentices,email',
                'cell_number' => 'required|string|max:15',
                'course_id' => 'required|exists:courses,id',
                'computer_id' => 'nullable|exists:computers,id',
            ]);

            $apprentice = Apprentice::create($validated);

            return response()->json([
                'message' => 'Aprendiz creado correctamente',
                'apprentice' => $apprentice
            ],201);
        }
    }

    public function show (int $id)
    {
     $apprentice = Apprentice::with(['course','computer'])->findOrFail($id);
       return response()->json($apprentice, 200);

    }

    public function update(Request $request, int $id)
    {
        $apprentice = Apprentice::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:apprentices,email,' . $apprentice->id,
            'cell_number' => 'required|string|max:15',
            'course_id' => 'required|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id',
        ]);

        $apprentice->update($validated);

        return response()->json([
            'message' => 'Aprendiz actualizado correctamente',
            'apprentice' => $apprentice
        ], 200);
    }


    public function destroy(int $id)
    {
        $apprentice = Apprentice::findOrFail($id);
        $apprentice->delete();

        return response()->json([
            'message' => 'Aprendiz eliminado correctamente'
        ], 200);
    }
}