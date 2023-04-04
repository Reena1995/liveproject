<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeJobProfileDetail;
use App\Models\User;
use App\Models\EmpBankDetail;
use App\Models\EmpEmploymentDetail;
use App\Models\EmployeeLocationHistorie;
use App\Models\EmpAssetDetail;
use Illuminate\Support\Facades\Validator;
use DB;
use Str;
use Log;
use Auth;
use Session;
use Validate;


class OrganizationController extends Controller
{
    public function empbankAdd(Request $request)
    { 
        
        $bankdeatil=EmpBankDetail::where('user_id',auth()->user()->id)->first();
       
        $bankdetailValidation = $request->validate([

            'ac_holder_name'=>'bail|required',
            'bank_name'=>'bail|required',
            'branch_name' =>'bail|required' , 
            'account_no'  =>'bail|required' ,
            'ifsc_code'=>'bail|required',
           
        ]); 
        
        try{

                DB::beginTransaction();

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

    public function empemploymentAdd(Request $request)
    {
      
        $employment_detail=EmpEmploymentDetail::where('user_id',auth()->user()->id)->first();
        
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
        
                    $employment_detail->user_id = auth()->user()->id;
                    $result = $employment_detail->update();
                    $message = 'employment  details update successfully';
                    
                    if(!$result)
                    {
                        DB::rollback();
                        
                        Session::flash('danger','Internal server error please try again later.');
                        return redirect()->back();
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

    public function empassetAdd(Request $request)
    {
        
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

                    $emp_asset_new = new EmpAssetDetail;

                    $emp_asset_new->asset_brand_id  = $request->asset_brand_id[$key];
                    $emp_asset_new->asset_sub_type_id  = $request->asset_sub_type_id[$key];
                    $emp_asset_new->serial_no = $request->serial_no[$key];
                    $emp_asset_new->purchased_dn = $request->purchased_dn[$key];
                    $emp_asset_new->purchased_from = $request->purchased_from[$key];
                    $emp_asset_new->warranty_period = $request->warranty_period[$key];
                    $emp_asset_new->organization_asset_code = $request->organization_asset_code[$key];
                    $emp_asset_new->invoice_no = $request->invoice_no[$key];

                    $emp_asset_new->user_id = auth()->user()->id;

                    if($request->asset_image[$key]){
    
                        $file = $request->asset_image[$key];  // get file
                        $file_name=time().rand()."_image.".$file->getClientOriginalExtension();// make file name
                        $file->move('console/upload/employee/assetimage',$file_name); //file name move upload in public		
                        $emp_asset_new->asset_image = $file_name;
                    }

                    $emp_asset_new->created_by = Auth::id();
                    $emp_asset_new->uuid = \Str::uuid();
                  
                    $res = $emp_asset_new->save();

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
