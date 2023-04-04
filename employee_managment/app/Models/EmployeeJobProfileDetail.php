<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeJobProfileDetail extends Model
{
    use HasFactory;

    public function department()
      {
              return $this->hasOne(Department::class,'id','department_id');
      }
      public function departmentActive()
      {
              return $this->department()->where('is_active',1);
      }

      public function designation()
      {
              return $this->hasOne(Designation::class,'id','designation_id');
      }
      public function designationActive()
      {
              return $this->designation()->where('is_active',1);
      }

      public function organizationRole()
      {
              return $this->hasOne(OrganizationRole::class,'id','organization_role_id');
      }
      public function organizationRoleActive()
      {
              return $this->organizationRole()->where('is_active',1);
      }
}
