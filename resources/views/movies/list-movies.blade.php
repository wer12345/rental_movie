@extends('layouts.default')

@section('title', 'List Movies')

@section('content')

<ul>
   @foreach($tableMovies as $movies)
<li>{{ $movies->title }}</li>
@endforeach
</ul>

@stop
