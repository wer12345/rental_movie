@extends('layouts.admin-default')

@section('admin-content')

<div class="row mt">
   <div class="col-md-12">
      <div class="content-panel">
         <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-right"> Customer Lists</i></h4>
            <hr>
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>

               @php ($no = 1)

               @foreach($customers as $customer)
               <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $customer->name }}</td>
                  <td>{{ $customer->email }}</td>

                  @if($customer->role == "admin")
                  <td><span class="label label-primary">{{ strtoupper($customer->role) }}</span></td>
                  <td></td>

                  @else
                  <td><span class="label label-default">{{ strtoupper($customer->role) }}</span></td>
                  <td>
                     <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                     <form action="{{ route('admin-delete', $customer->id) }}" method="POST" class="d-inline">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                        <button type="submit" onclick="return confirm('You want to Delete This User ?')"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                     </form>
                  </td>

                  @endif

               </tr>
               @endforeach
            </tbody>
         </table>
         <div class="pull-right">
            {{ $customers->render() }}
         </div>
      </div>
   </div>
</div>

@stop
