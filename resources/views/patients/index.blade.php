@extends('adminlte::page')

@section('title') index @endsection
@section('content')
<form class="d-flex" action="{{route('patients.search')}}" method="GET">
 @csrf
 <div class="align-items-center">
  <input class="form-control" type="email" id="email" name="email" aria-label="Search">
 </div>
        <button class="btn btn-outline-success" type="submit">Search</button>
</form>

 <div class ="text-center">
    <a href="{{route('patients.create')}}" class="btn btn-success">Add a Pantient</a>
 </div>
  <table class="table mt-4">
  <thead>
   <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Age</th>
    <th scope="col">Gender</th>
    <th scope="col">Actions</th>
   </tr>
  </thead>
   <tbody>
    
   @foreach ($patients as $patient)
    <!-- {{-- @dd($posts, $post) --}} -->
   <tr>
      <td>{{$patient->id}}</td>
      <td>{{$patient->name}}</td>
      <td>{{$patient->age}}</td>
      <td>{{$patient->gender}}</td>

      <td>              <!-- route name -->
         <a href="{{route('patients.show', $patient->id)}}" class="btn btn-info">View</a>
         <a href="{{route('patients.edit', $patient->id)}}" class="btn btn-primary">Edit</a>

    <form style="display: inline;" action="{{route('patients.destroy', $patient->id)}}" method="POST">
         @csrf
         @method('DELETE')   

         <button type="submit" class="btn btn-danger">Delete</button>

    </form>  
      </td>
   </tr>
   @endforeach

   </tbody>
  </table>

   @if(session('success'))
    <div class="alert alert-danger">
       {{ session('success') }}
    </div>
   @endif

   @if(session('error'))
    <div class="alert alert-danger">
       {{ session('error') }}
    </div>
   @endif

@endsection