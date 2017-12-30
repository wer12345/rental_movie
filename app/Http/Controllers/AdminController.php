<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MoviesRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\ImageManager;
use App\User;
use App\Movies;
use App\MoviesCategories;
use DB;

class AdminController extends Controller
{
   private $user;

   private $movies;

   private $filesystem;

   private $imageManager;

   private $moviesCategories;

   public function __construct(User $user, Movies $movies, Filesystem $filesystem, ImageManager $imageManager, MoviesCategories $moviesCategories)
   {
      $this->user = $user;
      $this->movies = $movies;
      $this->filesystem = $filesystem;
      $this->imageManager = $imageManager;
      $this->moviesCategories = $moviesCategories;
   }

   public function index()
   {
      $user = $this->user;

      $movies = $this->movies;

      $categories = $this->moviesCategories;

      return view('admin.admin-index', compact('user', 'movies', 'categories'));
   }

   public function customerShow()
   {
      $customers = $this->user->orderBy('id', 'ASC')->paginate(15);

      return view('admin.customer-list', compact('customers'));
   }

   public function movieShow()
   {
      $movies = $this->movies->with('moviesCategories')->orderBy('id', 'DESC')->paginate(15);

      return view('admin.movie-list', compact('movies'));
   }

   public function categoriesShow()
   {
      $categories = $this->moviesCategories->orderBy('id', 'ASC')->paginate(15);

      return view('admin.categories', compact('categories'));
   }

   public function destroyMovies($id)
   {
      $movies = $this->movies->find($id);

      $user = $this->user->find($id);

      if($user) {
         $user->delete();

         session()->flash('message', 'User Telah di Hapus');

      } elseif($movies) {
         $movies->delete();

         session()->flash('message', 'Movie Telah di Hapus');
      }

      return redirect()->back();
   }

   public function generatePhoto($photo, $data) 
   {
      $filename = date('YmdHis').'-'.snake_case($data['title']).".".$this->filesystem->extension($photo->getClientOriginalName());
      $path = public_path("photos/").$filename;

      $this->imageManager->make($photo->getRealPath())->save($path);

      return "/photos/".$filename;
   }

   public function store(MoviesRequest $request)
   {
      $movies = $request->except("poster");

      if($request->hasFile('poster')) {
         $movies['poster'] = $this->generatePhoto($request->file('poster'), $request->except('poster'));
      }

      $this->movies->create($movies);

      session()->flash('message', 'Movie Telah Di Tambahkan');

      return redirect('/admin/movies');
   }


   public function update($id, Request $request) {
      $movie = $this->movies->find($id);

      $users = $this->user->find($id);

      $data = $request->all();

      if($users) {
         $users->update([
            'name' => $data['name'],
            'email' => $data['email']
         ]);

         session()->flash('message', 'User Telah Di Update');

      }elseif($movie) {
         $movie->update([
            'title' => $data['title'],
            'categories_id' => $data['categories_id'],
            'year' => $data['year'],
            'poster' => $data['poster'],
            'description' => $data['description']
         ]);

         session()->flash('message', 'Movie Telah Di Update');
      }


      return redirect()->back();
   }
}
