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

    }

    public function show ($id)
    {
     $apprentice=Apprentice::find($id);
       return view('apprentice.show',compact('apprentice'));

    }
    }
