<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Filesystem\Filesystem;
use App\Movies;

class MoviesController extends Controller
{
   private $movies;

   private $filesystem;

   private $ImageManager;

   public function __construct(Movies $movies, ImageManager $imageManager, Filesystem $filesystem)
   {
      $this->movies = $movies;
      $this->imageManager = $imageManager;
      $this->filesystem = $filesystem;
   }

   public function index()
   {
      $tableMovie = $this->movies->orderBy('id', 'DESC')->paginate(12);

      return view('movies.index', compact('tableMovie'));
   }

   public function listMovies()
   {
      $tableMovies = Movies::all() ;

      return view('movies.list-movies', compact('tableMovies'));
   }

   public function post($id)
   {
      $moviesPost = $this->movies->find($id);

      return view('movies.post', compact('moviesPost'));
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
                     ->orderBy('title', 'ASC')->paginate(10);
      $movies->appends(['keyword' => $keyword]);

      return view('movies.search', compact('movies'));
   }

   public function searchCategory(Request $request)
   {

   }

}
