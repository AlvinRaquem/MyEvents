<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

       public static $rules = [

    		'comment' => 'required|max:10000',
    		//'image' => 'sometimes|image',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function event()
    {
    	return $this->belongsTo('App\Event');
    }

}
