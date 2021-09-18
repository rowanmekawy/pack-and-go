<?php

namespace App\Http\Controllers;

use Validator, Redirect, Response;
use Illuminate\Http\Request;
use App\trip;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Session;

class AdminController extends Controller
{


    /*public function insert(){
        $urlData = getURLList();
        return view('welcome');
    }*/
    public function addTrip(Request $request)
    {

        $trip = new trip;
        $trip->Price = $request->price;
        $trip->Number_of_Seats = $request->noseats;
        $trip->Available_Seats = $request->noseats;
        $trip->Location_To = $request->to;
        $trip->Location_from = $request->from;
        $trip->Admin_Email = $request->tripemail;
        $trip->Check_In = $request->checkin;
        $trip->Check_Out = $request->checkout;
        $trip->Description = $request->w3review;
        $trip->save();
        return redirect()->back();
    }
    public function acceptUser(Request $request)
    {
        $register = DB::table('registers')
            ->where([['Trip_ID', '=', $request->trip_id], ['User_Email', '=', $request->email]]);
        $register->update(['Approved' => 1]);
        $register = $register->get();
        $trip = DB::table('trips')
            ->where('trip_id', '=', $register[0]->Trip_ID);
        $trip1 = $trip->get();
        $trip->update(['Available_Seats' => $trip1[0]->Available_Seats - $register[0]->Number_of_people]);

        return redirect()->back();
    }
    public function declineUser(Request $request)
    {
        $register = DB::table('registers')
            ->where([['Trip_ID', '=', $request->trip_id], ['User_Email', '=', $request->email]])
            ->update(['Approved' => -1]);
        return redirect()->back();
    }
}
