@extends('layouts.default');

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
@foreach($tableMovie as $movies)
<div class="col-4 text-center">
<div class="poster_section">
@if($movies->poster)
<img src="{{ $movies->poster }}" alt="Poster" class="poster">
@else
<img src="/photos/no-avatar.png" alt="Poster" class="poster">
@endif
</div>
<div class="title_section">
<a class="title" href="{{ route('movies.post', $movies->id) }}"><h4>{{ $movies->title }}</h4></a>
</div>
</div>
@endforeach
</div>
<div class="text-center mt-3">
{{ $tableMovie->render() }}
</div>
@stop
