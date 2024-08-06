@extends('adminlte::page')

@section('content')
<div class="alert alert-danger">
         <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
         </ul>
       </div>
   

<form action="save" method="POST">
  @csrf  
  <div class="mb-3">
  
  
  <input type ="number" name='reservation_id'class="form-control" value="" placeholder="date">
   <input type ="text" name='medicine'class="form-control" value="" placeholder="medicin">   
   <input type ="text" name='ill' class="form-control" value="" placeholder='ill'>
   <input type ="text" name='analysis' class="form-control" value="" placeholder='analysis'>
   <br><br>
   <input type ='submit' class=' btn-primary' value='add'>
</div>
</form>
@endsection