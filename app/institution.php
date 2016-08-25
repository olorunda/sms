<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institution extends Model
{
    //
	protected $table="institutions";

	protected $fillable = [
		'user_ref', 'name', 'start_month', 'start_year', 'end_month', 'end_year', 'degree', 'grade'
	];
}
