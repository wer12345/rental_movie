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
                     <a data-toggle="modal" data-target="#update{{ $customer->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="update{{ $customer->id }}" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title">Update Customer</h4>
                              </div>
                              <form action="{{ route('admin.update', $customer->id) }}" method="POST">
                                 <div class="modal-body">
                                    <input type="hidden" name="_method" value="put">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                       <label for="name">Name</label>
                                       <input type="text" name="name" class="form-control" id="name" placeholder="Enter Movie Title" value="{{ $customer->name }}">
                                    </div>

                                    <div class="form-group">
                                       <label for="email">Email</label>
                                       <input type="email" name="email" class="form-control" id="email" placeholder="Enter Movie Title" value="{{ $customer->email }}">
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
