<?php

namespace App\Http\Controllers\Organizer;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
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
        //
        $events=Event::Orderby('id','desc')->where('user_id',Auth::User()->id)->paginate(10);
        return view('Organizer.index',compact('events'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Organizer.create');
    }


    public function searchevent()
    {
      $search = search::get('search');
      $events = Event::where('title','like','%'.$search.'%')->where('user_id',Auth::user()->id)->orderBy('id')->paginate(10);
      return view('Organizer.index',compact('events'));
   

    }

    public function store(Request $request)
    {
        $data=Input::all();
        $validator=Validator::make($data, Event::$rules);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $event=new Event;
        $event->title=$request->title;
        $event->date=$request->date;
        $event->time=$request->time;
        $event->category_id=$request->category;
        $event->user_id=Auth::user()->id;
        $event->body=$request->body;
        $event->place=$request->place;

        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalName();
            $request->file('image')->move("img/",$filename);
            $event->image=$filename;
        }

        $event->save();
        return Redirect::route('organizer.home');
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

        $events=Event::FindorFail($id);
        if ($events->user_id==Auth::user()->id){
        return view('organizer.view',compact('events'));
        }else
        {
             return Redirect::route('organizer.home');
        }

    }

 

    public function edit($id)
    {
        //
        $events=Event::FindorFail($id);
        if ($events->user_id==Auth::user()->id){
        return view('organizer.edit',compact('events'));
         }else
        {
                   return Redirect::route('organizer.home');
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
        $event=Event::FindorFail($id);
        if ($event->user_id==Auth::user()->id){
        $data=Input::all();
        $validator=Validator::make($data, Event::$rules);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $event->title=$request->title;
        $event->date=$request->date;
        $event->time=$request->time;
        $event->category_id=$request->category;
        $event->user_id=Auth::user()->id;
        $event->body=$request->body;
        $event->place=$request->place;

        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalName();
            $request->file('image')->move("img/",$filename);
            $oldname=$event->image;
            $event->image=$filename;
            Storage::delete($oldname);
        }

        $event->save();
        return Redirect::route('organizer.home');
           }else
        {
              return Redirect::route('organizer.home');
        }
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
          if ($events->user_id==Auth::user()->id){
         $events->delcomment()->delete();
         $pics=$events->image;
         storage::delete($pics);
         $events->delete();
        return Redirect::route('organizer.home');
           }else
        {
              return Redirect::route('organizer.home');
        }
}
}
