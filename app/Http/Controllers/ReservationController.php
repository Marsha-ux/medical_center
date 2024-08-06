<?php

namespace App\Http\Controllers;
use App\Models\patient;
use App\Models\doctor;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('date.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {$patient=patient::all();
     $doctor=doctor::all();
        return view('date.add1',['patients'=>$patient,'doctors'=>$doctor]);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated=$request->validate([
            'date'=>'date_format:Y-m-d',
            'time'=>'required',
            'patient_id'=>'required',
            'doctor_id'=>'required'
           
        ]);
        
        $v=reservation::where('doctor_id',$request->doctor_id)->where('date',$request->date)->where('time',$request->time)->get();
if(count($v)==0){
    if($this->validattime($request)){
       $data=[
            'patient_id'=>$request->patient_id,
            'doctor_id'=>$request->doctor_id,
            'date'=>$request->date,
            'time'=>$request->time
        ];
      
    
       $res= reservation::create($data);
       if($res){return redirect('/date');}
       else redirect()->back();}
       else dd('wrong time format');}
       else dd('this date is taken');}
    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    { 
        $reservation=reservation::all();
        return view('date.show',["reservations"=>$reservation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    $patient=patient::all();
        $doctor=doctor::all();
        $res=reservation::FindOrFail($id);
        return view('date.edit1',['reservation'=>$res ,'patients'=>$patient,'doctors'=>$doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      
      $validated=$request->validate([
            'date'=>'required|date_format:Y-m-d',
            'time'=>'required',
            'patient_id'=>'required',
            'doctor_id'=>'required'
           
        ]);
 
      

       
     
   
  $v=reservation::where('doctor_id',$request->doctor_id)->where('date',$request->date)->where('time',$request->time)->get();
  if(count($v)==0){
    if($this->validattime($request)){
       $data=[
            'patient_id'=>$request->patient_id,
            'doctor_id'=>$request->doctor_id,
            'date'=>$request->date,
            'time'=>$request->time
        ];
      
    $reservation=reservation::findOrFail($id);
       $res= $reservation->update($data);
       if($res){return redirect('/date');}
       else redirect()->back();}
       else dd('wrong time format');}
       else dd('this date is taken');}

    
    
 

      
     
    

    /**
     * Remove the specified resource from storage.
    */
    public function destroy($id)
    {
     $res=reservation::FindOrFail($id)  ;
     $res->delete();
     return redirect('date')->with('success','reservation deleted successfully');
    }




    public function validattime(Request $request)
    {
        $parts = explode(':', $request->time);
        if(count($parts) > 2){
            return false;
        }
        $hours = $parts[0];
        $minutes = $parts[1];
        if($hours >= 0 && $hours < 24 && $minutes >= 0 && $minutes < 60 && is_numeric($hours) && is_numeric($minutes)){
            return true;
        }
        return false;}




        public function search(Request $request){
            
            $date=  $request->date;
         
            $name=  $request->doctor;
$res=reservation::whereHas('doctor',function($query) use ($name){
    
    $query->where('name','LIKE','%'.$name.'%');})->where('date',$date)->get();

  
   $res=reservation::where("date",$date)->get();
  if(count($res)>0){   
  // $res=reservation::where('doctor_id',$res)->get();
 
 
   return view('date.show',["reservations"=>$res]);}
  else dd("there  is no reservation at this date");
}
}


