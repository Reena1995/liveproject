<?php

namespace App\Http\Controllers;
use App\Models\CurrentResidenceType;
use Illuminate\Http\Request;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class CurrentResidenceTypeController extends Controller
{
    public function index(Request $request)
    {
       
        $query = CurrentResidenceType::query();
        if($request->has('search')){
            $query->where ( 'type', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $resitype  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.current_residence_type.index',compact('resitype'));

    }   

    public function create()
    {
       return view('admin.modules.current_residence_type.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $resitypeValidation= $request->validate([
            'current_residence_type_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $resitype = new CurrentResidenceType;
            $resitype->type = $request->current_residence_type_name;
            $resitype->created_by = Auth::id();
            $resitype->uuid = \Str::uuid();
          
            $res = $resitype->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','current_residence_type create successfully');
            return redirect()->route('current_residence_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:CurrentResidenceTypeController function:store");
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
        $post = CurrentResidenceType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $resitype = CurrentResidenceType::where('uuid',$id)->first();
            return view('admin.modules.current_residence_type.show',compact('resitype'));

        
    }

    
    public function edit($id)
    {
        $post = CurrentResidenceType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $resitype = CurrentResidenceType::where('uuid',$id)->first();
            return view('admin.modules.current_residence_type.edit',compact('resitype'));
           
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $resitypeUpdateValidation = $request->validate([
            'current_residence_type_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $resitype = CurrentResidenceType::where('uuid',$id)->first();
            if( is_null($resitype) ) {

                return view('errors.404');
            
            }
            $resitype -> type = $request->current_residence_type_name;
            $resitype->updated_by = Auth::id();
            $res = $resitype ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','current_residence_type update successfully');
            return redirect()->route('current_residence_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:CurrentResidenceTypeController function:update");
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
           $resitype = CurrentResidenceType::where('uuid',$id)->first();
           if( is_null($resitype) ) {

            return view('errors.404');
        
            }
           $resitype->is_active = 0;
           $resitype->updated_by = Auth::id();
           $res = $resitype->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','current_residence_type delete successfully');
           return redirect()->route('current_residence_type.index');
          
        }catch (\Illuminate\Database\QueryException $e) {
        Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
        Log::info('Error Code: ' . $e->getCode());
        Log::info('Error Message: ' . $e->getMessage());
        Log::info("Exiting class:CurrentResidenceTypeController function:delete");
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
    
}
