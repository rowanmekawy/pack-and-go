<?php

namespace App\Http\Controllers;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use App\users;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Session;

class AuthController extends Controller
{


    /*public function insert(){
        $urlData = getURLList();
        return view('welcome');
    }*/
    public function register(Request $request)
    {

            $user = new users;
            $user->name = $request->name;
            $user->email = $request->Email;
            $user->password =Hash::make($request->Password) ;
            $user->Phone_Number = $request->phone_number;
            $user->birth_day =  $request->birth_day;
            $field = $request->gender;

            if ($field == "male")
                $user->gender = 1;
            else {
                $user->gender = 0;
            }

            $user->blocked = 0;


            $user->save();
            return redirect()->back();
    
    }


    public function doLogin(Request $request)
    {

        // create our user data for the authentication
  
 

      
  
        // $user = DB::table('users')->where([['email', $input['Email']], ['password', $input['Password']]])->get();

        // return redirect()->route('/loginview');

        //echo $user;
        request()->validate([
            'Email' => 'required',
            'password' => 'required',
            ]);
     
     
       
        $credentials = $request->only('Email', 'password');
       
          // attempt to do the login
          if (Auth::attempt($credentials))
            {
          
            // validation successful
            // do whatever you want on success
            return redirect()->route('userhome');
            }
            else
            {
               
            // validation not successful, send back to form
            return redirect()->route('welcome');
            }
          }



        /*if(auth()->attempt(array('Email' => $input['Email'], 'password' => $input['password'])))
        {
            
        }else{
            return redirect()->route('welcome')
                ->with('error','Email-Address And Password Are Wrong.');
        }*/

        public function doLogin_admin(Request $request)
        {
    
            // create our user data for the authentication
      
            $admin = DB::table('admins')->where([['email','=', $request->email], ['password','=', $request->password]])->get();
            return $admin;
            
            // return redirect()->route('/loginview');
    
            //echo $user;

            request()->validate([
                'email' => 'required',
                'password' => 'required',
                ]);
        
           
              // attempt to do the login
              if ($admin->isNotEmpty())
                {
              
                // validation successful
                // do whatever you want on success
                return redirect()->route('admin');
                }
                else
                {
                   
                // validation not successful, send back to form
                return redirect()->route('welcome');
                }
              }
              

              public function doLogin_superadmin(Request $request)
        {
    
            // create our user data for the authentication
      
            $super_admins = DB::table('super_admins')->where([['email','=', $request->email], ['password','=', $request->password]])->get();
            //return $admin;
            
            // return redirect()->route('/loginview');
    
            //echo $user;

            request()->validate([
                'email' => 'required',
                'password' => 'required',
                ]);
        
           
              // attempt to do the login
              if ($super_admins->isNotEmpty())
                {
              
                // validation successful
                // do whatever you want on success
                return redirect()->route('superadmin');
                }
                else
                {
                   
                // validation not successful, send back to form
                return redirect()->route('welcome');
                }
              }
    }

