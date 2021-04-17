<?php

namespace App\Http\Controllers;

use App\FormSubmit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MangeDataController extends Controller
{
    public function formSubmit(Request $request)
    {
//        FormSubmit::create($request->all());
        return  json_decode($request->getContent() , true);;
    }
}
