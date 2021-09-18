<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\trip;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Input;
class userhomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()

    {
        /* select price,from,to
        where from=from, to=to, chech=check*/





     /*  $trip = DB::table('trips')
           ->select('trip_id','Price','trip_id','Price','Check_In','Check_Out')
           ->where('trip_id','=','$user->From')
           ->get();
        //return $trip;*/

       // return view('userhome', ['trips' => $trip]);
         return view('userhome');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function searchResults(Request $request)
    {

        $From = $request->input('From');
        $To = $request->input('To');
        $Checkin = $request->input('Checkin');
        $Checkout = $request->input('Checkout');
        $noOfSeats = $request->input('noOfSeats');

        $trip = DB::table('trips')
            ->select('Location_To','Location_from','Check_In','Check_Out','Price','Description')
            ->where('Location_To','=',$To)
            ->where('Location_from','=',$From)
            ->where('Check_In','>=',$Checkin)
            ->where('Check_Out','<=',$Checkout )
            ->where('Available_Seats','>=',$noOfSeats)
            ->get();
        return view('results',['trips'=>$trip]);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
