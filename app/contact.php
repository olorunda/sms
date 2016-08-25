<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
	protected $table='contacts';
	protected $fillable = [
		'user_ref', 'street', 'city', 'state', 'state_origin'
	];
}
