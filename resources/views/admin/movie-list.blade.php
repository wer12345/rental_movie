@extends('layouts.admin-default')

@section('title', 'Movie List')

@section('admin-content')

<div class="movie_section">

<div class="container">

<div class="row">

<h3 class="movie-title">Movies Lists</h3>
<a class="btn btn-primary ml-auto" href="{{ route('admin.add') }}">Tambah</a>

</div>

</div>

<table class="table table-hover mt-2 text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Poster</th>
      <th scope="col">title</th>
      <th scope="col">Categories</th>
      <th scope="col">Release</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

 @foreach($movies as $movie) 
<tr>
   <th scope="row">{{ $movie->id }}</th>
<td>
@if($movie->poster)
<img src="{{ $movie->poster }}" alt="Poster" class="admin-poster">
@else
<img src="/photos/no-avatar.png" alt="Poster" class="admin-poster">
@endif
</td>
   <td>{{ $movie->title }}</td>
   <td>{{ $movie->moviesCategories->name }}</td>
   <td>{{ $movie->year }}</td>
   <td>{{ $movie->description }}</td>
<td>
<a class="btn btn-primary" href="{{ route('admin.edit', $movie->id) }}">Edit</a>
<form action="{{ route('admin-movdel', $movie->id) }}" method="POST" class="d-inline">
<input type="hidden" name="_method" value="delete" />
{{ csrf_field() }}
<button type="submit" class="btn btn-danger" onclick="return confirm('Hapus {{ $movie->name }} ?')">Hapus</button>
</form>
</td>
</tr>
@endforeach
  </tbody>
</table>

<div class="text-center">
{{ $movies->render() }}
</div>
</div>


@stop
