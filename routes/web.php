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

Route::get('/', function() {
  return view('welcome');
});

Route::get('/movies', ['uses' => 'MoviesController@index', 'as' => 'movies.index']);
Route::get('/movies/list', ['uses' => 'MoviesController@listMovies', 'as' => 'movies.list']);
Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'auth.login']);
Route::post('/login', ['uses' => 'AuthController@authenticate', 'as' => 'auth.auth']);
Route::get('/logout', ['uses' => 'AuthController@logout', 'as' => 'auth.logout']);
