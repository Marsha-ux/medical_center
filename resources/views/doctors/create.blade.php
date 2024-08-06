@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')











<div class="col-12">
    <h1 class="my-3 text-center">create new doctor</h1>
            </div>
            <div class="col-12 mx-auto">
                <form action="{{route("doctors.store")}}" class="form border p-3" method="post">
                    @csrf
                    @include('inc.massege');
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" id="" class="form-control">

                    </div>


                    <div class="mb-3">
                    <label for=""> specialization</label>
                    <select  name="specialization_id" class="form-control" >
                        @foreach ($specializations as $specialization)


                        <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                        @endforeach

                    </select>
                </div>

                    <div class="mb-3">

                        <input type="submit" value="save" name="submit" id="" class="form-control bg-success text-white">

                    </div>
                </form>
               </div>






@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop


