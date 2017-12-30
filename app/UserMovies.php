<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMovies extends Model
{
   protected $table = "movie_user";

   protected $fillable = ['user_id', 'movies_id'];

   public function UserMovies()
   {
   return $this->belongsTo(\App\Movies::class, 'user_id');
   return $this->belongsTo(\App\Users::class, 'movies_id');
   }

}
