@extends('layouts.admin-default')

@section('admin-content')

      <div class="row">
         <div class="col-lg-9 main-chart">

            <div class="row mtbox">
               <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  <div class="box1">
                     <span class="fa fa-desktop"></span>
                     <h3>{{ $movies->count() }}</h3>
                  </div>
                  <p>You Have {{ $movies->count() }} Movies Now!!</p>
               </div>

               <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  <div class="box1">
                     <span class="fa fa-th-list"></span>
                     <h3>{{ $categories->count() }}</h3>
                  </div>
                  <p>You Have {{ $categories->count() }} Categories Now!!</p>
               </div>

               <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  <div class="box1">
                     <span class="fa fa-users"></span>
                     <h3>{{ $user->count() }}</h3>
                  </div>
                  <p>You Have {{ $user->count() }} Cutomers Now!!</p>
               </div>
            </div>
         </div>
      </div>

@stop
