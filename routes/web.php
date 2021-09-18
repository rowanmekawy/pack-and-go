<?php

use Illuminate\Support\Facades\Route;
use App\trip;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/route/register', 'AuthController@register');


// Route::get('showlogin', 'AuthController@showLogin');

// route to process the form
Route::post('/route/dlogin', 'AuthController@doLogin');
Route::post('/route/dlogin_admin', 'AuthController@doLogin_admin');
Route::post('/route/dlogin_superadmin', 'AuthController@doLogin_superadmin');
Route::post('/route/registeradmin', 'SuperadminController@register');




// route to add trips by admin
Route::post('/route/addtrip', 'AdminController@addTrip');

// route to add trips by admin
Route::post('/route/accept', 'AdminController@acceptUser');

// route to add trips by admin
Route::post('/route/decline', 'AdminController@declineUser');

//   Route::get('dologout','AuthController@doLogout');

Route::get('/', function () {
  return view('welcome');
})->name('welcome');

Route::get('/welcome', function () {
  return view('welcome');
})->name('welcome');

Route::get('/admin&superadmin', function () {
  return view('admin&superadmin');
})->name('admin&superadmin');

Route::get('/registeradmin', function () {
  return view('registeradmin');
})->name('registeradmin');


Route::get('/admin', function () {
  return view('admin');
})->name('admin');


Route::get('/superadmin', function () {
  return view('superadmin');
})->name('superadmin');

Route::get('/userhome', function () {
  return view('userhome');
})->name('userhome');
Route::get('/adminhome', function () {
  return view('admin');
});
Route::get('/addtrips', function () {
  return view('addtrips');
});
Route::get('/loginview', function () {
  return view('loginview');
});
Route::get('/showtrips', function () {
  return view('showtrips', ['trips' => trip::all()]);
});
Route::get('/approve&decline', function () {
  $registers = DB::table('registers')->join('users', 'User_Email', '=', 'email')
    ->join('trips', 'registers.Trip_ID', '=', 'trips.trip_id')
    ->where('Approved', '=', '0')->select(
      'users.name',
      'users.email',
      'users.Phone_Number',
      'registers.Number_of_people',
      'trips.trip_id',
      'trips.Available_Seats'
    )->get();
  return view('approve&decline', ['registers' => $registers]);
});



Route::get('/home', 'HomeController@index')->name('home');



Route::get('/results', function () {
    return view('results');
});

Route::get('/userhome', 'userhomeController@index')->name('userhome');

Route::post('/results', 'userhomeController@searchResults')->name('results');
