@extends('layouts.admin-default')

@section('admin-content')


<div class="row mt">
   <div class="col-md-12">
      <div class="content-panel">
         <table class="table table-striped table-advance table-hover">
            <h4 class="d-inline"><i class="fa fa-angle-right"> Movie Lists</i></h4>
            <a data-toggle="modal" href="#createModal" class="pull-right"><i class="fa fa-plus-circle btn-create"></i></a>

            <hr>
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Title</th>
                  <th>Categories</th>
                  <th>Releas Year</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>

               @php ($no = 1)

               @foreach($movies as $movie)
               <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $movie->title}}</td>
                  <td>{{ $movie->moviesCategories->name }}</td>
                  <td>{{ $movie->year }}</td>
                  <td>
                     <a data-target="#update{{ $movie->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>

                     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="update{{ $movie->id }}" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title">Update Movie</h4>
                              </div>
                              <form action="{{ route('admin.update', $movie->id) }}" method="POST">
                                 <div class="modal-body">
                                    <input type="hidden" name="_method" value="put">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                       <label for="title">Title</label>
                                       <input type="text" name="title" class="form-control" id="title" placeholder="Enter Movie Title" value="{{ $movie->title }}">
                                    </div>

                                    <div class="form-group">
                                       <label for="categories_id">Select Categories:</label>
                                       <select class="form-control" id="categories_id" name="categories_id">

                                          @if($movie->categories_id == $movie->moviesCategories->id) 
                                          <option value="{{ $movie->categories_id }}" selected>{{ $movie->moviesCategories->name }}</option>
                                          @else
                                          <option value="{{ $movie->moviesCategories->id }}">{{ $movie->moviesCategories->name }}</option>
                                          @endif

                                       </select>  
                                    </div>

                                    <div class="form-group">
                                       <label for="year">Year of Release</label>
                                       <input type="text" name="year" class="form-control" id="year" placeholder="Enter When Movie Release" value="{{ $movie->year }}">
                                    </div>

                                    <div class="form-group">
                                       <label for="poster">Movie Poster</label>
                                       <input type="file" name="poster" class="form-control" id="poster" placeholder="Enter When Movie Release" value="{{ $movie->poster }}">
                                    </div>

                                    <div class="form-group">
                                       <label for="description">Movie Description</label>
                                       <textarea class="form-control" id="description" name="description" cols="30" rows="5">{{ $movie->description }}</textarea>
                                    </div>

                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>

                                    <button class="btn btn-theme" type="submit">Update</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>

                     <form action="{{ route('admin-delete', $movie->id) }}" method="POST" class="d-inline">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('You sure want to Delete This Movies ?')"><i class="fa fa-trash-o"></i></button>
                     </form>
                  </td>

               </tr>
               @endforeach
            </tbody>
         </table>
         <div class="pull-right">
            {{ $movies->render() }}
         </div>
      </div>
   </div>
</div>

<!--create modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="createModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add New Movies!!</h4>
         </div>
         <div class="modal-body">
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">

               {{ csrf_field() }}

               <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter Movie Title">
               </div>

               <div class="form-group">
                  <label for="categories_id">Select Categories:</label>
                  <select class="form-control" id="categories_id" name="categories_id">
                     <option value="">Choose Categories</option>
                     @foreach($movies as $movie)
                     <option value="{{ $movie->moviesCategories->id }}">{{ $movie->moviesCategories->name }}</option>
                     @endforeach
                  </select>  
               </div>

               <div class="form-group">
                  <label for="year">Year of Release</label>
                  <input type="text" name="year" class="form-control" id="year" placeholder="Enter When Movie Release">
               </div>

               <div class="form-group">
                  <label for="poster">Movie Poster</label>
                  <input type="file" name="poster" class="form-control" id="poster" placeholder="Enter When Movie Release">
               </div>

               <div class="form-group">
                  <label for="description">Movie Description</label>
                  <textarea class="form-control" id="description" name="description" cols="30" rows="5"></textarea>
               </div>

            </div>
            <div class="modal-footer">
               <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
               <button class="btn btn-theme" type="submit">Add</button>
            </div>
         </form>
      </div>
   </div>
</div>

@stop
