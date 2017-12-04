@extends('layouts.admin-default')

@section('title', 'Update Movie')

@section('admin-content')

<form action="{{ route('admin.update', $movies->id) }}" method="POST" enctype="multipart/form-data">

<input type="hidden" name="_method" value="put">
{{ csrf_field() }}

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Movie Title" value="{{ $movies->title }}">
</div>

<div class="form-group">
  <label for="categories_id">Select Categories:</label>
      <select class="form-control" id="categories_id" name="categories_id">
@foreach($moviesCategories as $categories)

@if($movies->categories_id == $categories->id) 
<option value="{{ $movies->categories_id }}" selected>{{ $categories->name }}</option>
@else
<option value="{{ $categories->id }}">{{ $categories->name }}</option>
@endif

@endforeach
      </select>  
</div>

  <div class="form-group">
    <label for="year">Year of Release</label>
    <input type="text" name="year" class="form-control" id="year" placeholder="Enter When Movie Release" value="{{ $movies->year }}">
  </div>

<div class="form-group">
    <label for="poster">Movie Poster</label>
    <input type="file" name="poster" class="form-control" id="poster" placeholder="Enter When Movie Release" value="{{ $movies->poster }}">
  </div>

<div class="form-group">
    <label for="description">Movie Description</label>
  <textarea id="description" name="description" cols="30" rows="10">{{ $movies->description }}</textarea>
</div>
  
  <button type="submit" class="btn btn-primary">Update Movie</button>
</form>

@stop
