<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetBrand;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class AssetBrandController extends Controller
{

    public function index(Request $request)
    {
        
        $query = AssetBrand::query();
        if($request->has('search')){
            $query->where ( 'name', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $assbrand  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.asset_brand.index',compact('assbrand'));
    }   

    public function create()
    {
       return view('admin.modules.asset_brand.add');
    }

    
    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $assbrandAddValidation= $request->validate([
            'asset_brand'=> 'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $assbrand = new AssetBrand;
            $assbrand->name = $request->asset_brand;
            $assbrand->uuid = \Str::uuid();
            $assbrand->created_by = Auth::id();
          
            $res = $assbrand->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','asset brand create successfully');
            return redirect()->route('asset_brand.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetBrandController function:store");
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
        $post = AssetBrand::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $assbrand = AssetBrand::where('uuid',$id)->first();
            return view('admin.modules.asset_brand.show',compact('assbrand'));
          
    }

    
    public function edit($id)
    {
        $post = AssetBrand::where('uuid',$id)->first();
        if( is_null($post) ) {

            return abort(404);

        } 

        $assbrand = AssetBrand::where('uuid',$id)->first();
        return view('admin.modules.asset_brand.edit',compact('assbrand'));
          
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $assbrandUpdateValidation = $request->validate([
            'asset_brand'=> 'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $assbrand = AssetBrand::where('uuid',$id)->first();
            if( is_null($assbrand) ) {

                return abort(404);
    
            } 
            $assbrand -> name = $request->asset_brand;
            $assbrand->updated_by  = Auth::id();
            $res = $assbrand ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
                         
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','Asset brand updated successfully');
            return redirect()->route('asset_brand.index');
        

        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetBrandController function:update");
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
           $assbrand = AssetBrand::where('uuid',$id)->first();

           if( is_null($assbrand) ) {

                return view('errors.404');

            } 
           $assbrand->is_active = 0;
           $assbrand->updated_by  = Auth::id();
           $res = $assbrand->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','Asset brand  delete successfully');
           return redirect()->route('asset_brand.index');
       
        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:AssetBrandController function:delete");
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
