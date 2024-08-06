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
   < <select name="patient_id" class="form-control" value="" >
   @foreach($patients as $patient)
            <option value="{{ $patient->id }}"> {{ $patient->name }}</option>
        @endforeach
    </select><br /><br />
   <select name="doctor_id" class="form-control" value="">
   @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}"> {{ $doctor->name }}</option>
        @endforeach
    </select><br /><br />
   <input type ="date" name='date'class="form-control" value="" placeholder="date">   
   <input type ="text" name='time' class="form-control" value="" placeholder=time>
   <br><br>
   <input type ='submit' class=' btn-primary' value='add'>
</div>
</form>
@endsection