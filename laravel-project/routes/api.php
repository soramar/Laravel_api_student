<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();  
  Route::get('students', 'ApiController@index');
  Rpute::get('students/{id}', 'ApiController@show');
  Route::post('students', 'ApiController@create');
  Route::put('student/{id}', 'ApiController@update');
  Route::delete('students/{id}', 'ApiController@delete');
});
