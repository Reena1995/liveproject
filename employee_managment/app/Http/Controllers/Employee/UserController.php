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
        $authuser=auth()->user();

        //personaldetails
        $current_residency = CurrentResidenceType::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $mode_transportation = ModeOfTransportation::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $country = Country::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $state = State::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $city = City::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $personal_detail = EmployeePersonalDetail::where('user_id',$authuser->id)->first();

        //education 
        $medium = MediumOfInstruction::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $educationlevel = EducationLevel::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $educationDetails = EmpEducationDetail::where('user_id',$authuser->id)->where('is_active',1)->get();
        $emp_education_detail = EmpEducationDetail::where('user_id',$authuser->id)->first();

        //emp document
        $document = DocumentType::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $emp_document_detail = EmpDocumentDetail::where('user_id',$authuser->id)->first();
        $empDocumentDetails = EmpDocumentDetail::where('user_id',$authuser->id)->where('is_active',1)->get();

        //langauge
        $langauge = Language::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $emp_language_detail = EmpLangDetail::where('user_id',$authuser->id)->first();
        $emp_languages = EmpLangDetail::where('user_id',$authuser->id)->where('is_active',1)->get();

         //job profile
         $emp_job_profile = EmployeeJobProfileDetail::where('user_id',$authuser->id)->first();
       

        //bank
         $emp_bank_profile = EmpBankDetail::where('user_id',$authuser->id)->first();

        //employemnt details
        $employment_detail = EmpEmploymentDetail::where('user_id',$authuser->id)->first();

         //location details
         $emp_location_details = EmployeeLocationHistorie::where('user_id',$authuser->id)->first();

         //asset details 
        $emp_asset_details = EmpAssetDetail::where('user_id',$authuser->id)->where('is_active',1)->get();
        $asset_brand = AssetBrand::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $asset_sub_type = AssetSubType::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $empasset_detail = EmpAssetDetail::where('user_id',$authuser->id)->first();
      
         //professional training 
         $emp_professional_details = EmpProfessionalTrainingDetail::where('user_id',$authuser->id)->where('is_active',1)->get();

        //work experience
        $emp_work_exp_details = EmpWorkExperienceDetail::where('user_id',$authuser->id)->where('is_active',1)->get();

        //family_details
        $family_details = EmpFamilyDetail::where('user_id',$authuser->id)->where('is_active',1)->get();

        //emergency contact
        $emergency_details = EmpEmergencyContact::where('user_id',$authuser->id)->where('is_active',1)->get();

        return view('employee.modules.employee.viewemployee',compact('personal_detail','current_residency','mode_transportation','country','state','city',
        'educationDetails','medium','educationlevel','empDocumentDetails','document','emp_education_detail','emp_document_detail',
        'langauge','emp_language_detail','emp_languages','emp_job_profile','emp_bank_profile','employment_detail','emp_location_details',
        'emp_asset_details','asset_brand','asset_sub_type','empasset_detail','emp_professional_details','emp_work_exp_details','family_details','emergency_details'));
       
    }
}
