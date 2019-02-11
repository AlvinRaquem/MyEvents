<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
	public static $rules=[
	'category'=>'required',
	];
    public function event()
    {
    	return $this->hasMany('App\Event');
    }
}
