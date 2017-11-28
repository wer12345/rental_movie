<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
<link rel="stylesheet" href="/css/bootstrap.min.css">
   <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
@if(Auth::check())
{{ Auth::user()->name}}
@else
Navbar Logo
@endif
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('movies.index') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('movies.list') }}">List Movies</a>
      </li>
      <li class="nav-item">
@if(Auth::check()) 
        <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
@else
        <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
@endif
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="px-4 my-5 row">

<div class="col-9">

@yield('content')

</div>

<div class="col-3">

@include('includes.sidebar')

</div>

</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
