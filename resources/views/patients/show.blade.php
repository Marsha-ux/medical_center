@extends('adminlte::page')

@section('title') Show @endsection

@section('content')
     <div class="card mt-4">
      <div class="card-header">
       Patient info:
      </div>
      <div class="card-body">
       <h6 class="card-title">Name: {{$patient->name}}</h6>
       <p class="card-text">Age: {{$patient->age}}</p>
       <p class="card-text">Gender: {{$patient->gender}}</p>
      </div>
     </div>
      
     <div class="card mt-4">
      <div class="card-header">
        IP Address:
      </div>  
      <div class="card-body">
       <p class="card-title">Phone: {{$patient->phone}}</p>
       <p class="card-text">Email: {{$patient->email}}</p>
      </div>
     </div>
@endsection