<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter; 

class TrainingCenterController extends Controller
{
    //public function index(){

    //$trainingCenters=TrainingCenter::all();
    //{

    //return view('trainingCenter.index',compact('trainingCenters'));

    //}
    //}

    public function index()
    {
        $trainingCenters = TrainingCenter::all();
        return response()->json($trainingCenters, 200);
    }


    public function store(Request $request){
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:training_centers,name',
                'location' => 'required|string|max:255',
            ]);

            $trainingCenter = TrainingCenter::create($validated);

            return response()->json([
                'message' => 'Centro de formación creado correctamente',
                'training_center' => $trainingCenter
            ],201);
        }
    }

    public function show (int $id)
    {
     $trainingCenter = TrainingCenter::findOrFail($id);
       return response()->json($trainingCenter, 200);

    }

    public function update(Request $request, int $id)
    {
        $trainingCenter = TrainingCenter::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:training_centers,name,' . $trainingCenter->id,
            'location' => 'required|string|max:255',
        ]);

        $trainingCenter->update($validated);

        return response()->json([
            'message' => 'Centro de formación actualizado correctamente',
            'training_center' => $trainingCenter
        ], 200);
    }


    public function destroy(int $id)
    {
        $trainingCenter = TrainingCenter::findOrFail($id);
        $trainingCenter->delete();

        return response()->json([
            'message' => 'Centro de formación eliminado correctamente'
        ], 200);
    }
}