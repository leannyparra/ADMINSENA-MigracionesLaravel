<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    public function index(){

        $apprentices=Apprentice::all();
        {

            return view('apprentice.index',compact('apprentices'));

        }
    }

    public function create(){
        $courses = Course::all();
        $computers = Computer::all();
        
        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request){

        Apprentice::create($request->all());
        return redirect()->route('apprentice.index');

    }

    public function show (Apprentice $apprentice)
    {
        //$apprentice=Apprentice::find($id);
       return view('apprentice.show',compact('apprentice'));

    }
    




        public function edit(apprentice $apprentice)
    { 

        $courses = Course::all();
        $computers = Computer::all();


        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }



        public function update(Request $request, apprentice $apprentice){

        $apprentice->update($request->all());

        return redirect()->route('apprentice.index');

      }




    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();
        return redirect()->route('apprentice.index');
    }
    }
