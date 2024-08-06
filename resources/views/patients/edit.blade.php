@extends('adminlte::page')
@section('title') Edit @endsection

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

<form action="{{route('patients.update', $patient['id'])}}" method="POST">
  @csrf
  @method('PUT')	
  <div class="mb-3">
   <input type="text" name="name" class="form-control" value="{{$patient->name}}" placeholder="Name">
   <input type="text" name="phone" class="form-control" value="{{$patient->phone}}" placeholder="Phone">
   <input type="text" name="age" class="form-control" value="{{$patient->age}}" placeholder="Age">   
   <input type="text" name="email" class="form-control" value="{{$patient->email}}" placeholder="Email">
   <select  name="gender" class="form-control" >
    <option value="female"{{ ($patient->gender=="female")?'selected':''}}>female</option>
    <option value="male"{{ ($patient->gender=="male")?'selected':''}}>male</option>
  </div>

  <input type='submit' class="btn btn-primary" value="update"/>
</form>

@endsection