@extends('layouts.default')

@section('title', 'Home')

@section('content')

@if(Session::get('login-req_message'))
<div class="alert alert-block alert-warning alert-dismissible fade show" role="alert">
{{ Session::get('login-req_message') }}<strong><a href="{{ route('auth.login') }}">Login Here</a></strong>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="row">
@foreach($movies as $movie)
<div class="col-4 text-center">
<div class="poster_section">
@if($movie->poster)
<img src="{{ $movie->poster }}" alt="Poster" class="poster">
@else
<img src="/photos/no-avatar.png" alt="Poster" class="poster">
@endif
</div>
<div class="title_section">
<a class="title" href="{{ route('movies.post', $movie->id) }}"><h4>{{ $movie->title }}</h4></a>
</div>
</div>
@endforeach
</div>
<div class="text-center mt-3">
{{ $movies->render() }}
</div>
@stop
