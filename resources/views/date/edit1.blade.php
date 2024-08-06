@extends('adminlte::page')

@section('content')
<div class="alert alert-danger">
         <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
         </ul>
       </div>
   

<form action="{{url('date/update/'.$reservation->id)}}" method="POST">
  @csrf  
  @method('PUT')
  <div class="mb-3">
   <select  name="doctor_id" class="form-control" >
   @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}"{{ ($doctor->id==$reservation->doctor_id)?'selected':''}}> {{ $doctor->name }}</option>
        @endforeach
</select>
   <select name="patient_id" class="form-control"  placeholder="patient">
   @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ ($patient->id==$reservation->patient_id)?'selected':''}}> {{ $patient->name }}</option>
        @endforeach
    </select>
   <input  type='date' name="date" value="{{$reservation->date}}" class="form-control"  placeholder="date">   
   <input  type="text"name="time"   value="{{$reservation->time}}" class="form-control"  placeholder="time">
   
  
   <input type ="submit" value='edit'/>
  </div>



@endsection