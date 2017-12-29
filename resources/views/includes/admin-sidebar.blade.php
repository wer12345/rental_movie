<aside>
<div id="sidebar" class="nav-collapse">
   <!--sidebar menu start-->
   <ul id="nav-accordion" class="sidebar-menu">

      <p class="centered"><img src="/img/ui-sam.jpg" alt="Profile" class="img-circle" width="60"></p>
      <h5 class="centered">{{ Auth::user()->name }}</h5>

      <li class="mt">
         <a href="{{ route('admin.index') }}">
            <i class="fa fa-dashboard">
               <span>Dashboard</span>
            </i>
         </a>
      </li>

      <li class="sub-menu">
         <a href="{{ route('admin.movies') }}">
            <i class="fa fa-desktop">
               <span>Movie List</span>
            </i>
         </a>
      </li>

      <li class="sub-menu">
         <a href="{{ route('admin.customer') }}">
            <i class="fa fa-users">
               <span>User List</span>
            </i>
         </a>
      </li>

      <li class="sub-menu">
         <a href="{{ route('admin.categories') }}">
            <i class="fa fa-th-list">
               <span>Category List</span>
            </i>
         </a>
      </li>

   </ul>
</div>
</aside>
