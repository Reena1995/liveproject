<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LeaveType;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class LeaveTypeController extends Controller
{
    public function index(Request $request)
    {
       
        $query = LeaveType::query();
        if($request->has('search')){
            $query->where ( 'type', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $leavetype  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.leave_type.index',compact('leavetype'));
    }   

    public function create()
    {
       return view('admin.modules.leave_type.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $leavetypeValidation= $request->validate([
            'leave_type_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $leavetype = new LeaveType;
            $leavetype->type = $request->leave_type_name;
            $leavetype->created_by = Auth::id();
            $leavetype->uuid = \Str::uuid();
          
            $res = $leavetype->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','leave brand create successfully');
            return redirect()->route('leave_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:LeaveTypeController function:store");
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
        $post =  LeaveType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $leavetype = LeaveType::where('uuid',$id)->first();
            return view('admin.modules.leave_type.show',compact('leavetype'));
           
    }

    
    public function edit($id)
    {
        $post = LeaveType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        }

            $leavetype = LeaveType::where('uuid',$id)->first();
            return view('admin.modules.leave_type.edit',compact('leavetype'));
           
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $leavetypeUpdateValidation = $request->validate([
            'leave_type_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $leavetype = LeaveType::where('uuid',$id)->first();
            if( is_null($leavetype) ) {

                return view('errors.404');
            
            }
            $leavetype -> type = $request->leave_type_name;
            $leavetype->updated_by = Auth::id();
            $res = $leavetype ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','leave type update successfully');
            return redirect()->route('leave_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:LeaveTypeController function:update");
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
           $leavetype = LeaveType::where('uuid',$id)->first();
           if( is_null($leavetype) ) {

                return view('errors.404');
        
            }
           $leavetype->is_active = 0;
           $leavetype->updated_by = Auth::id();
           $res = $leavetype->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','leave type  delete successfully');
           return redirect()->route('leave_type.index');
          


       }catch (\Illuminate\Database\QueryException $e) {
        Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:LeaveTypeController function:delete");
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
