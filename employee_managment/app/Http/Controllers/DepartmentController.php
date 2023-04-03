<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Department;
use App\Models\Designation;
use App\Models\OrganizationRole;
use DB;
use Log;
use Auth;
use Session;
use Validate;


class DepartmentController extends Controller
{
   
    public function index(Request $request)
    {

        $query = Department::query();
        if($request->has('search')){
            $query->where ( 'name', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $department  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.department.index',compact('department'));
    }   

    
   
    public function create()
    {
       return view('admin.modules.department.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $departmentValidation = $request->validate([
            'department_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $department = new Department;
            $department->name = $request->department_name;
            $department->uuid = \Str::uuid();
            $department->created_by = Auth::id();
          
            $res = $department->save();

            if(!$res)
            {
                DB::rollback();

                Session::flash('danger','Internal server error please try again later.');
             
                return redirect()->back();
            }
            DB::commit();

            Session::flash('success','Department added successfully');

            return redirect()->route('department.index');
        
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:DepartmentController function:store");
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
        $post = Department::where('uuid', $id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 
            
            $department = Department::where('uuid',$id)->first();

            return view('admin.modules.department.show',compact('department'));
          
    }

    
    public function edit($id)
    {
        
        $post = Department::where('uuid', $id)->first();

        if( is_null($post) ) {
            return abort(404);
        } 
            
            $department = Department::where('uuid',$id)->first();
    
            return view('admin.modules.department.edit',compact('department'));
        
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');

         $departmentUpdateValidation = $request->validate([

            'department_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $department = Department::where('uuid',$id)->first();

            if( is_null($department) ) {
                return abort(404);
            } 
            $department->name = $request->department_name;
            $department->updated_by  = Auth::id();
            $res = $department->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','Department updated successfully');
            return redirect()->route('department.index');

        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:DepartmentController function:updates");
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
           $department = Department::where('uuid',$id)->first();
           if(is_null($department) ) {
               
                return view('errors.404');
            } 
          
            Designation::where('department_id',$department->id)->update(['is_active'=>'0']);
            OrganizationRole::where('department_id',$department->id)->update(['is_active'=>'0']);
            $department->is_active = 0;
            $department->updated_by  = Auth::id();
            $res = $department->update();

            if(!$res)
            { 
                DB::rollback();

                Session::flash('danger','Internal server error please try again later.');

                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','Department delete successfully');
            return redirect()->route('department.index');
        

        } catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:DepartmentController function:delete");
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
