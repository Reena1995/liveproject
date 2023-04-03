<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use DB;
use Log;
use Auth;
use Session;
use Validate;

class DocumentTypeController extends Controller
{

    public function index(Request $request)
    {
        
        $query = DocumentType::query();
        if($request->has('search')){
            $query->where ( 'type', 'LIKE', '%' . $request->input('search') . '%' );
        }
        $doctype  = $query->where('is_active',1)->paginate(5);
        return view('admin.modules.document_type.index',compact('doctype'));
    }   

    public function create()
    {
       return view('admin.modules.document_type.add');
    }

    public function store(Request $request)
    {
        Log::info('aaaaaaa');
         $doctypeValidation= $request->validate([
            'document_type'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
        
        try{

            Log::info('bbbbbbb');
            DB::beginTransaction();
            $doctype = new DocumentType;
            $doctype->type = $request->document_type;
            $doctype->created_by = Auth::id();
            $doctype->uuid = \Str::uuid();
          
            $res = $doctype->save();

            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','document type create successfully');
            return redirect()->route('document_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:DocumentTypeController function:store");
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
        $post = DocumentType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        } 

            $doctype = DocumentType::where('uuid',$id)->first();
            return view('admin.modules.document_type.show',compact('doctype'));
        
    }

    
    public function edit($id)
    {
        $post = DocumentType::where('uuid',$id)->first();

        if( is_null($post) ) {

            return abort(404);

        }

            $doctype = DocumentType::where('uuid',$id)->first();
            return view('admin.modules.document_type.edit',compact('doctype'));

        
    }

   
    public function update(Request $request, $id)
    {
        Log::info('dddddddd');
        $doctypeUpdateValidation = $request->validate([
            'document_type'=>'bail|required','regex:/(^[A-Za-z0-9 ]+$)+/',
            
        ]); 
       
        try{

            Log::info('eeeeeeee');
            DB::beginTransaction();
            $doctype = DocumentType::where('uuid',$id)->first();
            if( is_null($doctype) ) {

                return abort(404);
    
            }
            $doctype -> type = $request->document_type;
            $doctype->updated_by = Auth::id();
            $res = $doctype ->save();
            
            if(!$res)
            {
                DB::rollback();
                Session::flash('danger','Internal server error please try again later.');
             
            
                return redirect()->back();
            }
            DB::commit();
            Session::flash('success','document type update successfully');
            return redirect()->route('document_type.index');
           


        }catch (\Illuminate\Database\QueryException $e) {
            Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
            Log::info('Error Code: ' . $e->getCode());
            Log::info('Error Message: ' . $e->getMessage());
            Log::info("Exiting class:DocumentTypeController function:update");
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
           $doctype = DocumentType::where('uuid',$id)->first();
           if( is_null($doctype) ) {

            return view('errors.404');
        
            }
           $doctype->is_active = 0;
           $doctype->updated_by = Auth::id();
           $res = $doctype->update();

           if(!$res)
           {
               DB::rollback();
               Session::flash('danger','Internal server error please try again later.');
            
           
               return redirect()->back();
           }
           DB::commit();
           Session::flash('success',' document type delete successfully');
           return redirect()->route('document_type.index');
          
        }catch (\Illuminate\Database\QueryException $e) {
        Log::info('Error occured While executing query for user-id ' . Auth::id() . '. See the log below.');
        Log::info('Error Code: ' . $e->getCode());
        Log::info('Error Message: ' . $e->getMessage());
        Log::info("Exiting class:DocumentTypeController function:delete");
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

    public function destroy($id)
    {
        //
    }
}
