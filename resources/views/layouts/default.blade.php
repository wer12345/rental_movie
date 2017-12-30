<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/style.css">
      <title>@yield('title')</title>
   </head>
   <body>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info">
         <div class="container">
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
                  @if(Auth::check()) 
                  @if(Auth::user()->role == "admin")
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('admin.index') }}">Admin Panel</a>
                  </li>
                  @endif                  
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('movies.list') }}">List Movies</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
                  </li>
                  @else
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                  </li>
                  @endif
               </ul>
               <form class="form-inline my-2 my-lg-0" action="{{ route('movies.search') }}" method="GET">
                  <input class="form-control mr-sm-2" name="keyword" type="text" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
               </form>
            </div>
         </div>
      </nav>

      <div class="px-4 row homepage">

         <div class="col-9">

            @if(Session::get('message'))
            <div class="alert alert-block alert-info alert-dismissible fade show" role="alert">
               {{ Session::get('message') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            @endif

            <section id="main-content">
               <section class="wrapper">
                  @yield('content')
               </section>
            </section>

         </div>

         <div class="col-3">

            @include('includes.sidebar')

         </div>

      </div>

      <script src="/js/popper.min.js"></script>
      <script src="/js/jquery.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
   </body>
</html>
