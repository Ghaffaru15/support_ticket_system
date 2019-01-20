<?php

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

Route::get('tickets','ApiTicketsController@index');

Route::get('ticket/{id}','ApiTicketsController@show');

Route::post('ticket','ApiTicketsController@store');

Route::put('ticket','ApiTicketsController@store');

Route::delete('ticket/{id}','ApiTicketsController@destroy');