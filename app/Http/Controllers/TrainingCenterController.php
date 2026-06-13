<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter; 

class TrainingCenterController extends Controller
{
    public function create(){
        return view('trainingCenter.create');
    }


    public function store(Request $request){
        $trainingCenter = new TrainingCenter();
        
        $trainingCenter->name = $request->name;
        $trainingCenter->location = $request->location;
        
        $trainingCenter->save();

        return $trainingCenter; 
    }
}