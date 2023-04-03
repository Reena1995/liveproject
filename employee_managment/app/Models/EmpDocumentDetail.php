<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpDocumentDetail extends Model
{
    use HasFactory;

    public function documentName()
    {
      return $this->belongsTo('App\Models\DocumentType','document_type_id','id');
    }
}
