<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;

class MoviesController extends Controller
{
   private $movies;

   public function __construct(Movies $movies)
   {
      $this->movies = $movies;
   }

   public function index()
   {
      $movie = Movies::all();

      return view('movies.index', compact('movie'));
   }

   public function listMovies()
   {
      $tableMovies = Movies::all() ;

      //dd($tableMovies);

      return view('movies.list-movies', compact('tableMovies'));
   }


}
