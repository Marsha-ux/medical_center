












@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


@section('content')





<div class="col-12">
    <a href="{{route("doctors.create")}}" class="btn btn-primary my-3">Add New doctor</a>
<h1 class="p-3 border text-center my-3">All doctors</h1>
</div>

@include('inc.massege')
<div class="col-12">

<div class="card">
<div class="card-header">

</div>
<table class="table table-borderd">
<thead>
<tr>
 <th>#</th>
 <th>Name</th>
 <th>Email</th>
 <th>specialization</th>
 <th>Edit</th>
 <th>Delete</th>




</tr>



</thead>
<tbody>
@foreach ($doctors as $doctor)



<tr>
<td>{{$loop->iteration}}</td>
<td>{{$doctor->name}}</td>
<td>{{$doctor->email}}</td>
<td>{{$doctor->specialization->name}}</td>


<td><a href="{{ route("doctors.edit",$doctor->id)}}" class="btn btn-info">Edit</a></td>

<td>
    <form  action="{{route("doctors.destroy",$doctor->id)}}" method="get">
        @csrf

        <input type="submit" value="Delete" class="btn btn-danger">


    </form>

</td>
</tr>
</tbody>
@endforeach
</table>


<div>
{{$doctors->links()}}
</div>


</div>

@endsection

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop











