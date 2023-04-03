<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EmployeePersonalDetail;
use App\Models\EmpEducationDetail;
use App\Models\EmpDocumentDetail;
use App\Models\EmpLangDetail;
use App\Models\DocumentType;
use App\Models\User;
use DB;
use Str;
use Log;
use Auth;
use Session;
use Validate;

class PersonalController extends Controller
{
    public function emppersonaldetailAdd(Request $request)
    {
     
        $user = User::where('uuid',auth()->user()->user_id)->first();
        
       dd($user);

        $personal_detail = EmployeePersonalDetail::where('user_id',$user->id)->first();
        
        $isImageValidation = '';
        if(empty($personal_detail->id)){ 

            $isImageValidation = '|required';
        }

        $personaldetailValidation = $request->validate([
            'fathername'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'mothername'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'dob' =>'bail|required' , 
            'gender'  =>'bail|required' ,
            'bloodgroup'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'alternateno'=>'bail|required|numeric|digits:10',
            'marital_status'=>'bail|required',
            'image'=>'bail'.$isImageValidation,
            'residencetype'=>'bail|required',
            'transportationmode'=>'bail|required',
            'disabilitydtls'=>'bail|required',
            'totalexperience'=>'bail|required|numeric',
            'current_address'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'permanent_address'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'current_country'=>'bail|required',
            'permanent_country'=>'bail|required',
            'current_state'=>'bail|required',
            'permanent_state'=>'bail|required',
            'current_city'=>'bail|required',
            'permanent_city'=>'bail|required',
            'current_pincode'=>'bail|required|numeric',
            'permanent_pincode'=>'bail|required|numeric',
        ]); 
      
        try{

                DB::beginTransaction();

                $personal_detail->fathername = $request->fathername;
                $personal_detail->mothername = $request->mothername;
                $personal_detail->dob = $request->dob;
                $personal_detail->gender = $request->gender;
                $personal_detail->blood_group = $request->bloodgroup;
                $personal_detail->alternate_no = $request->alternateno;
                $personal_detail->marital_status = $request->marital_status;
            
                if($request->has('image'))
                {
                    $file=$request->file('image');  // get file
                    $file_name=time()."_image.".$request->file('image')->getClientOriginalExtension();// make file name
                    $file->move('console/upload/employee/profileimage',$file_name); //file name move upload in public		
                    $personal_detail->image=$file_name; // file name store in db
                }

                $personal_detail->current_residence_type_id  = $request->residencetype;
                $personal_detail->mode_of_transportation_id  = $request->transportationmode;
                $personal_detail->details_of_disability  = $request->disabilitydtls;
                $personal_detail->total_of_experience  = $request->totalexperience;
                $personal_detail->current_address  = $request->current_address;
                $personal_detail->permanent_address  = $request->permanent_address;
                $personal_detail->current_country_id  = $request->current_country;
                $personal_detail->permanent_country_id   = $request->permanent_country;
                $personal_detail->current_state_id   = $request->current_state;
                $personal_detail->permanent_state_id   = $request->permanent_state;
                $personal_detail->current_city_id   = $request->current_city;
                $personal_detail->permanent_city_id   = $request->permanent_city;
                $personal_detail->current_pincode   = $request->current_pincode;
                $personal_detail->permanent_pincode   = $request->permanent_pincode;
            
                $personal_detail->updated_by = Auth::id();
    
                $personal_detail->user_id = $user->id;
                $result = $personal_detail->update();
                $message = 'personal Updated successfully';
                

                if(!$result)
                {
                    DB::rollback();
                    
                    Session::flash('danger','Internal server error please try again later.');
                
                    return redirect()->back();
                }
                
            
                DB::commit(); 
                
                Session::flash('success',$message);
            
                return redirect()->back();
           
        }catch(\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:EmployeePersonalDetail function:personaldetail_add");
            Session::flash('danger', "Internal server error.Please try again later.");
            return redirect()->back();

        }catch (\Exception $e) {
                Log::info('Error occured for user-id ' . Auth::id() . '. See log below');
                Log::info('Error Code: ' . $e->getCode());
                Log::info('Error Message: ' . $e->getMessage());
                Session::flash('danger', "Internal server error.Please try again later.");
                return redirect()->back();

        }
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
