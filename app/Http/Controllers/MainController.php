<?php

namespace App\Http\Controllers;

use App\Models\Offer;

class MainController extends Controller
{
    public function index()
    {
        $offers = Offer::with([
            'course',
            'trainingCenter'
        ])
        ->where('status', 'Activa')
        ->latest()
        ->get();

        return view('main', compact('offers'));
    }
}