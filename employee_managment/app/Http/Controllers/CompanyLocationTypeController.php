<?php

namespace App\Http\Controllers;
use App\Models\CompanyLocationType;
use Illuminate\Http\Request;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class CompanyLocationTypeController extends Controller
{
    public function index(Request $request)
    {
        
        $query = CompanyLocationType::query();
        if($request->has('search')){
            $query->where ( 'type', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $location_type  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.company_location_type.index',compact('location_type'));
    }  

    public function create()
    {
       return view('admin.modules.company_location_type.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $locationTypeValidation = $request->validate([
            'location_type_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $location_type = new CompanyLocationType;
            $location_type->type = $request->location_type_name;
            $location_type->created_by = Auth::id();
            $location_type->uuid = \Str::uuid();
          
            $res = $location_type->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','location type create successfully');
           
            return redirect()->route('company_location_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:CompanyLocationTypeController function:store");
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
        $post = CompanyLocationType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $location_type = CompanyLocationType::where('uuid',$id)->first();
            return view('admin.modules.company_location_type.show',compact('location_type'));
          
    }

    
    public function edit($id)
    {
        $post = CompanyLocationType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $location_type = CompanyLocationType::where('uuid',$id)->first();
            return view('admin.modules.company_location_type.edit',compact('location_type'));
       
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $locationTypeUpdateValidation = $request->validate([
            'location_type_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $location_type = CompanyLocationType::where('uuid',$id)->first();
            if( is_null($location_type) ) {

                return abort(404);
    
            } 
            $location_type -> type = $request->location_type_name;
            $location_type->updated_by = Auth::id();
            $res = $location_type ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','location update successfully');
            return redirect()->route('company_location_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:CompanyLocationTypeController function:update");
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

    

    public function status($id)
    {
      
       try{

           Log::info('hbjjhbdjhqw');
           DB::beginTransaction();
           $location_type = CompanyLocationType::where('uuid',$id)->first();
           if( is_null($location_type) ) {

            return view('errors.404');
        
            }
           $location_type->is_active = 0;
           $location_type->updated_by = Auth::id();
           $res = $location_type->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','location type  delete successfully');
           return redirect()->route('company_location_type.index');
          


       }catch (\Illuminate\Database\QueryException $e) {
        Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
        Log::info('Error Code: ' . $e->getCode());
        Log::info('Error Message: ' . $e->getMessage());
        Log::info("Exiting class:CompanyLocationTypeController function:delete");
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
