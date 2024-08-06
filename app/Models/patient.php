<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'name','email','phone','gender','age'
    ];
    public function Reservations(){
         return $this->hasmany(reservation::class);
    }
}
