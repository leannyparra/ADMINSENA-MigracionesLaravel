<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter; 

class TrainingCenterController extends Controller
{
    public function index(){

        $trainingCenters=TrainingCenter::all();
        {

            return view('trainingCenter.index',compact('trainingCenters'));

        }
    }
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
    public function show ($id)
    {
        $trainingCenter=TrainingCenter::find($id);
       return view('trainingCenter.show',compact('trainingCenter'));

    }



        public function edit(trainingCenter $trainingCenter)
    { 

        return view('trainingCenter.edit', compact('trainingCenter'));
    }



         public function update(Request $request, trainingCenter $trainingCenter){

         $trainingCenter->update($request->all());

        return redirect()->route('trainingCenter.index');

      }
    
}