<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use session;
use Validate;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'email'=>'required',
            'password' => 'required'
            

        ]); 

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];


        if (Auth::attempt($credentials)) {
            if(auth()->user()->role_id == 1){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('employee.dashboard');
            }
        }
        return 'Failure';
    }


    public function logout()
    {
        
            Auth::logout();
            return  redirect()->route('login');  
              
	    
    }
   
    
   
    
}
