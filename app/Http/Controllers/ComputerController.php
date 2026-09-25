<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer; 

class ComputerController extends Controller
{
        //public function index(){

        //$computers=Computer::all();
        //{

            //return view('computer.index',compact('computers'));

        //}
    //}

    public function index()
    {
        $computers = Computer::all();
        return response()->json($computers, 200);
    }


    public function store(Request $request){
        {
            $validated = $request->validate([
                'number' => 'required|string|max:255',
                'brand' => 'required|string|max:255',

            ]);

            $computer = Computer::create($validated);

            return response()->json([
                'message' => 'Computador creado correctamente',
                'computer' => $computer
            ],201);
        }
    }
    
    public function show (int $id)
    {
     $computer=Computer::findOrFail($id);
       return response()->json($computer, 200);

    }

    public function update(Request $request, int $id)
    {
        $computer = Computer::findOrFail($id);

        $validated = $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
        ]);

        $computer->update($validated);

        return response()->json([
            'message' => 'Computador actualizado correctamente',
            'computer' => $computer
        ], 200);
      }
      

    public function destroy(int $id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();

        return response()->json([
            'message' => 'Computador eliminado correctamente'
        ], 200);
}
}

