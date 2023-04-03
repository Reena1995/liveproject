<?php

namespace App\Http\Controllers;
use App\Models\CompanyLocation;
use Illuminate\Http\Request;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class CompanyLocationController extends Controller
{
    public function index(Request $request)
    {
        $query = CompanyLocation::query();
        if($request->has('search')){
            $query->where ( 'name', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $location  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.company_location.index',compact('location'));
    }  

    public function create()
    {
       return view('admin.modules.company_location.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $locationValidation = $request->validate([
            'location_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $location = new CompanyLocation;
            $location->name = $request->location_name;
            $location->created_by = Auth::id();
            $location->uuid = \Str::uuid();
          
            $res = $location->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','location create successfully');
            return redirect()->route('company_location.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:CompanyLocationController function:store");
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
        $post = CompanyLocation::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        }

            $location = CompanyLocation::where('uuid',$id)->first();
            return view('admin.modules.company_location.show',compact('location'));
        

    }

    public function edit($id)
    {
        $post = CompanyLocation::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 
            $location = CompanyLocation::where('uuid',$id)->first();
            return view('admin.modules.company_location.edit',compact('location'));
        
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
         $locationUpdateValidation = $request->validate([
            'location_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $location = CompanyLocation::where('uuid',$id)->first();

            if( is_null($location) ) {

                return abort(404);
    
            } 

            $location->name = $request->location_name;
            $location->updated_by  = Auth::id();
            $res = $location->update();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','location update successfully');
            return redirect()->route('company_location.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:CompanyLocationController function:update");
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

    public function status($id)
    {
      
       try{

           Log::info('hbjjhbdjhqw');
           DB::beginTransaction();
           $location = CompanyLocation::where('uuid',$id)->first();

           if( is_null($location) ) {

                return view('errors.404');
        
            }
           $location->is_active = 0;
           $location->updated_by  = Auth::id();
           $res = $location->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','location delete successfully');
           return redirect()->route('company_location.index');
          


       }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:CompanyLocationController function:delete");
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
