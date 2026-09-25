<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    //public function index(){

    //$areas=Area::all();
    //{

    //return view('area.index',compact('areas'));

    //}
    //}

    public function index()
    {
        $areas = Area::all();
        return response()->json($areas, 200);
    }


    public function store(Request $request){
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:areas,name',
            ]);

            $area = Area::create($validated);

            return response()->json([
                'message' => 'Área creada correctamente',
                'area' => $area
            ],201);
        }
    }

    public function show (int $id)
    {
     $area = Area::findOrFail($id);
       return response()->json($area, 200);

    }

    public function update(Request $request, int $id)
    {
        $area = Area::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:areas,name,' . $area->id,
        ]);

        $area->update($validated);

        return response()->json([
            'message' => 'Área actualizada correctamente',
            'area' => $area
        ], 200);
      }


    public function destroy(int $id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return response()->json([
            'message' => 'Área eliminada correctamente'
        ], 200);
    }
}