<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpEducationDetail extends Model
{
    use HasFactory;

   

    public function educationLevel(Type $var = null)
    {
        return $this->hasMany(Designation::class,'id','designation_id');
    }
}
