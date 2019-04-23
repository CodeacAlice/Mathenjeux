<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main routes
Route::get('/', function () {
    return view('accueil');
});

Route::view('/chap', 'chap');
Route::view('/meth', 'meth');
Route::view('/exos', 'exos');

// Authentification
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Chapters
Route::view('/chap/equations.php', 'chap/equations');

// Tests
Route::view('/testreg', 'testregister');