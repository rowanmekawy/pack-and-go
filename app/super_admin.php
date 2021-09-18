<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class super_admin extends Model
{
    protected $table = 'super_admins';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		 'name', 'email', 'password', 'Phone_Number'
	];
}
