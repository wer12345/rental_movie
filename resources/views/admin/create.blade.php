@extends('layouts.admin-default')

@section('title', 'Tambah Movie')

@section('admin-content')

<form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">

{{ csrf_field() }}

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Movie Title">
  </div>

  <div class="form-group">
  <label for="categories_id">Select Categories:</label>
      <select class="form-control" id="categories_id" name="categories_id">
<option value="">Choose Categories</option>
@foreach($movieCategories as $movie)
<option value="{{ $movie->id }}">{{ $movie->name }}</option>
@endforeach
      </select>  
</div>

<div class="form-group">
    <label for="year">Year of Release</label>
    <input type="text" name="year" class="form-control" id="year" placeholder="Enter When Movie Release">
  </div>

<div class="form-group">
    <label for="poster">Movie Poster</label>
    <input type="file" name="poster" class="form-control" id="poster" placeholder="Enter When Movie Release">
  </div>

<div class="form-group">
    <label for="description">Movie Description</label>
  <textarea class="form-control" id="description" name="description" cols="30" rows="10"></textarea>
</div>
  
  <button type="submit" class="btn btn-primary">Add Movie</button>
</form>

@stop
