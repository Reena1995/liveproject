<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\EmployeePersonalDetail;
use App\Models\User;
use App\Models\CurrentResidenceType;
use App\Models\ModeOfTransportation;
use App\Models\Country;
use App\Models\EmpEducationDetail;
use App\Models\State;
use App\Models\City;
use App\Models\EducationLevel;
use App\Models\MediumOfInstruction;
use App\Models\DocumentType;
use App\Models\EmpDocumentDetail;
use App\Models\EmployeeJobProfileDetail;
use App\Models\OrganizationRole;
use App\Models\Designation;
use App\Models\Department;
use App\Models\EmpBankDetail;
use App\Models\EmpEmploymentDetail;
use App\Models\CompanyLocation;
use App\Models\CompanyLocationType;
use App\Models\EmployeeLocationHistorie;
use App\Models\EmpAssetDetail;
use App\Models\AssetBrand;
use App\Models\AssetSubType;
use App\Models\EmpLangDetail;
use App\Models\Language;
use App\Models\EmpProfessionalTrainingDetail;
use App\Models\EmpWorkExperienceDetail;
use App\Models\EmpEmergencyContact;
use App\Models\EmpFamilyDetail;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
use Str;
use Log;
use Auth;
use Session;
use Validate;


class UserController extends Controller
{
  

    public function index(Request $request)
    {
     
        $current_residency = CurrentResidenceType::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $mode_transportation = ModeOfTransportation::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $country = Country::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $state = State::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $city = City::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $personal_detail = EmployeePersonalDetail::where('user_id',auth()->user()->id)->first();
     

        return view('employee.modules.employee.viewemployee',compact('personal_detail','current_residency','mode_transportation','country','state','city'));
       
    }
}
