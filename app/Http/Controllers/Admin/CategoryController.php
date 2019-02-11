<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categ=Category::Orderby('id','desc')->paginate(5);
        return view('Admin.category.index',compact('categ'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.category.create');
    }

    



    public function store(Request $request)
    {
        //
        $data=Input::all();
        $Validator=Validator::make($data,Category::$rules);
        if ($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput();
        }
        $category=new Category;
        $category->category=$request->category;
        $category->save();
        return Redirect::route('admin.category.index');
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
        $category=Category::findorFail($id);
        return view('Admin.category.edit',compact('category'));
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
        $category=Category::findorFail($id);
        $data=input::all();
        $Validator=Validator::make($data,Category::$rules);
        if ($Validator->fails())
        {
            return Redirect::back()->withErrors($Validator)->withInput();
        }
        $category->category=$request->category;
        $category->save();
        return Redirect::route('admin.category.index');

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
        $category=Category::findorFail($id);
   
        $category->delete();
        return Redirect::route('admin.category.index');
    }
}
