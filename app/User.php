<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public static $rules = [

            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
    ];

     public static $samerules = [

            'name' => 'required|max:50',
            'email' => 'required|email',
    ];

    public function event()
    {
        return $this->hasMany('App\Event');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
