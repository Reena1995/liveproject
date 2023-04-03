<?php

namespace App\Http\Controllers;

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
        $query = User::query();

        if($request->input('search')){
            $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        $user  = $query->where('is_active',1)->where('role_id',2)->paginate(5);
        return view('admin.modules.employee.index',compact('user'));
       
    }

   
    public function create()
    {
        return view('admin.modules.employee.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $employeeRegisterValidation= $request->validate([

            'first_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'last_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'company_mail'=>'bail|required|email|unique:users,email',
            'mobile_no'=>'bail|required|numeric|digits:10'
           
        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $user = new User;
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->company_mail;
            $user->mobile_no= $request->mobile_no;
            $pwdgenerate=(Str::random(8));
            Log::info($pwdgenerate);
            $user->password =Hash::make($pwdgenerate);
            $user->role_id = '2';
            $user->onboarding_dtls='0';
            $user->uuid = \Str::uuid();
            $user->created_by = Auth::id();
          
            $res = $user->save();

            if(!$res)
            {
                DB::rollback();

                Session::flash('danger','Internal server error please try again later.');
             
                return redirect()->back();
            }
          
            DB::commit();

            Session::flash('success','Employee create successfully');

            return redirect()->route('employee.index');
        
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:UserController function:store");
            Session::flash('danger', "Internal server error.Please try again later.");
            return redirect()->back();
        }    
        catch (\Exception $e) {
                Log::info('Error occured for user-id ' . Auth::id() . '. See log below');
                Log::info('Error Code: ' . $e->getCode());
                Log::info('Error Message: ' . $e->getMessage());
                Session::flash('danger', "Internal server error.Please try again later.");
                return redirect()->back();

        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $emp = User::where('uuid',$id)->where('role_id',2)->first();

        
        if( is_null($emp) ) {

            return view('errors.404');

        }

        //personal controller code start
        $current_residency = CurrentResidenceType::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $mode_transportation = ModeOfTransportation::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $country = Country::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $state = State::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $city = City::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $personal_detail = EmployeePersonalDetail::where('user_id',$emp->id)->first();

        //emp education 
        $emp_education_detail = EmpEducationDetail::where('user_id',$emp->id)->first();

        //emp document
        $document = DocumentType::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $emp_document_detail = EmpDocumentDetail::where('user_id',$emp->id)->first();
        $empDocumentDetails = EmpDocumentDetail::where('user_id',$emp->id)->where('is_active',1)->get();

        //langauge
        $langauge = Language::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $emp_language_detail = EmpLangDetail::where('user_id',$emp->id)->first();
        $emp_languages = EmpLangDetail::where('user_id',$emp->id)->where('is_active',1)->get();

        // dd($educationDetails);
        $medium = MediumOfInstruction::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $educationlevel = EducationLevel::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $educationDetails = EmpEducationDetail::where('user_id',$emp->id)->where('is_active',1)->get();
       
        //job profile
        $emp_job_profile = EmployeeJobProfileDetail::where('user_id',$emp->id)->first();
        $department = Department::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $designation = Designation::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $organization_role = OrganizationRole ::where('is_active', 1)->orderBy('name', 'ASC')->get();

        //bank detail
        $emp_bank_profile = EmpBankDetail::where('user_id',$emp->id)->first();
       
        //employemnt details
        $employment_detail = EmpEmploymentDetail::where('user_id',$emp->id)->first();

        //location details
        $emp_location_details = EmployeeLocationHistorie::where('user_id',$emp->id)->first();
        $company_location = CompanyLocation::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $company_location_type = CompanyLocationType::where('is_active', 1)->orderBy('type', 'ASC')->get();

        //asset details 
        $emp_asset_details = EmpAssetDetail::where('user_id',$emp->id)->where('is_active',1)->get();
        $asset_brand = AssetBrand::where('is_active', 1)->orderBy('name', 'ASC')->get();
        $asset_sub_type = AssetSubType::where('is_active', 1)->orderBy('type', 'ASC')->get();
        $empasset_detail = EmpAssetDetail::where('user_id',$emp->id)->first();
       
        //professional training 
        $emp_professional_details = EmpProfessionalTrainingDetail::where('user_id',$emp->id)->where('is_active',1)->get();
      
        //work experience
        $emp_work_exp_details = EmpWorkExperienceDetail::where('user_id',$emp->id)->where('is_active',1)->get();
       
        //family_details
        $family_details = EmpFamilyDetail::where('user_id',$emp->id)->where('is_active',1)->get();

        //emergency contact
        $emergency_details = EmpEmergencyContact::where('user_id',$emp->id)->where('is_active',1)->get();


        return view('admin.modules.employee.edit',compact('emp','current_residency','mode_transportation', 'educationDetails','country','personal_detail',
        'medium','educationlevel','empDocumentDetails','emp_education_detail',
        'emp_job_profile','department','designation','organization_role','emp_bank_profile',
        'employment_detail','company_location','company_location_type','emp_location_details',
        'emp_asset_details','asset_brand','asset_sub_type','emp_language_detail','emp_document_detail',
        'langauge','empasset_detail','emp_professional_details','emp_work_exp_details','family_details',
        'emergency_details','emp_languages','document','state','city'));
    }

    public function getState(Request $request)
    {
		$data['states']=State::where("country_id",$request->cid)->orderBy('name', 'ASC')->get();
        
        return response()->json($data);	
    }

    public function getCity(Request $request)
    {
		$data['cities']=City::where("state_id",$request->sid)->orderBy('name', 'ASC')->get();
        
        return response()->json($data);	
    }
    
    public function status($id)
    {
      
        try{

            DB::beginTransaction();
            $employee = User::where('uuid',$id)->where('role_id',2)->where('is_active',1)->first();
            if( is_null($employee) ) {

                return view('errors.404');
            
            }
        
            $employee->is_active = 0;
            $employee->updated_by = Auth::id();
            $res = $employee->update();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
                
                return redirect()->back();
            }
            
            DB::commit();
            Session::flash('success','employee delete successfully');
            return redirect()->back();
        
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:UserController function:delete");
            Session::flash('danger', "Internal server error.Please try again later.");
            return redirect()->back();

        } catch (\Exception $e) {
                Log::info('Error occured for user-id ' . Auth::id() . '. See log below');
                Log::info('Error Code: ' . $e->getCode());
                Log::info('Error Message: ' . $e->getMessage());
                Session::flash('danger', "Internal server error.Please try again later.");
                return redirect()->back();

        }
    }    

    
   
   
}
