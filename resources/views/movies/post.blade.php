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

<div class="post-btn">
<button class="btn btn-primary">Pinjam</button>
</div>
</div>

@stop
