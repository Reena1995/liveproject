<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLocationHistorie extends Model
{
    use HasFactory;

    public function companyLocation()
    {
            return $this->hasOne(CompanyLocation::class,'id','company_location_id');
    }
    public function companyLocationActive()
    {
            return $this->companyLocation()->where('is_active',1);
    }

    public function companyLocationType()
    {
            return $this->hasOne(CompanyLocationType::class,'id','company_location_type_id');
    }
    public function companyLocationTypeActive()
    {
            return $this->companyLocationType()->where('is_active',1);
    }
}
