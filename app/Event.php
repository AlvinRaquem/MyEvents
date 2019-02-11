<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //


    public static $rules = [

    		'title' => 'required|max:50',
    		'date' => 'required',
    		'time' => 'required',
    		'body' => 'required|between:5,10000',
    		//'image' => 'sometimes|image',
            'place' =>'required|max:255',
    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment')->orderBy('id','desc')->paginate(10);
    }

    public function delcomment()
    {
        return $this->hasMany('App\Comment');
    }
}
