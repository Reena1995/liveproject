<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeJobProfileDetail;
use App\Models\User;
use App\Models\EmpBankDetail;
use App\Models\EmpEmploymentDetail;
use App\Models\EmployeeLocationHistorie;
use App\Models\EmpAssetDetail;
use DB;
use Str;
use Log;
use Auth;
use Session;
use Validate;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{
    
   

    public function jobprofileAdd(Request $request)
    {
      
        $user = User::where('uuid',$request->user_id)->first();
        if( is_null($user) ) {

            return view('errors.404');
        
        }
        $jobprofile_detail=EmployeeJobProfileDetail::where('user_id',$user->id)->first();
    
        $jobprofileValidation = $request->validate([

            'company_employee_id'=>'bail|required',
            'company_emp_device_id'=>'bail|required',
            'department_id' =>'bail|required' , 
            'designation_id' =>'bail|required' , 
            'organization_role_id' =>'bail|required'  

        ]); 
      
        try{

                DB::beginTransaction();

                if (is_null($jobprofile_detail)) 
                {           
                    Log::info('if');  
                    $jobprofile_detailNew = new EmployeeJobProfileDetail;
                    $jobprofile_detailNew->company_employee_id = $request->company_employee_id;
                    $jobprofile_detailNew->company_emp_device_id = $request->company_emp_device_id;
                    $jobprofile_detailNew->department_id = $request->department_id;
                    $jobprofile_detailNew->designation_id = $request->designation_id;
                    $jobprofile_detailNew->organization_role_id = $request->organization_role_id;
                    
                    $jobprofile_detailNew->created_by = Auth::id();
                    $jobprofile_detailNew->user_id = $user->id;
                    $jobprofile_detailNew->uuid = \Str::uuid();

                    $res = $jobprofile_detailNew->save();

                    $message = 'Employee  job Profile successfully';
                  
                    if(!$res)
                    {
                        DB::rollback();
                        Session::flash('danger','Internal server error please try again later.');                
                        return redirect()->back();
                    }
                }            
                else{

                    $jobprofile_detail->company_employee_id = $request->company_employee_id;
                    $jobprofile_detail->company_emp_device_id = $request->company_emp_device_id;
                    $jobprofile_detail->department_id = $request->department_id;
                    $jobprofile_detail->designation_id = $request->designation_id;
                    $jobprofile_detail->organization_role_id = $request->organization_role_id;
        
                    
                    $jobprofile_detail->updated_by = Auth::id();
                    $result = $jobprofile_detail->update();

                    $message = 'Employee  job Profile  update successfully';
                    

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
            
        }catch (\Illuminate\Database\QueryException $e) {
          
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:MediumOfInstructionController function:store");
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

    public function bankAdd(Request $request)
    { 
        $user = User::where('uuid',$request->user_id)->first();
        if( is_null($user) ) {

            return view('errors.404');
        
        }
        $bankdeatil=EmpBankDetail::where('user_id',$user->id)->first();
       
      

        $bankdetailValidation = $request->validate([

            'ac_holder_name'=>'bail|required',
            'bank_name'=>'bail|required',
            'branch_name' =>'bail|required' , 
            'account_no'  =>'bail|required' ,
            'ifsc_code'=>'bail|required',
           
        ]); 
        
        try{

                DB::beginTransaction();

                if (is_null($bankdeatil)) 
                {           
                  
                    $bank_detailNew = new EmpBankDetail;
                    $bank_detailNew->ac_holder_name = $request->ac_holder_name;
                    $bank_detailNew->bank_name = $request->bank_name;
                    $bank_detailNew->branch_name = $request->branch_name;
                    $bank_detailNew->account_no = $request->account_no;
                    $bank_detailNew->ifsc_code = $request->ifsc_code;
                    
                    $bank_detailNew->created_by = Auth::id();
                    $bank_detailNew->user_id = $user->id;
                    $bank_detailNew->uuid = \Str::uuid();

                    $res = $bank_detailNew->save();

                    $message = 'Employee  bank detail  create successfully';
                  
                    if(!$res)
                    {
                        DB::rollback();
                        
                        Session::flash('danger','Internal server error please try again later.');                
                        return redirect()->back();
                    }
                }            
                else{

                        $bankdeatil->ac_holder_name = $request->ac_holder_name;
                        $bankdeatil->bank_name = $request->bank_name;
                        $bankdeatil->branch_name = $request->branch_name;
                        $bankdeatil->account_no = $request->account_no;
                        $bankdeatil->ifsc_code = $request->ifsc_code;
        
                    
                        $bankdeatil->updated_by = Auth::id();
                        $result = $bankdeatil->update();
                        \Log::info($result);

                        $message = 'Employee bank details update  successfully';
                    

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
            

        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:OrganizationController function:jobprofile_add");
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

    public function employmentAdd(Request $request)
    {
      
        $user = User::where('uuid',$request->user_id)->first();
        if( is_null($user)) {

            return view('errors.404');
        
        }
        $employment_detail=EmpEmploymentDetail::where('user_id',$user->id)->first();
        
        $required = '';
        if (is_null($employment_detail)){
            $required = '|required';
        }

        $employmentValidation = $request->validate([

            'date_of_joining'=>'bail|required',
            'date_of_resigning'=>'bail|required',
            'date_of_leaving' =>'bail|required' , 
            'reason_for_leaving'  =>'bail|required' ,
            'resign_letter_pdf'=>'bail'.$required,
            
            
        ]); 
        
      
        try{

                DB::beginTransaction();

                if (is_null($employment_detail)) 
                {       
                    Log::info('if');      
                    $employment_detailNew = new EmpEmploymentDetail;
                    $employment_detailNew->date_of_joining = $request->date_of_joining;
                    $employment_detailNew->date_of_resigning = $request->date_of_resigning;
                    $employment_detailNew->date_of_leaving = $request->date_of_leaving;
                    $employment_detailNew->reason_for_leaving = $request->reason_for_leaving;
        
                    if($request->has('resign_letter_pdf'))
                    {
        
                        $file=$request->file('resign_letter_pdf');  // get file
                        $file_name=time()."_image.".$request->file('resign_letter_pdf')->getClientOriginalExtension();// make file name
                        $file->move('console/upload/employee/resignletter',$file_name); //file name move upload in public		
                        $employment_detailNew->resign_letter_pdf=$file_name; // file name store in db
                    }
                
                    $employment_detailNew->created_by = Auth::id();
                
        
                    $employment_detailNew->user_id = $user->id;
                    $employment_detailNew->uuid = \Str::uuid();
                    $res = $employment_detailNew->save();

                    $message = 'employment  details add successfully';
                    
                    if(!$res)
                    {
                        DB::rollback();
                        
                        Session::flash('danger','Internal server error please try again later.');                
                        return redirect()->back();
                    }
                }            
                else{

                    $employment_detail->date_of_joining = $request->date_of_joining;
                    $employment_detail->date_of_resigning = $request->date_of_resigning;
                    $employment_detail->date_of_leaving = $request->date_of_leaving;
                    $employment_detail->reason_for_leaving = $request->reason_for_leaving;
        
                
                    if($request->has('resign_letter_pdf'))
                    {
                        $file=$request->file('resign_letter_pdf');  // get file
                        $file_name=time()."_image.".$request->file('resign_letter_pdf')->getClientOriginalExtension();// make file name
                        $file->move('console/upload/employee/resignletter',$file_name); //file name move upload in public		
                        $employment_detail->resign_letter_pdf=$file_name; // file name store in db
                    }
                
                    $employment_detail->updated_by = Auth::id();
        
                    $employment_detail->user_id = $user->id;
                    $result = $employment_detail->update();
                    $message = 'employment  details update successfully';
                    
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
            
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:OrganizationController function:employmentstore");
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
   
    public function locationAdd(Request $request)
    {
        $user = User::where('uuid',$request->user_id)->first();
        if( is_null($user)) {

            return view('errors.404');
        
        }
        $emp_location=EmployeeLocationHistorie::where('user_id',$user->id)->first();
        
        $empLocationValidation= $request->validate([

            'company_location_id'=>'bail|required',
            'company_location_type_id'=>'bail|required',
          
        ]); 
       

        try{

                DB::beginTransaction();

                if (is_null($emp_location)) 
                {           
 
                    $emp_location_detail = new EmployeeLocationHistorie;
                    $emp_location_detail->company_location_id = $request->company_location_id;
                    $emp_location_detail->company_location_type_id = $request->company_location_type_id;
                    
                    $emp_location_detail->created_by = Auth::id();
                    $emp_location_detail->user_id = $user->id;
                    $emp_location_detail->uuid = \Str::uuid();

                    $res = $emp_location_detail->save();

                    $message = 'Employee  location history add  successfully';
                  
                    if(!$res)
                    {
                        DB::rollback();
                        
                        Session::flash('danger','Internal server error please try again later.');                
                        return redirect()->back();
                    }
                }            
                else{

                   
                    $emp_location->company_location_id = $request->company_location_id;
                    $emp_location->company_location_type_id = $request->company_location_type_id;
                
                    $emp_location->updated_by = Auth::id();
                
                    $result = $emp_location->update();

                    $message = 'Employee location history update successfully';
                    

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
           
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:OrganizationController function:jobprofile_add");
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

    public function assetAdd(Request $request)
    {
        
        $user = User::where('uuid',$request->user_id)->first();
        $asset_detail = EmpAssetDetail::where('user_id',$user->id)->first();
      

        $isAsset= '';
        if(empty($asset_detail->id)){ 

            $isAsset = '|required';
        }

        $rules =[
            'serial_no' => 'required|array',
            'serial_no.*'=>'required' ,
            'purchased_dn'=>'required|array' ,
            'purchased_dn.*'=>'required' ,
            'purchased_from'=>'required|array' ,
            'purchased_from.*'=>'required' ,
            'warranty_period'=>'required|array' ,
            'warranty_period.*'=>'required' ,
            'organization_asset_code'=>'required|array' ,
            'organization_asset_code.*'=>'required' ,
            'invoice_no'=>'required|array' ,
            'invoice_no.*'=>'required' ,
            'asset_image'=> $isAsset ,
            'asset_image.*'=> $isAsset 
           
        ];  
        $msg = [
            
            'serial_no.*.required'=>'The Name Of the Insititute field is require',
            'purchased_dn.*.required'=>'The Address field is require',
            'purchased_from.*.required'=>'The to field is require',
            'warranty_period.*.required'=>'The from  field is require',
            'organization_asset_code.*.required'=>'The description field is require',
            'invoice_no.*.required'=>'The invoice_no field is require',
            'asset_image.*.required'=>'The certificate_pdf field is require',

        ];
        $validator = Validator::make($request->all(),$rules,$msg);
        
        

        if($validator->fails()){
           
                // dd($validator->errors());
         
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        try{

            DB::beginTransaction();
            $user = User::where('uuid',$request->user_id)->first();
            if( is_null($user)) {

                return view('errors.404');
            
            }
           
            foreach($request->asset_brand_id as $key=> $data){

                if(isset($request->asset_uuid[$key]))
                {
                    $emp_asset =  EmpAssetDetail::where('uuid',$request->asset_uuid[$key])->first();
                    
                    $emp_asset->asset_brand_id  = $request->asset_brand_id[$key];
                    $emp_asset->asset_sub_type_id  = $request->asset_sub_type_id[$key];
                    $emp_asset->serial_no = $request->serial_no[$key];
                    $emp_asset->purchased_dn = $request->purchased_dn[$key];
                    $emp_asset->purchased_from = $request->purchased_from[$key];
                    $emp_asset->warranty_period = $request->warranty_period[$key];
                    $emp_asset->organization_asset_code = $request->organization_asset_code[$key];
                    $emp_asset->invoice_no = $request->invoice_no[$key];
                    
                    if(isset($request->asset_image[$key])){

                        $file = $request->asset_image[$key];  // get file
                        $file_name=time().rand()."_image.".$file->getClientOriginalExtension();// make file name
                        \Log::info($file_name);
                        $file->move('console/upload/employee/assetimage',$file_name); //file name move upload in public		
                        $emp_asset->asset_image = $file_name;
                    }
                    
                    $emp_asset->updated_by = Auth::id();
                    
                    $res = $emp_asset->update();
                    $message = 'asset deatails update successfully';

                    if(!$res)
                    {
                        DB::rollback();
                        Session::flash('danger','Internal server error please try again later.');
                    
                        return redirect()->back();
                    }

                }else{

                    $emp_asset = new EmpAssetDetail;

                    $emp_asset->asset_brand_id  = $request->asset_brand_id[$key];
                    $emp_asset->asset_sub_type_id  = $request->asset_sub_type_id[$key];
                    $emp_asset->serial_no = $request->serial_no[$key];
                    $emp_asset->purchased_dn = $request->purchased_dn[$key];
                    $emp_asset->purchased_from = $request->purchased_from[$key];
                    $emp_asset->warranty_period = $request->warranty_period[$key];
                    $emp_asset->organization_asset_code = $request->organization_asset_code[$key];
                    $emp_asset->invoice_no = $request->invoice_no[$key];

                    $emp_asset->user_id = $user->id;

                    if($request->asset_image[$key]){
    
                        $file = $request->asset_image[$key];  // get file
                        $file_name=time().rand()."_image.".$file->getClientOriginalExtension();// make file name
                        $file->move('console/upload/employee/assetimage',$file_name); //file name move upload in public		
                        $emp_asset->asset_image = $file_name;
                    }

                    $emp_asset->created_by = Auth::id();
                    $emp_asset->uuid = \Str::uuid();
                  
                    $res = $emp_asset->save();

                    $message = 'asset deatils  add successfully';

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
            Log::info("Exiting class:OrganizationController function:assetstore");
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
