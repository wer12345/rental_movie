<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MoviesRequest;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\ImageManager;
use App\User;
use App\Movies;
use App\MoviesCategories;
use App\Http\Controller\DB;

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
      return view('admin.admin-index');
   }

   public function customerShow()
   {
      $customers = $this->user->orderBy('id', 'ASC')->paginate(15);

      return view('admin.customer-list', compact('customers'));
   }

   public function movieShow()
   {
      $movies = $this->movies->with('moviesCategories')->orderBy('id', 'ASC')->paginate(15);

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

      if($movies) {
         $movies->delete();
      }

      session()->flash('message', 'Movie Telah di Hapus');
      return redirect()->back();
   }

   public function add()
   {
      $movieCategories = $this->moviesCategories->all();

      return view('admin.create', compact('movieCategories'));
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

   public function edit($id)
   {
      $movies = $this->movies->find($id);

      $moviesCategories = $this->moviesCategories->all();

      return view('admin.update', compact('movies', 'moviesCategories'));
   }

   public function update($id, MoviesRequest $request)
   {
      $moviesForm = $request->except('poster');

      if($request->hasFile('poster')) {
         $moviesForm['poster'] = $this->generatePhoto($request->file('poster'), $moviesForm);
      }

      $movies = $this->movies->find($id);

      if($movies) {
         $movies->update($moviesForm);
      }

      session()->flash('message', 'Movie Telah Di Update');

      return redirect('/admin/movies');
   }

   public function pinjam()
   {
      $movies =  DB::select('select * from movie_user where movies_id = ?' , [3]);

      dd($movies);

      return view('movies.list-movies');
   }
}
