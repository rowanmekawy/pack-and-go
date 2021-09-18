<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
	protected $table = 'admins';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'Phone_Number', 'Registration_ID', 'blocked', 'Company_Name	', 'email', 'password'
	];
}
