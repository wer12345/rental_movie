@extends('layouts.default')

@section('title', 'List Movies')

@section('content')

{{ $tableMovies->where('categories_id', '3')->count() }}

<ul>
   @foreach($tableMovies as $movies)
<li>{{ $movies->title }}</li>
@endforeach
</ul>

@stop
