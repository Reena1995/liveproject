<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpEmergencyContact;
use App\Models\EmpFamilyDetail;
use App\Models\User;
use DB;
use Str;
use Log;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
   
   

    public function familyAdd(Request $request)
    {
       
       
         $rules =[
            'name' => 'required|array',
            'name.*'=>'required' ,
            'relationship'=>'required|array' ,
            'relationship.*'=>'required' ,
            'profession'=>'required|array' ,
            'profession.*'=>'required' ,
            'contact_no'=>'required|array' ,
            'contact_no.*'=>'required|numeric|digits:10' ,
            'age'=>'required|array' ,
            'age.*'=>'required' 
           
        ];  
        $msg = [
            
            'name.*.required'=>'The Name field is require',
            'relationship.*.required'=>'The Relationship field is require',
            'profession.*.required'=>'The Profession field is require',
            'contact_no.*.required'=>'The Contact No field is require',
            'contact_no.*.numeric'=>'Enter Only digit Number',
            'contact_no.*.digits'=>'Enter Only Only 10 digit',
            'age.*.required'=>'The Age field is require',

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
            
                foreach($request->name as $key=> $data){

                  
                    if(isset($request->family_uuid[$key]))
                    {
                       
                        $family_update =  EmpFamilyDetail::where('uuid',$request->family_uuid[$key])->first();
                    
                        $family_update->name  = $request->name[$key];
                        $family_update->relationship  = $request->relationship[$key];
                        $family_update->profession = $request->profession[$key];
                        $family_update->age = $request->age[$key];
                        $family_update->contact_no = $request->contact_no[$key];

                        if(isset($request->is_dependent[$key])){

                            $family_update->is_dependent = $request->is_dependent[$key];
                        }
                    
                        $family_update->updated_by = Auth::id();
                        $message = "family details update successfully";
                        $res = $family_update->update();
                    
                        if(!$res)
                        {
                            DB::rollback();
                            Session::flash('danger','Internal server error please try again later.');
                        
                            return redirect()->back();
                        }

                    }else{
                     
                        $family_add = new EmpFamilyDetail;

                        $family_add->name  = $request->name[$key];
                        $family_add->relationship  = $request->relationship[$key];
                        $family_add->profession = $request->profession[$key];
                        $family_add->age = $request->age[$key];
                        $family_add->contact_no = $request->contact_no[$key];

                        if(isset($request->is_dependent[$key])){

                            $family_add->is_dependent = $request->is_dependent[$key];
                        }
                    
                    
                        $family_add->user_id = $user->id;
                        $family_add->created_by = Auth::id();
                        $family_add->uuid = \Str::uuid();
                    
                        $res = $family_add->save();

                        $message = "family deatils add successfully";

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
            Log::info("Exiting class:ContactController function:familyAdd");
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

    public function emergencyAdd(Request $request)
    {
       
      
        $rules =[
            'name' => 'required|array',
            'name.*'=>'required' ,
            'address'=>'required|array' ,
            'address.*'=>'required' ,
            'relationship'=>'required|array' ,
            'relationship.*'=>'required' ,
            'contact_no'=>'required|array' ,
            'contact_no.*'=>'required|numeric|digits:10' ,
           
        ];  
        $msg = [
            
            'name.*.required'=>'The Name field is require',
            'address.*.required'=>'The Address field is require',
            'relationship.*.required'=>'The Relationship field is require',
            'contact_no.*.required'=>'The Contact No field is require',
            'contact_no.*.numeric'=>'Enter Only digit Number',
            'contact_no.*.digits'=>'Enter Only Only 10 digit',

        ];
        $validator = Validator::make($request->all(),$rules,$msg);
        
        

        if($validator->fails()){
           
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
       
     
        try{
            DB::beginTransaction();
            $user = User::where('uuid',$request->user_id)->first();

           
            foreach($request->name as $key => $data){

               
                if(isset($request -> emergency_uuid[$key]))
                {

                      \Log::info($request -> emergency_uuid[$key]);
                    $emergency_update =  EmpEmergencyContact::where('uuid',$request->emergency_uuid[$key])->first();
                    
                    $emergency_update->name  = $request->name[$key];
                    $emergency_update->address  = $request->address[$key];
                    $emergency_update->relationship = $request->relationship[$key];
                    $emergency_update->contact_no = $request->contact_no[$key];
                    
                    $emergency_update->updated_by = Auth::id();
                 
                    $message = "employee emergency detail update successfully";
                    $res = $emergency_update->update();
                   
                  
                    if(!$res)
                    {
                        DB::rollback();
                        Session::flash('danger','Internal server error please try again later.');
                    
                        return redirect()->back();
                    }

                }else{

                   
                  
                    $emergency_add = new EmpEmergencyContact;

                    $emergency_add->name  = $request->name[$key];
                    $emergency_add->address  = $request->address[$key];
                    $emergency_add->relationship = $request->relationship[$key];
                    $emergency_add->contact_no = $request->contact_no[$key];
                    
                    $emergency_add->user_id = $user->id; 
                    $emergency_add->created_by = Auth::id();
                    $emergency_add->uuid = \Str::uuid();
                  
                    $res = $emergency_add->save();

                    $message = "emergency contact details  add successfully";

                    if(!$res)
                    {
                        DB::rollback();
                        Session::flash('danger','Internal server error please try again later.');
                     
                    
                        return redirect()->back();
                    }
                }
               
            }
            if($request->final_submit == 'true'){
                $user->onboarding_dtls = 1;
                $user->update();
            }
           
            DB::commit();
            Session::flash('success',$message);
           
            return redirect()->back();
          

        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:ContactController function:emergencyAdd");
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
