<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class EducationLevelController extends Controller
{
    public function index(Request $request)
    {
        
        $query = EducationLevel::query();
        if($request->has('search')){
            $query->where ( 'name', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $edulevel  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.education_level.index',compact('edulevel'));
    }  

    public function create()
    {
       return view('admin.modules.education_level.add');
    }

    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $edulevelValidation= $request->validate([
            'education_level_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $edulevel = new EducationLevel;
            $edulevel->name = $request->education_level_name;
            $edulevel->created_by = Auth::id();
            $edulevel->uuid = \Str::uuid();
          
            $res = $edulevel->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','education level  create successfully');
            return redirect()->route('education_level.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:EducationLevelController function:store");
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
        $post =  EducationLevel::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $edulevel = EducationLevel::where('uuid',$id)->first();
            return view('admin.modules.education_level.show',compact('edulevel'));
           
    }

    
    public function edit($id)
    {
        $post =  EducationLevel::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $edulevel = EducationLevel::where('uuid',$id)->first();
            return view('admin.modules.education_level.edit',compact('edulevel'));
           
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $edulevelUpdateValidation = $request->validate([
            'education_level_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $edulevel = EducationLevel::where('uuid',$id)->first();
            if( is_null($edulevel) ) {

                return view('errors.404');
            
            }
            $edulevel -> name = $request->education_level_name;
            $edulevel->updated_by = Auth::id();
            $res = $edulevel ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','education level  update successfully');
            return redirect()->route('education_level.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:EducationLevelController function:update");
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
           $edulevel = EducationLevel::where('uuid',$id)->first();
           if( is_null($edulevel) ) {

             return view('errors.404');
        
            }
           $edulevel->is_active = 0;
           $edulevel->updated_by = Auth::id();
           $res = $edulevel->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','education level  delete successfully');
           return redirect()->route('education_level.index');
        
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:EducationLevelController function:delete");
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
