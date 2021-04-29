<?php

namespace App\Http\Controllers;

use App\oopFormOne;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function oopFormOne(Request $request)
    {
       if ($request) {

           $request->validate([
               'project_name' => 'required',
               'descrption' => 'required',
           ]);

           $data = new oopFormOne();
           $data->project_name = $request->input(['project_name']);
           $data->descrption   = $request->input(['descrption']);
           $data->save();
           return response()->json('done');
       }
    }
}
