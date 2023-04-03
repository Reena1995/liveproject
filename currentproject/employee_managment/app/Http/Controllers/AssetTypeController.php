<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AssetType;
use App\Models\AssetSubType;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class AssetTypeController extends Controller
{
    public function index(Request $request)
    {
        $query = AssetType::query();
        if($request->has('search')){
            $query->where ( 'type', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $asstype  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.asset_type.index',compact('asstype'));
    }   


    public function create()
    {
       return view('admin.modules.asset_type.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $asstypeValidation= $request->validate([
            'asset_type'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $asstype = new AssetType;
            $asstype->type = $request->asset_type;
            $asstype->uuid = \Str::uuid();
            $asstype->created_by = Auth::id();
          
            $res = $asstype->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','asset brand create successfully');
            return redirect()->route('asset_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetTypeController function:store");
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
        $post = AssetType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $asstype = AssetType::where('uuid',$id)->first();
            return view('admin.modules.asset_type.show',compact('asstype'));
         
    }

    
    public function edit($id)
    {
        $post = AssetType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $asstype = AssetType::where('uuid',$id)->first();
            return view('admin.modules.asset_type.edit',compact('asstype'));
          
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $asstypeUpdateValidation = $request->validate([
            'asset_type'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $asstype = AssetType::where('uuid',$id)->first();

            if( is_null($asstype) ) {

                return abort(404);
    
            } 

            $asstype -> type = $request->asset_type;
            $asstype->updated_by = Auth::id();
            $res = $asstype ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','asset type update successfully');
            return redirect()->route('asset_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetTypeController function:update");
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
           $asstype = AssetType::where('uuid',$id)->first();

           if( is_null($asstype) ) {

                return view('errors.404');

            }
          
            AssetSubType::where('asset_type_id',$asstype->id)->update(['is_active'=>'0']);
            $asstype->is_active = 0;
            $asstype->updated_by  = Auth::id();
            $res = $asstype->update();

            if(!$res)
            { 
                DB::rollback();

                Session::flash('danger','Internal server error please try again later.');

                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','asset type delete successfully');
            return redirect()->route('asset_type.index');
        
           
       } catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetTypeController function:delete");
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



      

    
    public function destroy($id)
    {
        //
    }
}
