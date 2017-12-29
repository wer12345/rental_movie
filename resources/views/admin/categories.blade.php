@extends('layouts.admin-default')

@section('admin-content')

<div class="categories_section">

   <div class="container">

      <div class="row">

         <h3 class="categories-name">Categories Lists</h3>
         <a class="btn btn-primary ml-auto" href="{{ route('admin.add') }}">Tambah</a>

      </div>

   </div>

   <table class="table table-hover mt-2 text-center">
      <thead class="thead-dark">
         <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
         </tr>
      </thead>
      <tbody>

         @php ($no = 1)

         @foreach($categories as $categories) 
         <tr>
            <th scope="row">{{ $no++ }}</th>
            <th scope="row">{{ $categories->name }}</th>
            <td>
               <a class="btn btn-primary" href="#">Edit</a>
               <form action="#" method="POST" class="d-inline">
                  <input type="hidden" name="_method" value="delete" />
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus {{ $categories->name }} ?')">Hapus</button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>

   <div class="text-center">
   </div>
</div>

@stop
