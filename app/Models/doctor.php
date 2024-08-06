<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\specialization;

class doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'specialization_id'
    ];



    public function specialization()
    {
        return $this->belongsTo(specialization::class);
    }
    public function  rates()
    {
        return $this->hasMany(rate::class);
    }

    public function getRate()
    {
     $total=0;
     if($this->rates->isEmpty()){
      return 0;

     }

     foreach ($this->rates as $rate)
 {
     $total=$total+$rate->rate;}
     $avarege= $total/$this->rates->count();
     return $avarege;
    }
}
