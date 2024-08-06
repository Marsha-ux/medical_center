
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

@section('content')



<div class="col-12">

            <a href="{{route("specializations.create")}}" class="btn btn-primary my-3">Add New specialization</a>

        <h1 class="p-3 border text-center my-3">All specializations</h1>
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




      </tr>



   </thead>
   <tbody>
  @foreach ($Specializations as $specialization)



    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$specialization->name}}</td>

    </tr>
   </tbody>
   @endforeach
  </table>


<div>
    {{$Specializations->links()}}
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









