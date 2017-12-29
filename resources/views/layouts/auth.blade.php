<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet">
   <title>@yield('title')</title>
</head>
<body>

<div class="row mt-5">
<div class="col-4"></div>
<div class="col-4">

@if(Session::has('error'))
<div class="alert alert-block alert-danger alert-dismissible fade show" role="alert">
{{ Session::get('error') }} 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@elseif(Session::get('message'))
<div class="alert alert-block alert-info alert-dismissible fade show" role="alert">
{{ Session::get('message') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@yield('content')

</div>
<div class="col-4"></div>
</div>

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/img/login-bg.jpg", {speed: 500});
    </script>
</body>
</html>
