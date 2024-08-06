<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
       
    ];

    protected $casts = [
        'name' => 'string',
        
    ];
    public function doctors()
    {
        return $this->hasMany(doctor::class);
    }
}
