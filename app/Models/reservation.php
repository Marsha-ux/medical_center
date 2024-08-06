<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    public $timestamps=false;
   protected $fillable =[
    'patient_id','doctor_id','date','time'
   ];
   public  function Patient(){
    return $this->belongsto(patient::class);
   }
   public function doctor(){
    return $this->belongsto(doctor::class);
   }
   public function status(){
    return $this->hasone(status::class);
   }
}
