<?php

use App\Http\Controllers\InstitutionsController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/institutions', 'InstitutionsController@index');
Route::get('/institutions/{institutions}', 'InstitutionsController@show');
Route::delete('/institutions/{institutions}', 'InstitutionsController@destroy');
Route::post('/institutions', 'InstitutionsController@store');
Route::patch('/institutions/{institutions}', 'InstitutionsController@update');
