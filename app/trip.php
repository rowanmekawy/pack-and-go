<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
	protected $table = 'trips';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'trip_id', 'Price', 'Number_of_Seats', 'Available_Seats', 'Location_To', 'Location_from', 'Admin_Email', 'Check_In', 'Check_Out', 'Description'

	];
}
