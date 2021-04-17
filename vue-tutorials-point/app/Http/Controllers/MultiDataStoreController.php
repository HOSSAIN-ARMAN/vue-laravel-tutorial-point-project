<?php

namespace App\Http\Controllers;

use App\MultiDataStore;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MultiDataStoreController extends Controller
{

    public function store(Request $request)
    {

        $multiDataStores = json_decode($request->getContent() , true);

        foreach ($multiDataStores as $multiDataStore)
        {

            MultiDataStore::insert([
                'name'  => $multiDataStore['name'],
                'email' => $multiDataStore['email'],
                'mobno' => $multiDataStore['mobno'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        }

        return response()->json('$multiDataStores');
    }
}
