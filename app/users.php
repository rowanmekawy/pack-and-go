<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
	protected $table = 'users';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'Phone_Number', 'gender', 'blocked', 'name', 'email', 'password', 'birth_day'
	];
}
