<?php

namespace App\Http\Controllers;
use App\Models\ModeOfTransportation;
use Illuminate\Http\Request;
use DB;
use Log;
use Auth;
use Session;
use Validate;


class ModeOfTransportationController extends Controller
{
    public function index(Request $request)
    {
        $query = ModeOfTransportation::query();
        if($request->has('search')){
            $query->where ( 'type', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $modetype  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.mode_of_transportation.index',compact('modetype'));
    }   

    public function create()
    {
       return view('admin.modules.mode_of_transportation.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $modetypeValidation= $request->validate([
            'mode_of_transportation_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $modetype = new ModeOfTransportation;
            $modetype->type = $request->mode_of_transportation_name;
            $modetype->created_by = Auth::id();
            $modetype->uuid = \Str::uuid();
          
            $res = $modetype->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','mode of transportation create successfully');
            return redirect()->route('mode_of_transportation.index');
          

        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:ModeOfTransportationController function:store");
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
        $post = ModeOfTransportation::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $modetype = ModeOfTransportation::where('uuid',$id)->first();
            return view('admin.modules.mode_of_transportation.show',compact('modetype'));
        
    }

    
    public function edit($id)
    {
        $post = ModeOfTransportation::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $modetype = ModeOfTransportation::where('uuid',$id)->first();
            return view('admin.modules.mode_of_transportation.edit',compact('modetype'));
       
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $modetype = $request->validate([
            'mode_of_transportation_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $modetype = ModeOfTransportation::where('uuid',$id)->first();
            if( is_null($modetype) ) {

                return view('errors.404');
            
            }
            $modetype -> type = $request->mode_of_transportation_name;
            $modetype->updated_by = Auth::id();
            $res = $modetype ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','mode of transportation update successfully');
            return redirect()->route('mode_of_transportation.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:ModeOfTransportationController function:update");
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
           $modetype = ModeOfTransportation::where('uuid',$id)->first();
           if( is_null($modetype) ) {

                return view('errors.404');
        
            }
           $modetype->is_active = 0;
           $modetype->updated_by = Auth::id();
           $res = $modetype->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','mode of transportation delete successfully');
           return redirect()->route('mode_of_transportation.index');
          


       }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:ModeOfTransportationController function:delete");
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
