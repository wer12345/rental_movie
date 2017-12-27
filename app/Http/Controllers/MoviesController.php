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

   //public function listMovies()
   //{
      //$tableMovies = Movies::all() ;

      //return view('movies.list-movies', compact('tableMovies'));
   //}

   public function post($id)
   {

      $moviesPost = $this->movies->find($id);

      $user_id = Auth::user()->id;

      $movie_user = DB::table('movie_user')->where('movies_id', '=', $moviesPost->id, 'AND', 'user_id', '=', 'Auth::user()->id')->count();

      return view('movies.post', compact('moviesPost', 'movie_user', 'user_id'));
   }

   public function generatePhoto($photo, $data) {
      $filename = date('YmdHis').'-'.snake_case($data['name']).".".$this->filesystem->extension($photo->getClientOriginalName());
      $path = public_path("/photos").$filename;

      $this->imageManager->make($photo->getRealPath())->save($pasth);

      return "/photos/".$filename;
   }

   public function searchMovies(Request $request)
   {
      $keyword = $request->input('keyword');

      $movies = $this->movies->where('title', 'LIKE', "%$keyword%")
                     ->orderBy('title', 'ASC')->paginate(12);
      $movies->appends(['keyword' => $keyword]);

      return view('movies.search', compact('movies'));
   }

   public function pinjamMovies(Request $request)
   {
      $userId = $request->input('user_id');
      $moviesId = $request->input('movies_id');

      DB::table('movie_user')->insert([
         'user_id' => $userId,
         'movies_id' => $moviesId
      ]);

      session()->flash('message', 'Movies Telah Di Pinjam');

      return redirect()->back();
   }
}
