@extends('layouts.default');

@section('title', 'Home')

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Poster.</th>
      <th scope="col">Title</th>
      <th scope="col">Year of Release</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
@foreach($movie as $movies)
<tr>
   <td>{{ $movies->id }}</td>
   <td>{{ $movies->poster }}</td>
   <td>{{ $movies->title }}</td>
   <td>{{ $movies->year }}</td>
   <td>{{ $movies->description }}</td>
</tr>
@endforeach
  </tbody>
</table>


@stop
