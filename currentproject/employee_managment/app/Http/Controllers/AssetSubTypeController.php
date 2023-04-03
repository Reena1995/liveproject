<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AssetSubType;
use App\Models\AssetType;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class AssetSubTypeController extends Controller
{
    public function index(Request $request)
    {
       
        $query =AssetSubType::query();
        if($request->has('search')){
            $search = $request->search;
            $query->where ( 'type', 'LIKE', '%' . $search . '%' )
                ->orWhereHas('ass_type_active', function($q) use ($search){ 
                    $q->where('type', 'LIKE', '%' . $search . '%');
                });
        } 
        $ass_sub_type  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.asset_sub_type.index',compact('ass_sub_type'));
    }   

    public function create()
    {  
        $asstype=AssetType::where('is_active',1)->orderBy('type', 'ASC')->get();
        return view('admin.modules.asset_sub_type.add',compact('asstype'));
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $assSubTypeValidation = $request->validate([
            'asset_sub_type_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'asset_type_id'=>'bail|required'

        ]);
        // dd('AAAA');
        
        try{
            Log::info('bbbbbbb');
            DB::beginTransaction();
            $ass_sub_type = new AssetSubType();
            $ass_sub_type->type = $request->asset_sub_type_name;
            $ass_sub_type->asset_type_id = $request->asset_type_id;
            $ass_sub_type->uuid = \Str::uuid();
            $ass_sub_type->created_by = Auth::id();
            $res = $ass_sub_type->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','asset sub type create successfully');
           
            return redirect()->route('asset_sub_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetSubTypeController function:store");
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
        $post = AssetSubType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } else {

            $ass_type=AssetType::where('is_active',1)->orderBy('type', 'ASC')->first();
            $ass_sub_type=AssetSubType::where('uuid',$id)->first();
            return view('admin.modules.asset_sub_type.show',compact('ass_type','ass_sub_type'));
        }    
    }
   
    

    
    public function edit($id)
    {
        $post = AssetSubType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 
        $ass_type=AssetType::where('is_active',1)->orderBy('type', 'ASC')->get();
        $ass_sub_type = AssetSubType::where('uuid',$id)->first();
        return view('admin.modules.asset_sub_type.edit',compact('ass_type','ass_sub_type'));
         
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
         $assSubTypeUpdateValidation = $request->validate([
            'asset_sub_type_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            'asset_type_id'=>'bail|required',
            

        ]); 
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $ass_sub_type = AssetSubType::where('uuid',$id)->first();

            if( is_null($ass_sub_type) ) {

                return abort(404);
    
            }

            $ass_sub_type->type = $request->asset_sub_type_name;
            $ass_sub_type->asset_type_id = $request->asset_type_id;
            $ass_sub_type->updated_by  = Auth::id();
            $res = $ass_sub_type->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','asset_sub_type update  successfully');
            return redirect()->route('asset_sub_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetSubTypeController function:update");
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
           $ass_sub_type = AssetSubType::where('uuid',$id)->first();

           if( is_null($ass_sub_type) ) {

                return view('errors.404');

            }

           $ass_sub_type->is_active = 0;
           $ass_sub_type->updated_by  = Auth::id();
           $res = $ass_sub_type->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','asset_sub_type delete successfully');
           return redirect()->route('asset_sub_type.index');
        
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetSubTypeController function:delete");
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
