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
Route::get('/movies/title/{id}', ['uses' => 'MoviesController@post', 'as' => 'movies.post']);
//Route::get('/movies/title/{id}', ['uses' => 'MoviesController@default', 'as' => 'movies.default']);
Route::get('/movies/search', ['as' => 'movies.search', 'uses' => 'MoviesController@searchMovies',]);
Route::get('/movies/test', ['uses' => 'AdminController@pinjam', 'as' => 'admin.pinjam']);

Route::group(['middleware' => 'verify.auth'], function() {

   Route::get('/admin/customer', ['uses' => 'AdminController@customerShow', 'as' => 'admin.customer']);
   Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
   Route::get('/admin/movies', ['uses' => 'AdminController@movieShow', 'as' => 'admin.movies']);
   Route::delete('/admin/destroy/{id}', ['uses' => 'AdminController@destroyMovies', 'as' => 'admin-delete']);
   Route::get('/logout', ['uses' => 'AuthController@logout', 'as' => 'auth.logout']);
   Route::get('/admin/movies/add', ['uses' => 'AdminController@add', 'as' => 'admin.add']);
   Route::post('/admin/movies/add', ['uses' => 'AdminController@store', 'as' => 'admin.store']);
   Route::get('/admin/movies/edit/{id}', ['uses' => 'AdminController@edit', 'as' => 'admin.edit']);
   Route::put('/admin/movies/update/{id}', ['uses' => 'AdminController@updateMovie', 'as' => 'admin.update-movie']);
   Route::put('/admin/user/update/{id}', ['uses' => 'AdminController@updateUser', 'as' => 'admin.update-user']);
   Route::put('/admin/update/{id}', ['uses' => 'AdminController@update', 'as' => 'admin.update']);
   Route::get('/admin/categories', ['uses' => 'AdminController@categoriesShow', 'as' => 'admin.categories']);
   Route::delete('/movies/kembalikan/{id}', ['uses' => 'MoviesController@kembalikanMovies', 'as' => 'movies.kembalikan']);
   Route::post('/movies/pinjam', ['uses' => 'MoviesController@pinjamMovies', 'as' => 'movies.pinjam']);


});
