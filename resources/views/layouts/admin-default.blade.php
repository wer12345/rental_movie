<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/style.css">
      <title>Admin Panel</title>
   </head>
   <body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
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
               </ul>

            </div>
         </div>
      </nav>

      <div class="row mt-5 px-4">
         <div class="col-2">

            @include('includes.admin-sidebar')

         </div>

         <div class="col-10">

            @if(Session::get('message'))
            <div class="alert alert-block alert-info alert-dismissible fade show" role="alert">
               {{ Session::get('message') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            @endif

            @yield('admin-content')

         </div>
      </div>

      <script src="/js/popper.min.js"></script>   
      <script src="/js/jquery.min.js"></script>   
      <script src="/js/bootstrap.min.js"></script>   
   </body>
</html>
