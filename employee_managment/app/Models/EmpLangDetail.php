<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpLangDetail extends Model
{
    use HasFactory;
    public function languageName()
    {
      return $this->hasOne('App\Models\Language','id','language_id');
    }
}
