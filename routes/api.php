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


Route::get('/chapitres', 'ChapitreController@index')->name('chapitres.index');
Route::get('/chapitres/{id}', 'ChapitreController@show')->name('chapitres.show');
Route::get('/domaines/{id}/chapitres', 'ChapitreController@showdom')->name('domaines.showchap');

Route::get('/domaines', 'DomaineController@index')->name('domaines.index');