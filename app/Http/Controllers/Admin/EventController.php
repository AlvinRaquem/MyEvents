<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Storage;
use Request as search;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $events=Event::OrderBy('id','desc')->where('status',0)->paginate(10);
        return view('Admin.event.index',compact('events'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activeevents()
    {
        //
        $event=Event::OrderBy('id','desc')->where('status',1)->paginate(10);
        return view('Admin.event.active',compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $events=Event::findorFail($id);
        return view('Admin.event.view',compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $event=Event::findorFail($id);
        $status=$event->status;
        $event->status=1;
        $event->save();
        if ($status==0){
        return Redirect::route('admin.events.index');
        }
        else{
              return Redirect::route('admin.events.active');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $events=Event::FindorFail($id);
        $status=$events->status;
         $events->delcomment()->delete();
         $pics=$events->image;
         storage::delete($pics);
         $events->delete();
         if ($status==0){
       return Redirect::route('admin.events.index');
   }else{
    return Redirect::route('admin.events.active');
   }
    }


      public function searchevent()
    {
      $search = search::get('search');
      $event = Event::where('title','like','%'.$search.'%')->where('status',1)->orderBy('id')->paginate(10);
      return view('Admin.event.active',compact('event'));
    }


    public function searchevent2()
    {
    $search = search::get('search');
    $events = Event::where('title','like','%'.$search.'%')->where('status',0)->orderBy('id')->paginate(10);
    return view('Admin.event.index',compact('events'));
    }
}
