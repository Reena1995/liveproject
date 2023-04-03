<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Language;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        
        $query = Language::query();
        if($request->has('search')){
            $query->where ( 'name', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $language  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.language.index',compact('language'));
    }   

    public function create()
    {
       return view('admin.modules.language.add');
    }

    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $languageValidation= $request->validate([
            'language_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            

        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $language = new Language;
            $language->name = $request->language_name;
            $language->created_by = Auth::id();
            $language->uuid = \Str::uuid();
          
            $res = $language->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','Languages create successfully');
            return redirect()->route('language.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:LanguageController function:store");
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
        $post =  Language::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $language = Language::where('uuid',$id)->first();
            return view('admin.modules.language.show',compact('language'));
           
    }

    public function edit($id)
    {
        $post =  Language::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $language = Language::where('uuid',$id)->first();
            return view('admin.modules.language.edit',compact('language'));
          
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $langaugeUpdateValidation = $request->validate([
            'language_name'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $language = Language::where('uuid',$id)->first();
            if( is_null($language) ) {

                return view('errors.404');
            
            }
            $language -> name = $request->language_name;
            $language->updated_by = Auth::id();
            $res = $language ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','language update successfully');
            return redirect()->route('language.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:LanguageController function:update");
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
           $language = Language::where('uuid',$id)->first();
           if( is_null($language) ) {

            return view('errors.404');
        
            }
           $language->is_active = 0;
           $language->updated_by = Auth::id();
           $res = $language->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success','Langauge   delete successfully');
           return redirect()->route('language.index');
          


        }catch (\Illuminate\Database\QueryException $e) {
        Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
        Log::info('Error Code: ' . $e->getCode());
        Log::info('Error Message: ' . $e->getMessage());
        Log::info("Exiting class:LanguageController function:delete");
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
