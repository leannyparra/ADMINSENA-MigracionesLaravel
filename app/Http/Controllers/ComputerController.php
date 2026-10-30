<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer; 
use Cloudinary\Cloudinary;

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


    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
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

        // Subir imagen a Cloudinary
        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'computers',
                'resource_type' => 'image',
            ]
        );

        // Guardar computador en la base de datos
        $computer = Computer::create([
            'number' => $validated['number'],
            'brand' => $validated['brand'],
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json([
            'message' => 'Computador creado correctamente',
            'data' => $computer,
        ], 201);
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

