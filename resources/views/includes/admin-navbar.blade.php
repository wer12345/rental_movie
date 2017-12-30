<header class="header black-bg">
   <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
   </div>
   <!--Logo start-->
   <a class="logo" href="{{ route('admin.index') }}"><b>ADMIN AREA</b></a>
   <!--logo end-->
   <div class="top-menu">
      <ul class="nav pull-right top-menu">
         <li><a class="logout" href="{{ route('movies.index') }}">Home Page</a></li>
         <li><a class="logout" href="{{ route('auth.logout') }}">Logout</a></li>
      </ul>
   </div>
</header>
<!--header end-->
