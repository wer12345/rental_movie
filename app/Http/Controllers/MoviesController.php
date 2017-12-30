<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PinjamMoviesRequest;
use Intervention\Image\ImageManager;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use App\Movies;
use App\User;
use App\UserMovies;
use DB;

class MoviesController extends Controller
{
   private $movies;

   private $user;

   private $filesystem;

   private $ImageManager;

   private $userMovies;

   public function __construct(Movies $movies, ImageManager $imageManager, Filesystem $filesystem, User $user, UserMovies $userMovies)
   {
      $this->movies = $movies;
      $this->user = $user;
      $this->userMovies = $userMovies;
      $this->imageManager = $imageManager;
      $this->filesystem = $filesystem;
   }

   public function index()
   {
      $tableMovie = $this->movies->orderBy('id', 'ASC')->paginate(12);

      return view('movies.index', compact('tableMovie'));
   }

   public function listMovies()
   {
      $tableMovies = Movies::all() ;

      $user = $this->user->count();

      //dd($user);

      return view('movies.list-movies', compact('tableMovies'));
   }

   public function post($id)
   {

      $moviesPost = $this->movies->find($id);

      $user_id = Auth::user()->id;

      $movie_user = $this->userMovies->where('movies_id', '=', $moviesPost->id, 'AND', 'user_id', '=', 'Auth::user()->id')->count();

      $getPinjamData = $this->userMovies->where('movies_id', $moviesPost->id)->first();

      return view('movies.post', compact('moviesPost', 'movie_user', 'user_id', 'getPinjamData'));
   }

   public function searchMovies(Request $request)
   {
      $keyword = $request->input('keyword');

      $movies = $this->movies->where('title', 'LIKE', "%$keyword%")
                     ->orderBy('title', 'ASC')->paginate(12);
      $movies->appends(['keyword' => $keyword]);

      return view('movies.search', compact('movies'));
   }

   public function pinjamMovies(PinjamMoviesRequest $request)
   {
      $data = $request->all();

      $this->userMovies->create($data);

      session()->flash('message', 'Movies Telah Di Pinjam');

      return redirect()->back();
   }

   public function kembalikanMovies($id) {
      $movie_user = $this->userMovies->find($id);

      if($movie_user)
         $movie_user->delete();

      session()->flash('message', 'Movie Telah di Kembalikan');

      return redirect()->back();
   }
}
