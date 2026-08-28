<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Course;
use App\Models\TrainingCenter;

class OfferController extends Controller
{
    // LISTAR OFERTAS
    public function index()
    {
        $offers = Offer::with(['course', 'trainingCenter'])
            ->latest()
            ->get();

        return view('offer.index', compact('offers'));
    }


    // FORMULARIO CREAR
    public function create()
    {
        $courses = Course::orderBy('course_number')->get();

        $trainingCenters = TrainingCenter::orderBy('name')->get();

        return view('offer.create', compact(
            'courses',
            'trainingCenters'
        ));
    }


    // GUARDAR OFERTA
    public function store(Request $request)
    {
        $validated = $request->validate([

            'offer_number' => 'required|string|max:255|unique:offers,offer_number',

            'course_id' => 'required|exists:courses,id',

            'training_center_id' => 'required|exists:training_centers,id',

            'day' => 'required|string|max:255',

            'start_date' => 'required|date',

            'end_date' => 'required|date|after_or_equal:start_date',

            'modality' => 'required|string|max:255',

            'quota' => 'required|integer|min:1',

            'status' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        // Cupos disponibles inicialmente
        $validated['available_quota'] = $validated['quota'];


        // Guardar imagen si existe
        if ($request->hasFile('image')) {

            $validated['image'] =
                $request->file('image')->store('offers', 'public');

        }


        // Crear oferta
        Offer::create($validated);


        return redirect()
            ->route('offer.index')
            ->with('success', 'La oferta fue creada correctamente.');
    }


    // MOSTRAR OFERTA
    public function show(Offer $offer)
    {
        $offer->load([
            'course',
            'trainingCenter'
        ]);

        return view('offer.show', compact('offer'));
    }


    // FORMULARIO EDITAR
    public function edit(Offer $offer)
    {
        $courses = Course::orderBy('course_number')->get();

        $trainingCenters =
            TrainingCenter::orderBy('name')->get();

        return view('offer.edit', compact(
            'offer',
            'courses',
            'trainingCenters'
        ));
    }


    // ACTUALIZAR
    public function update(Request $request, Offer $offer)
    {
        $validated = $request->validate([

            'offer_number' =>
                'required|string|max:255|unique:offers,offer_number,' . $offer->id,

            'course_id' =>
                'required|exists:courses,id',

            'training_center_id' =>
                'required|exists:training_centers,id',

            'day' =>
                'required|string|max:255',

            'start_date' =>
                'required|date',

            'end_date' =>
                'required|date|after_or_equal:start_date',

            'modality' =>
                'required|string|max:255',

            'quota' =>
                'required|integer|min:1',

            'status' =>
                'required|string|max:255',

            'image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        // Ajustar cupos disponibles
        $difference =
            $validated['quota'] - $offer->quota;

        $validated['available_quota'] =
            max(
                0,
                $offer->available_quota + $difference
            );


        // Actualizar imagen
        if ($request->hasFile('image')) {

            $validated['image'] =
                $request->file('image')
                    ->store('offers', 'public');

        }


        $offer->update($validated);


        return redirect()
            ->route('offer.index')
            ->with(
                'success',
                'La oferta fue actualizada correctamente.'
            );
    }


    // ELIMINAR
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()
            ->route('offer.index')
            ->with(
                'success',
                'La oferta fue eliminada correctamente.'
            );
    }
}