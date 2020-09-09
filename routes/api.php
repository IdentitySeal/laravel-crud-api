<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// get request route
Route::get('students','ApiController@getAllStudents');
Route::get('students/{id}','ApiController@getStudent');

// post request route
Route::post('students','ApiController@createStudent');

// update/put request route
Route::put('students/{id}','ApiController@updateStudent');

// delete request route
Route::delete('students/{id}','ApiController@deleteStudent');