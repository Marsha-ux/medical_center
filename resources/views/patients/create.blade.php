@extends('adminlte::page')
@section('title') Create @endsection

@section('content')

    @if ($errors->any())
       <div class="alert alert-danger">
         <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
         </ul>
       </div>
    @endif

<form action="{{route('patients.store')}}" method="POST">
  @csrf	
  <div class="mb-3">
   <input type="text" name="name" class="form-control" value="" placeholder="Name">
   <input type="text" name="phone" class="form-control" value="" placeholder="Phone">
   <input type="text" name="age" class="form-control" value="" placeholder="Age">   
   <input type="text" name="email" class="form-control" value="" placeholder="Email"> 
  
  </div>

  <div class="mb-3">

    <select  name="gender" class="form-control"  placeholder="Gender">
      <option value=female>female</option>
      <option value=male>male</option>
</select>
  </div>

  <input type='submit' class="btn btn-success" value='submit'></button>
</form>

@endsection