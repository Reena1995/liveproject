<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\OrganizationRole;
use App\Models\Designation;
use App\Models\Department;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class OrganizationRoleController extends Controller
{
    public function index(Request $request)
    {
        $query = OrganizationRole::query();

        if($request -> has('search')){

            $search = $request->search;
            $query -> where ( 'name', 'LIKE', '%' . $search . '%' )
                ->orWhereHas('departmentActive', function($q) use ($search){ 
                    $q -> where('name', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('designationActive', function($q) use ($search){ 
                    $q -> where('name', 'LIKE', '%' . $search . '%');
                });
        } 
        $org_role  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.organization_role.index',compact('org_role'));
    }   

    public function create()
    {  
        $department = Department::where('is_active',1)->orderBy('name', 'ASC')->get();
        $designation = Designation::where('is_active',1)->orderBy('name', 'ASC')->get();
        return view('admin.modules.organization_role.add',compact('department','designation'));
    }

    
    public function store(Request $request)
    {
         $orgRoleValidation = $request->validate([
            'organization_role_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'department_id' =>'bail|required',
            'designation_id' =>'bail|required'

        ]); 
        
        try{

          
            DB::beginTransaction();
            $org_role = new OrganizationRole;
            $org_role->name = $request->organization_role_name;
            $org_role->department_id = $request->department_id;
            $org_role->designation_id = $request->designation_id;
            $org_role->created_by = Auth::id();
            $org_role->uuid = \Str::uuid();
          
            $res = $org_role->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','organization role create successfully');
            return redirect()->route('organization_role.index');
           
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:OrganizationRoleController function:store");
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
        
        $post = OrganizationRole::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } else {
            $department = Department::where('is_active',1)->orderBy('name', 'ASC')->first();
            $designation = Designation::where('is_active',1)->orderBy('name', 'ASC')->first();
            $org_role = OrganizationRole::where('uuid',$id)->first();
            return view('admin.modules.organization_role.show',compact('department','designation','org_role'));
        }
    }
   
    
    public function edit($id)
    {
        $post = OrganizationRole::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } else {

            $department=Department::where('is_active',1)->orderBy('name', 'ASC')->get();
            $designation=Designation::where('is_active',1)->orderBy('name', 'ASC')->get();
            $org_role = OrganizationRole::where('uuid',$id)->first();
            return view('admin.modules.organization_role.edit',compact('department','designation','org_role'));
        }    

    }
    

    public function update(Request $request, $id)
    {
         $orgRoleUpdateValidation= $request->validate([
            'organization_role_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'department_id'=>'bail|required',
            'designation_id'=>'bail|required', 

        ]); 

        try{

                DB::beginTransaction();
                $org_role = OrganizationRole::where('uuid',$id)->first();
                if( is_null($org_role) ) {

                    return view('errors.404');
                
                }
                $org_role->name = $request->organization_role_name;
                $org_role->department_id = $request->department_id;
                $org_role->designation_id = $request->designation_id;
                $org_role->updated_by = Auth::id();
                $res = $org_role->save();

                if(!$res)
                {
                    DB::rollback();
                    Session::flash('danger','Internal server error please try again later.');
                    return redirect()->back();
                }
                DB::commit();
                Session::flash('success','organization role update  successfully');
                return redirect()->route('organization_role.index');
         
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:OrganizationRoleController function:update");
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
            DB::beginTransaction();
            $org_role = OrganizationRole::where('uuid',$id)->first();
            if( is_null($org_role) ) {

                return view('errors.404');
            
            }
            $org_role->is_active = 0;
            $org_role->updated_by = Auth::id();
            $res = $org_role->update();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
                
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','designation delete successfully');
            return redirect()->route('organization_role.index');
            

        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:OrganizationRoleController function:delete");
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
