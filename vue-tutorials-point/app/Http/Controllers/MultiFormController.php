<?php

namespace App\Http\Controllers;

use App\StepOne;
use App\StepThree;
use App\StepTwo;
use App\User;
use Illuminate\Http\Request;

class MultiFormController extends Controller
{
    public function store(Request $request)
    {
        $userId = User::where('id', 1)->first();

        if ($request)
        {
            $stepOne = new StepOne();
            $stepOne->user_id = $userId->id;
            $stepOne->name    = $request->input(['name']);
            $stepOne->save();

            $stepTwo = new StepTwo();
            $stepTwo->user_id = $userId->id;
            $stepTwo->phone   = $request->input(['phone']);
            $stepTwo->email   = $request->input(['email']);
            $stepTwo->save();

            $stepThree = new StepThree();
            $stepThree->user_id = $userId->id;
            $stepThree->details = $request->input(['message']);
            $stepThree->save();

//            return response()->json($request->all());
            return response()->json($userId->id);
        }
    }

    public function fetch () {

        $users = User::orderBy('id', 'desc')->get();

//        $test = null;
//        foreach ($users as $user){
//            $test = $user->stepOne->name;
//        }

        return response()->json($users);

    }
}
