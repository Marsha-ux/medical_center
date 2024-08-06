<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{ public $timestamps=false;
    use HasFactory;
protected $fillable=[
    "reservation_id","medicine",	"ill","analysis"
];
    public function reservation(){
        return $this->belongsto(reservation::class);
    }
}
