<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\FormSubmit;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'api'], function(){
    // Fetch Contacts
    Route::get('contacts', function(){
        return FormSubmit::latest()->orderBy('created_at', 'desc')->get();
    });

    // Get Single Contact
    Route::get('contact/{id}', function($id){
        return FormSubmit::findOrFail($id);
    });

    // Add Contact
    Route::post('contact/store', function(Request $request){
        return FormSubmit::create(['name' => $request->input(['name']), 'email' => $request->input(['email']), 'phone' => $request->input(['phone'])]);
    });

    // Update Contact
    Route::patch('contact/{id}', function(Request $request, $id){
        FormSubmit::findOrFail($id)->update(['name' => $request->input(['name']), 'email' => $request->input(['email']), 'phone' => $request->input(['phone'])]);
    });

    // Delete Contact
    Route::delete('contact/{id}', function($id){
        return FormSubmit::destroy($id);
    });
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('multiData/store', 'MultiDataStoreController@store');



//Route::apiResources(
//    [
//        'user' => 'API\UserController'
//    ]
//);
