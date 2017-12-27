<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
   protected $fillable = ['title', 'categories_id', 'year', 'description', 'poster'];

   public function moviesCategories()
   {
   return $this->belongsTo(\App\MoviesCategories::class, 'categories_id');
   }


}
