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

// Routes to get chapters
Route::get('/chapitres', 'ChapitreController@index')->name('chapitres.index');
Route::get('/chapitres/{id}', 'ChapitreController@show')->name('chapitres.show');
Route::get('/domaines/{id}/chapitres', 'ChapitreController@showdom')->name('domaines.showchap');
Route::get('/chapitres/{link}/prev', 'ChapitreController@showprev')->name('chapitres.showprevchap');
Route::get('/chapitres/{link}/next', 'ChapitreController@shownext')->name('chapitres.shownextchap');

// Routes to get domaines
Route::get('/domaines', 'DomaineController@index')->name('domaines.index');

// Routes to get evaluations
Route::get('/evaluations', 'EvaluationController@index')->name('evaluations.index');
Route::get('/evaluations/{id}', 'EvaluationController@show')->name('evaluations.show');

Route::get('/evaluations/chap/{id}', 'EvaluationController@evalachap')->name('evaluations.evalachap');
Route::get('/evaluations/{id}/check', 'EvaluationController@checkans')->name('evaluations.checkans');