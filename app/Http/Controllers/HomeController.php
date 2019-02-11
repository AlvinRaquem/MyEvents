<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role=="organizer"){

            return Redirect::route('organizer.home');
        }else if (Auth::user()->role=="user"){
            return Redirect::route('user.home');
        }
        return view('Admin.index');
  
    }
}
