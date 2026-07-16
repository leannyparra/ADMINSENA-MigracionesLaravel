<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer; 

class ComputerController extends Controller
{
        public function index(){

        $computers=Computer::all();
        {

            return view('computer.index',compact('computers'));

        }
    }

    public function create(){
        return view('computer.create');
    }

    public function store(Request $request){
        $computer = new Computer();
        
        $computer->number = $request->number;
        $computer->brand = $request->brand;
        
        $computer->save();

        return $computer;
    }

    public function show ($id)
    {
     $computer=Computer::find($id);
       return view('computer.show',compact('computer'));

    }




        public function edit(computer $computer)
    { 

        return view('computer.edit', compact('computer'));
    }



         public function update(Request $request, computer $computer){
            $computer->update($request->all());

        return redirect()->route('computer.index');

      }

    public function destroy(Computer $computer)
    {
        $computer->delete();
        return redirect()->route('computer.index');
    }
}
