@extends('layouts.default')

@section('title', $moviesPost->title)

@section('content')

<div id="post" class="text-center">
   <div class="post-poster">
      @if($moviesPost->poster)
      <img src="{{ $movies->poster }}" alt="Poster" class="poster">
      @else
      <img src="/photos/no-avatar.png" alt="Poster" class="poster">
      @endif
   </div>

   <div class="post-title">
      <h2>{{ $moviesPost->title }}</h2>
   </div>

   <div class="post-year">
      Release on: {{ $moviesPost->year }}
   </div>

   <div class="post-desc">
      <p>{{ $moviesPost->description }}</p>
   </div>

   <div class="post-btn"i>
      @if(Auth::check())        
      
      @if($movie_user == 1)
      
      <form action="{{ route('movies.kembalikan', $getPinjamData->id) }}" method="POST">
         {{ csrf_field() }}
         <input type="hidden" name="_method" value="delete">
         <button type="submit" class="btn btn-success" role="button">Kembalikan</button>
      </form>
      
      @else
      
      <form action="{{ route('movies.pinjam') }}" method="POST">
         {{ csrf_field() }}
         <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">
         <input type="hidden" name="movies_id" id="movies_id" value="{{ $moviesPost->id }}">
         <button class="btn btn-primary" type="submit">Pinjam</button>
      </form>
      
      @endif
      
      @else
      
      <a class="btn btn-primary" href="{{ route('auth.login') }}">Login</a>
      
      @endif
   </div>
</div>

@stop
