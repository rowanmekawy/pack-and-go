<?php

namespace App\Http\Controllers;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use App\admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Session;

class SuperadminController extends Controller
{


    /*public function insert(){
        $urlData = getURLList();
        return view('welcome');
    }*/
    public function register(Request $request)
    {

            $admin = new admin;
            $admin->Registration_ID = $request->regID;
            $admin->email = $request->adminemail;
            $admin->password =Hash::make($request->adminpsw) ;
            $admin->Phone_Number = $request->adminphone;
            $admin->Company_Name = $request->cname;
           
            
            $admin->blocked = 0;


            $admin->save();
            return redirect()->back();
    
    }


   
    }

