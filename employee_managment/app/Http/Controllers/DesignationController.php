<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Designation;
use App\Models\OrganizationRole;
use Illuminate\Http\Request;
use DB;
use Log;
use Auth;
use Session;
use Validate;


class DesignationController extends Controller
{
    public function index(Request $request)
    {

        $query =Designation::query();
        if($request->has('search')){
            $search = $request->search;
            $query->where ( 'name', 'LIKE', '%' . $search . '%' )
                ->orWhereHas('departmentActive', function($q) use ($search){ 
                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
        } 
        $designation  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.designation.index',compact('designation'));


    }  

    public function create()
    {  
        $department=Department::where('is_active',1)->orderBy('name', 'ASC')->get();
        return view('admin.modules.designation.add',compact('department'));
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $departmentValidation = $request->validate([
            'designation_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'department_id' =>'bail|required'  

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $designation = new Designation;
            $designation->name = $request->designation_name;
            $designation->department_id = $request->department_id;
            $designation->created_by = Auth::id();
            $designation->uuid = \Str::uuid();
          
            $res = $designation->save();

            if(!$res)
            {
                DB::rollback();

                Session::flash('danger','Internal server error please try again later.');
             
                return redirect()->back();
            }
            DB::commit();

            Session::flash('success','designation create successfully');
           
            return redirect()->route('designation.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:DesignationController function:store");
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

   
     


    public function show($id)
    {
        $post = Designation::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 
            
            $department=Department::where('is_active',1)->orderBy('name', 'ASC')->first();
            $designation = Designation::where('uuid',$id)->first();
            return view('admin.modules.designation.show',compact('designation','department'));
        
    }
   
    

    
    public function edit($id)
    {
        $post = Designation::where('uuid',$id)->first();

        if( is_null($post) ) {
            return abort(404);
        }

            $department=Department::where('is_active',1)->orderBy('name', 'ASC')->get();
            $designation = Designation::where('uuid',$id)->first();
            return view('admin.modules.designation.edit',compact('designation','department'));
        
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
         $designationUpdateValidation = $request->validate([
            'designation_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'department_id'=>'bail|required',
            

        ]); 
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $designation = Designation::where('uuid',$id)->first();
            if( is_null($designation) ) {

                return view('errors.404');
            
            }
            $designation->name = $request->designation_name;
            $designation->department_id = $request->department_id;
            $designation->updated_by = Auth::id();
            $res = $designation->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','designation update  successfully');
            return redirect()->route('designation.index');
           


        } catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:DesignationController function:update");
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
           $designation = Designation::where('uuid',$id)->first();
           if( is_null($designation) ) {

            return view('errors.404');
        
            }
           
            OrganizationRole::where('designation_id',$designation->id)->update(['is_active'=>'0']);
            $designation->is_active = 0;
            $designation->updated_by  = Auth::id();
            $res = $designation->update();

            if(!$res)
            { 
                DB::rollback();

                Session::flash('danger','Internal server error please try again later.');

                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','Designation delete successfully');
            return redirect()->route('designation.index');
        
          

       } catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:DesignationController function:delete");
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
