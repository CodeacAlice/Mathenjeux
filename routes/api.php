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
Route::get('/chapters', 'ChapterController@index')->name('chapters.index');
Route::get('/chapters/{id}', 'ChapterController@show')->name('chapters.show');
Route::get('/fields/{id}/chapters', 'ChapterController@showfield')->name('fields.showchap');
Route::get('/chapters/{link}/prev', 'ChapterController@showprev')->name('chapters.showprevchap');
Route::get('/chapters/{link}/next', 'ChapterController@shownext')->name('chapters.shownextchap');

// Routes to get fields
Route::get('/fields', 'FieldController@index')->name('fields.index');
Route::get('/fields/{id}', 'FieldController@show')->name('fields.show');

// Routes to get evaluations
Route::get('/evaluations', 'EvaluationController@index')->name('evaluations.index');
Route::get('/evaluations/{id}', 'EvaluationController@show')->name('evaluations.show');

Route::get('/evaluations/chap/{id}', 'EvaluationController@evalachap')->name('evaluations.evalachap');
Route::get('/evaluations/{id}/check', 'EvaluationController@checkans')->name('evaluations.checkans');

Route::get('/users', 'UserController@index')->name('users.index');


// Protected routes
Route::group(['middleware' => 'auth:api'], function() {
	Route::get('/users/show', 'UserController@show')->name('users.show');

	// Routes for notes
	Route::get('/notes', 'NoteController@index')->name('notes.index');
	Route::get('/notes/{id}', 'NoteController@show')->name('notes.show');
	Route::post('/notes/add', 'NoteController@add')->name('notes.add');
	Route::put('/notes/{id}/update', 'NoteController@update')->name('notes.update');
	Route::delete('/notes/{id}/suppr', 'NoteController@suppr')->name('notes.suppr');
});