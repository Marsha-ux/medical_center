<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    protected $fillable=[
'name','email','specialization_id'
    ];
    public function Reservations(){
        return $this->hasmany(reservation::class);
   }
}
