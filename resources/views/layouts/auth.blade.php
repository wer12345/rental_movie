<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
<link rel="stylesheet" href="/css/bootstrap.min.css">
   <title>@yield('title')</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
<div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('movies.index') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Register</a>
      </li>
      <li class="nav-item">
      </li>
    </ul>
  </div>
</div>
</nav>

<div class="row mt-5">
<div class="col-4"></div>
<div class="col-4">

@yield('content')

</div>
<div class="col-4"></div>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
