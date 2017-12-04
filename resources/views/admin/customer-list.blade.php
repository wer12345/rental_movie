@extends('layouts.admin-default')

@section('admin-content')

<div class="customer_section">

<h3 class="customer-title">Customer Lists</h3>

<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

 @foreach($customers as $customer) 
<tr>
   <th scope="row">{{ $customer->id }}</th>
   <td>{{ $customer->name }}</td>
   <td>{{ $customer->email }}</td>
<td>
<a class="btn btn-primary" href="#">Edit</a>
<form action="#" method="POST" class="d-inline">
<input type="hidden" name="_method" value="delete" />
{{ csrf_field() }}
<button type="submit" class="btn btn-danger" onclick="return confirm('Hapus {{ $customer->name }} ?')" href="#">Hapus</button>
</form>
</td>
</tr>
@endforeach
  </tbody>
</table>
{{ $customers->render() }}
</div>

@stop
