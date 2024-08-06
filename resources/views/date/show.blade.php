@extends('adminlte::page')

@section('content')
<div class="alert alert-danger">
         <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
         </ul>
       </div>
    

<header>

</header>
<body>


<div class="container">
  
<form class="row g-3"  action='date/search'>


  <div class="col-auto">
   <label for="staticEmail2" class="visually-hidden">doctor name</label>
    <input type="text" name="doctor"  class="form-control" value="Enter to search">
  </div>
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">date</label>
    <input type="date"  name="date" class="form-control" id="inputPassword2" placeholder="doctor_name">
  </div>
  <div class="col-auto">
    <input type='submit' class="btn btn-primary mb-3" aria-label="Search" value='Search'/>
  </div>
  <div class="col-auto">
 <a href="{{url('date/add1')}}"  class="btn btn-primary" >add</a>
  </div>

</form>
  



</div>


<table class="table table-striped table-hover">

  <thead class="table-light">
    <tr>
      <th scope="col">patient</th>
      <th scope="col">doctor</th>
      <th scope="col">date</th>
      <th scope="col">time</th>
      <th scope="col"></th>
      <th scope="col">operation</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($reservations as $res)
    <tr>
    <td> {{$res->patient->name}}</td>
    <td>{{$res->doctor->name}}</td>
    <td>{{$res->date}}</td>
    <td>{{$res->time}}</td>
    <td><a href="{{url('date/edit1/'.$res->id)}}"  class="btn btn-primary" >edit</a></td>
 
    <td><a href="{{url('date/delete/'.$res->id)}}"  class="btn btn-danger" >delete</a></td>
@endforeach
</tbody>
</div>
</body>
@if(session('success'))
    <div class="alert.alert-success">
</div>
@endif
@endsection