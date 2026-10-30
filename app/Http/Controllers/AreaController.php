<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use Cloudinary\Cloudinary;

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


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:areas,name',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $file = $request->file('imagen');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'areas',
                'resource_type' => 'image',
            ]
        );

        $area = Area::create([
            'name' => $request->name,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json([
            'message' => 'Área creada correctamente',
            'data' => $area,
        ], 201);
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