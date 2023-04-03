<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetSubType extends Model
{
    use HasFactory;

       /* ORM */ 
       public function ass_type()
       {
               return $this->hasOne(AssetType::class,'id','asset_type_id');
       }
       public function ass_type_active()
       {
               return $this->ass_type()->where('is_active',1);
       }
       /* ORM end */ 

   
}
