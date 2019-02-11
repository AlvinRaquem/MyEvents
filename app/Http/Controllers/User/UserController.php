<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use Request as search;
use App\Http\Controllers\Controller;
use App\Event;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Storage;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $events=Event::Orderby('id','desc')->where('status',1)->take(4)->get();
        return view('User.index',compact('events'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function searchevent()
    {
        
      $search = search::get('search');
      $categories=Category::All();
      $eventss = Event::where('title','like','%'.$search.'%')->orderBy('id')->where('status','1')->paginate(8);
      return view('User.events_index',compact('eventss','categories'));
   
    }

    public function searchbycateg()
    {
     
      $search = search::get('search');
      $categories=Category::All();
      $eventss = Event::where('title','like','%'.$search.'%')->orderBy('id')->where('status',1)->paginate(8);
        
        return view('User.events_index',compact('eventss','categories'));
      

   
    }

    public function getevents()
    {
        $eventss=Event::Orderby('id','desc')->where('status',1)->paginate(8);
        $categories=Category::All();
        return view('User.events_index',compact('eventss','categories'));
    
       
    }

       public function geteventsbycategory(Request $request,$id)
    {
        $categories=Category::All();
        $eventss=Event::Orderby('id','desc')->where('category_id',$request->category_id)->where('status',1)->paginate(8);
        return view('User.events_category',compact('categories','eventss'));
    
       
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
        if ($events->status==1){
        return view('User.view',compact('events'));
          }else
        {
            return Redirect::route('events.index');
        }
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

        $users=User::findorFail($id);
        if ($users->id==Auth::user()->id){
        return view('updateuserinfo',compact('users'));
        }else
        {
             return Redirect::route('events.index');
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
        $user=User::FindorFail($id);
        if ($user->id==Auth::user()->id){
        $data=Input::all();

        if ($request->email==$user->email){
        $validator=Validator::make($data, User::$samerules);    
        }else{
        $validator=Validator::make($data, User::$rules);
    }
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $user->name=$request->name;


        $user->email=$request->email;
        
        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalName();
            $fileextension=pathinfo($filename,PATHINFO_EXTENSION);
            $request->file('image')->move("img/",$filename);
            $oldname=$user->img;
            $user->img=$filename;
            if ($oldname!='default.jpg'){
            Storage::delete($oldname);
        }
        }

        $user->save();
        return Redirect::route('user.home');
         }else
        {
            return Redirect::back();
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
    }
}
