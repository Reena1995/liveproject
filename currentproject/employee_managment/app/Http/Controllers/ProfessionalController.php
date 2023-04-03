<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EmpProfessionalTrainingDetail;
use App\Models\EmpWorkExperienceDetail;
use App\Models\User;
use DB;
use Str;
use Log;
use Auth;
use Session;
use Validate;


class ProfessionalController extends Controller
{
   
  

    public function professionalAdd(Request $request)
    {
        $user = User::where('uuid',$request->user_id)->first();
        $professional_detail = EmpProfessionalTrainingDetail::where('user_id',$user->id)->first();
      

        $isCertficate= 'nullable';
        if(empty($professional_detail->id)){ 

            $isCertficate = '|required';
        }

        $rules =[
            'name_of_institute' => 'required|array',
            'name_of_institute.*'=>'required' ,
            'address'=>'required|array' ,
            'address.*'=>'required' ,
            'to'=>'required|array' ,
            'to.*'=>'required' ,
            'from'=>'required|array' ,
            'from.*'=>'required' ,
            'description'=>'required|array' ,
            'description.*'=>'required' ,
            'certificate_pdf'=>'required',
            'certificate_pdf.*'=> $isCertficate 
           
        ];  
        $msg = [
            
            'name_of_institute.*.required'=>'The Name Of the Insititute field is require',
            'address.*.required'=>'The Address field is require',
            'to.*.required'=>'The to field is require',
            'from.*.required'=>'The from  field is require',
            'description.*.required'=>'The description field is require',
            'certificate_pdf.*.required'=>'The certificate_pdf field is require',

        ];
        $validator = Validator::make($request->all(),$rules,$msg);
        
        // dd($validator->errors());

        if($validator->fails()){
           
                // dd($validator->errors());
         
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    
        try{

                DB::beginTransaction();
                $user = User::where('uuid',$request->user_id)->first();
                if( is_null($user) ) {

                    return view('errors.404');
                
                }
             
                foreach($request->name_of_institute as $key=> $data){

                  
                    if(isset($request->professional_uuid[$key]))
                    {
                       
                        $profession_update =  EmpProfessionalTrainingDetail::where('uuid',$request->professional_uuid[$key])->first();
                        $profession_update->name_of_institute  = $request->name_of_institute[$key];
                        $profession_update->address  = $request->address[$key];
                        $profession_update->to = $request->to[$key];
                        $profession_update->from = $request->from[$key];
                        $profession_update->description = $request->description[$key];
                    
                        if(isset($request->certificate_pdf[$key])){

                            $file = $request->certificate_pdf[$key];  // get file
                            $file_name=time().rand()."_image.".$file->getClientOriginalExtension();// make file name
                            $file->move('console/upload/employee/profession_training',$file_name); //file name move upload in public		
                            $profession_update->certificate_pdf = $file_name;
                        }
                        
                        $profession_update->updated_by = Auth::id();
                        $message = "professional training detail update successfully";
                        $res = $profession_update->update();
                    
                        if(!$res)
                        {
                            DB::rollback();
                            Session::flash('danger','Internal server error please try again later.');
                        
                            return redirect()->back();
                        }

                    }else{
                       
                        $professional_add = new EmpProfessionalTrainingDetail;

                        $professional_add->name_of_institute  = $request->name_of_institute[$key];
                        $professional_add->address  = $request->address[$key];
                        $professional_add->to = $request->to[$key];
                        $professional_add->from = $request->from[$key];
                        $professional_add->description = $request->description[$key];
                    
                        
                        if(isset($request->certificate_pdf[$key])){

                            $file = $request->certificate_pdf[$key];  // get file
                            $file_name=time().rand()."_image.".$file->getClientOriginalExtension();// make file name
                            $file->move('console/upload/employee/profession_training',$file_name); //file name move upload in public		
                            $professional_add->certificate_pdf = $file_name;
                        }
                        
                        $professional_add->user_id = $user->id;
                        $professional_add->created_by = Auth::id();
                        $professional_add->uuid = \Str::uuid();
                    
                        $res = $professional_add->save();

                        $message = "professional training detail add successfully";

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
            Log::info("Exiting class:ProfessionalController function:store");
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

    public function workexperienceAdd(Request $request)
    {
     
        $user = User::where('uuid',$request->user_id)->first();
        $work_detail = EmpWorkExperienceDetail::where('user_id',$user->id)->first();
      
        $isCertficate= 'nullable';
        if(empty($professional_detail->id)){ 

            $isCertficate = '|required';
        }
      

        $rules =[
            'name' => 'required|array',
            'name.*'=>'required' ,
            'address'=>'required|array' ,
            'address.*'=>'required' ,
            'date_of_joining'=>'required|array' ,
            'date_of_joining.*'=>'required' ,
            'date_of_leaving'=>'required|array' ,
            'date_of_leaving.*'=>'required' ,
            'joining_designation'=>'required|array' ,
            'joining_designation.*'=>'required' ,
            'leaving_designation' => 'required|array',
            'leaving_designation.*'=>'required' ,
            'role'=>'required|array' ,
            'role.*'=>'required' ,
            'last_salary'=>'required|array' ,
            'last_salary.*'=>'required' ,
            'leaving_reason'=>'required|array' ,
            'leaving_reason.*'=>'required' ,
            'reporting_authority_name'=>'required|array' ,
            'reporting_authority_name.*'=>'required' ,
            'reporting_authority_contact'=>'required|array' ,
            'reporting_authority_contact.*'=>'required' ,
            'reporting_authority_designation'=>'required|array' ,
            'reporting_authority_designation.*'=>'required' ,
           
        ];  
        $msg = [
            
            'name.*.required'=>'The Name field is require',
            'address.*.required'=>'The Address field is require',
            'date_of_joining.*.required'=>'The date of joining field is require',
            'date_of_leaving.*.required'=>'The date_of_leaving  field is require',
            'joining_designation.*.required'=>'The joining_designation field is require',
            'leaving_designation.*.required'=>'The leaving_designation field is require',
            'role.*.required'=>'The role field is require',
            'last_salary.*.required'=>'The last_salary field is require',
            'leaving_reason.*.required'=>'The leaving_reason  field is require',
            'reporting_authority_name.*.required'=>'The reporting_authority_name field is require',
            'reporting_authority_contact.*.required'=>'The reporting_authority_contact field is require',
            'reporting_authority_designation.*.required'=>'The reporting_authority_designation field is require',

        ];
        $validator = Validator::make($request->all(),$rules,$msg);
        // dd($validator->errors());
        // dd($validator->err)
         if($validator->fails()){
           
         
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
       
        try{
            DB::beginTransaction();
            $user = User::where('uuid',$request->user_id)->first();
            if( is_null($user) ) {

                return view('errors.404');
            
            }
            foreach($request->name as $key=> $data){

               
                if(isset($request->work_uuid[$key]))
                {
                   
                    $workexp_update = EmpWorkExperienceDetail::where('uuid',$request->work_uuid[$key])->first();
                    
                  
                    $workexp_update->name  = $request->name[$key];
                    $workexp_update->address  = $request->address[$key];
                    $workexp_update->date_of_joining = $request->date_of_joining[$key];
                    $workexp_update->date_of_leaving = $request->date_of_leaving[$key];
                    $workexp_update->joining_designation  = $request->joining_designation[$key];
                    $workexp_update->leaving_designation = $request->leaving_designation[$key];
                    $workexp_update->role = $request->role[$key];
                    $workexp_update->last_salary  = $request->last_salary[$key];
                    $workexp_update->leaving_reason  = $request->leaving_reason[$key];
                    $workexp_update->reporting_authority_name  = $request->reporting_authority_name[$key];
                    $workexp_update->reporting_authority_contact = $request->reporting_authority_contact[$key];
                    $workexp_update->reporting_authority_designation = $request->reporting_authority_designation[$key];
                   
                    
                    if(isset($request->experience_certificate[$key])){

                        $file = $request->experience_certificate[$key];  // get file
                        $file_name=time().rand()."_image.".$file->getClientOriginalExtension();// make file name
                        $file->move('console/upload/employee/work_experience/',$file_name); //file name move upload in public		
                        $workexp_update->experience_certificate = $file_name;
                    }
                    
                    $workexp_update->updated_by = Auth::id();
                
                    $res = $workexp_update->update();
                    $message="work experiene detail update successfully";

                    if(!$res)
                    {
                        DB::rollback();
                        Session::flash('danger','Internal server error please try again later.');
                    
                        return redirect()->back();
                    }

                }else{

                    
                    $workexp_add = new EmpWorkExperienceDetail();

                    $workexp_add->name  = $request->name[$key];
                    $workexp_add->address  = $request->address[$key];
                    $workexp_add->date_of_joining = $request->date_of_joining[$key];
                    $workexp_add->date_of_leaving = $request->date_of_leaving[$key];
                    $workexp_add->joining_designation  = $request->joining_designation[$key];
                    $workexp_add->leaving_designation = $request->leaving_designation[$key];
                    $workexp_add->role = $request->role[$key];
                    $workexp_add->last_salary  = $request->last_salary[$key];
                    $workexp_add->leaving_reason  = $request->leaving_reason[$key];
                    $workexp_add->reporting_authority_name  = $request->reporting_authority_name[$key];
                    $workexp_add->reporting_authority_contact = $request->reporting_authority_contact[$key];
                    $workexp_add->reporting_authority_designation = $request->reporting_authority_designation[$key];
                   
                  
                    if(isset($request->experience_certificate[$key])){

                        $file = $request->experience_certificate[$key];  // get file
                        $file_name=time().rand()."_image.".$file->getClientOriginalExtension();// make file name
                        $file->move('console/upload/employee/work_experience',$file_name); //file name move upload in public		
                        $workexp_add->experience_certificate = $file_name;
                    }
                    
                    $workexp_add->user_id = $user->id;

                    $workexp_add->created_by = Auth::id();
                    $workexp_add->uuid = \Str::uuid();
                  
                    $res = $workexp_add->save();
                    $message =" work experiene add successfully";

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
            Log::info("Exiting class:ProfessionalController function:store");
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

   
  
}
