<?php

namespace App\Http\Controllers;

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
   

    public function personaldetailAdd(Request $request)
    {
     
        $user = User::where('uuid',$request->user_id)->first();
        
        if( is_null($user) ) {

            return view('errors.404');

        }

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

                if (is_null($personal_detail)) 
                {             
                    $personal_detailNew = new EmployeePersonalDetail;
                    $personal_detailNew->fathername = $request->fathername;
                    $personal_detailNew->mothername = $request->mothername;
                    $personal_detailNew->dob = $request->dob;
                    $personal_detailNew->gender = $request->gender;
                    $personal_detailNew->blood_group = $request->bloodgroup;
                    $personal_detailNew->alternate_no = $request->alternateno;
                    $personal_detailNew->marital_status = $request->marital_status;
        
                
                    if($request->has('image'))
                    {
        
                        $file=$request->file('image');  // get file
                        $file_name=time()."_image.".$request->file('image')->getClientOriginalExtension();// make file name
                        $file->move('console/upload/employee/profileimage',$file_name); //file name move upload in public		
                        $personal_detailNew->image=$file_name; // file name store in db
                    }

                    $personal_detailNew->current_residence_type_id  = $request->residencetype;
                    $personal_detailNew->mode_of_transportation_id  = $request->transportationmode;
                    $personal_detailNew->details_of_disability  = $request->disabilitydtls;
                    $personal_detailNew->total_of_experience  = $request->totalexperience;
                    $personal_detailNew->current_address  = $request->current_address;
                    $personal_detailNew->permanent_address  = $request->permanent_address;
                    $personal_detailNew->current_country_id  = $request->current_country;
                    $personal_detailNew->permanent_country_id   = $request->permanent_country;
                    $personal_detailNew->current_state_id   = $request->current_state;
                    $personal_detailNew->permanent_state_id   = $request->permanent_state;
                    $personal_detailNew->current_city_id   = $request->current_city;
                    $personal_detailNew->permanent_city_id   = $request->permanent_city;
                    $personal_detailNew->current_pincode   = $request->current_pincode;
                    $personal_detailNew->permanent_pincode   = $request->permanent_pincode;
                
                    $personal_detailNew->created_by = Auth::id();
                    $personal_detailNew->user_id = $user->id;
                    $personal_detailNew->uuid = \Str::uuid();

                    $res = $personal_detailNew->save();
                    $message = 'personal create successfully';
                   
                    if(!$res)
                    {
                        DB::rollback();
                        
                        Session::flash('danger','Internal server error please try again later.');                
                        return redirect()->back();
                    }
                }            
                else{

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

   
    public function educationAdd(Request $request)
    {
       
        $rules =[
            'universityname' => 'required|array',
            'universityname.*'=>'required' ,
            'specialization'=>'required|array' ,
            'specialization.*'=>'required' ,
            'percentage'=>'required|array' ,
            'percentage.*'=>'required' ,
            'passingyear'=>'required|array' ,
            'passingyear.*'=>'required' ,
           
        ];  
        $msg = [
            
            'universityname.*.required'=>'The Universityname field is require',
            'specialization.*.required'=>'The Specialization field is require',
            'percentage.*.required'=>'The Percentage field is require',
            'passingyear.*.required'=>'The Passingyear field is require',

        ];
        $validator = Validator::make($request->all(),$rules,$msg);
        
        if($validator->fails()){
           
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        try{

                DB::beginTransaction();
                $user = User::where('uuid',$request->user_id)->first();

                if( is_null($user) ) {

                    return view('errors.404');
        
                }

                foreach($request->medium as $key=> $data){

                    if(isset($request->education_uuid[$key]))
                    {
                        $educationD =  EmpEducationDetail::where('uuid',$request->education_uuid[$key])->first();
                        
                      
                        $educationD->medium_instruction_id  = $request->medium[$key];
                        $educationD->education_level_id  = $request->education[$key];
                        $educationD->percentage = $request->percentage[$key];
                        $educationD->university_name = $request->universityname[$key];
                        $educationD->specilaization = $request->specialization[$key];
                        $educationD->passing_year = $request->passingyear[$key];
                        
                        if(isset($request->result[$key])){

                            $file = $request->result[$key];  // get file
                            $file_name=time()."_image.".$file->getClientOriginalExtension();// make file name
                            $file->move('console/upload/employee/education',$file_name); //file name move upload in public		
                            $educationD->result = $file_name;
                        }
                        
                        $educationD->updated_by = Auth::id();
                        $message="Education deatils upadte successfully";
                        $res = $educationD->update();

                        if(!$res)
                        {
                            DB::rollback();
                            Session::flash('danger','Internal server error please try again later.');
                        
                            return redirect()->back();
                        }

                    }else{

                        $education = new EmpEducationDetail;
                        $education->medium_instruction_id  = $request->medium[$key];
                        $education->education_level_id  = $request->education[$key];
                        $education->percentage = $request->percentage[$key];
                        $education->university_name = $request->universityname[$key];
                        $education->specilaization = $request->specialization[$key];
                        $education->passing_year = $request->passingyear[$key];
                        $education->user_id = $user->id;

                        if($request->result[$key]){
        
                            $file = $request->result[$key];  // get file
                            $file_name=time()."_image.".$file->getClientOriginalExtension();// make file name
                            $file->move('console/upload/employee/education',$file_name); //file name move upload in public		
                            $education->result = $file_name;
                        }
                        
                        $education->created_by = Auth::id();
                        $education->uuid = \Str::uuid();
                    
                        $res = $education->save();
                        $message="Education created successfully";

                        if(!$res)
                        {
                            DB::rollback();
                            Session::flash('danger','Internal server error please try again later.');
                        
                        
                            return redirect()->back();
                        }
                    }
                  
                }
            
                DB::commit();
                Session::flash('success',$message);
            
                return redirect()->back();
           


        }catch (\Illuminate\Database\QueryException $e) {
          
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:PersonalController function:educationAdd");
            Session::flash('danger', "Internal server error.Please try again later 12121.");
            return redirect()->back();
        }catch (\Exception $e) {
                Log::info('Error occured for user-id ' . Auth::id() . '. See log below');
                Log::info('Error Code: ' . $e->getCode());
                Log::info('Error Message: ' . $e->getMessage());
                Session::flash('danger', "Internal server error.Please try again later.");
                Log::info('Message :'.$e->getMessage());
                Log::info('File Location :'.$e->getFile());
                Log::info('Line No :'.$e->getLine()); 
                return redirect()->back();
        }
    }

    public function documentAdd(Request $request)
    {
         $empDocumentValidation = $request->validate([

            'type.*'=>'bail|required' ,
            'file.*'=>'bail|required' ,
           
        ]); 

        try{
                DB::beginTransaction();
                $user = User::where('uuid',$request->user_id)->first();
                if( is_null($user) ) {

                    return view('errors.404');
        
                }
            
                foreach($request->type as $key=> $data){

                    if(isset($request->document_uuid[$key]))
                    {

                        $empdoc =  EmpDocumentDetail::where('uuid',$request->document_uuid[$key])->first();
                        $empdoc->document_type_id = $request->type[$key];
                    
                        
                        if(isset($request->documents[$key])){
                            $fileN = $request->documents[$key];  // get file
                            
                            $file_name=time().rand()."_image.".$fileN->getClientOriginalExtension();// make file name
                            
                            $fileN->move('console/upload/employee/document',$file_name); //file name move upload in public		
                            $empdoc->file = $file_name;
                        }
                        
                        $empdoc->updated_by = Auth::id();
            
                        $res = $empdoc->update();
                        $msg="employee Document deatils update successfully";

                        if(!$res)
                        {
                            DB::rollback();
                            Session::flash('danger','Internal server error please try again later.');
                        
                            return redirect()->back();
                        }

                    }else{

                        
                            $emp_document_dtls= new EmpDocumentDetail;
                            $emp_document_dtls->document_type_id   = $request->type[$key];
                            $emp_document_dtls->user_id = $user->id;

                            if($request->documents[$key]){
                                $fileN = $request->documents[$key];  // get file
                                
                                $file_name=time().rand()."_image.".$fileN->getClientOriginalExtension();// make file name
                                
                                $fileN->move('console/upload/employee/document',$file_name); //file name move upload in public		
                                $emp_document_dtls->file = $file_name;
                            }
                            
                            $emp_document_dtls->created_by = Auth::id();
            
                            $emp_document_dtls->uuid = \Str::uuid();
                        
                            $res = $emp_document_dtls->save();
                            $msg="employee Document deatils create  successfully";
                            
                            if(!$res)
                            {
                                DB::rollback();
                                Session::flash('danger','Internal server error please try again later.');
                            
                                return redirect()->back();
                            }
                    }
                
                    
                }

                DB::commit();
                Session::flash('success',$msg);
            
                return redirect()->back();
           
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:PersonalController function:store");
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
    
    public function langaugeAdd(Request $request)
    {
       
        try{
                // dd($request->all());
                DB::beginTransaction();
                $user = User::where('uuid',$request->user_id)->first();
                
                foreach($request->language_id as $key=> $data){

                    if(isset($request->lang_uuid[$key]))
                    {
                        \Log::info('update');
                        $emplanUpdate =  EmpLangDetail::where('uuid',$request->lang_uuid[$key])->first();
                        $emplanUpdate->read = 'NO';
                        $emplanUpdate->write = 'NO';
                        $emplanUpdate->speak = 'NO';
                        $res = $emplanUpdate->update();
                        
                        $emplanUpdate->language_id  = $request->language_id[$key];
                    
                        if(isset($request->read[$key])){

                            $emplanUpdate->read = $request->read[$key];
                        }
                        if(isset($request->write[$key])){

                            $emplanUpdate->write = $request->write[$key];
                        }
                        if(isset($request->speak[$key])){

                            $emplanUpdate->speak = $request->speak[$key];
                        }
                        
                        $emplanUpdate->updated_by = Auth::id();
                    
                        $res = $emplanUpdate->update();

                        $msg="employee Langauge deatils update successfully";

                        if(!$res)
                        {
                            DB::rollback();
                            Session::flash('danger','Internal server error please try again later.');
                        
                            return redirect()->back();
                        }

                    }else{

                        \Log::info('new entry');
                        $emp_lang_dtls= new EmpLangDetail;
                        $emp_lang_dtls->language_id = $request->language_id[$key];

                        if(isset($request->read[$key])){

                            $emp_lang_dtls->read = $request->read[$key];
                        }
                        if(isset($request->speak[$key])){

                            $emp_lang_dtls->speak = $request->speak[$key];
                        }
                        if(isset($request->write[$key])){

                            $emp_lang_dtls->write = $request->write[$key];
                        }
                       
                        
                       
                        $emp_lang_dtls->user_id = $user->id;
                        $emp_lang_dtls->created_by = Auth::id();
                        $emp_lang_dtls->uuid = \Str::uuid();
                    
                        $res = $emp_lang_dtls->save();
                        $msg="employee Langauge deatils added successfully";
                        if(!$res)
                        {
                            DB::rollback();
                            Session::flash('danger','Internal server error please try again later.');
                        
                        
                            return redirect()->back();
                        }
                    }
                
                    
                }
               
                DB::commit();
                Session::flash('success',$msg);
            
                return redirect()->back();
          
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:PersonalController function:langaugeAdd");
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
    
}
