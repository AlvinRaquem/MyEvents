@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                  <div class="panel panel-default" style="opacity: 0.8">
         
                          <div class="panel-body">
                          <div class="col-md-2">
                          <img class="img-circle" width="120px" height="120px" src="{{asset('img/'.Auth::user()->img)}}" alt="Featured Image"/>
                          </div>
                             <h3><b>Welcome Back {{Auth::user()->name}}</b></h3>
                                <p>{{Auth::user()->email}}</p>
                                {{  Html::linkroute('user.edit','Update Picture',array(Auth::user()->id)) }}
                                </div>

                                
                             </div>


                    </div>
            </div>
            </div>
            <div class="container">

 <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary" style="opacity: 0.8">
                <h3>Admin Dashboard/Home</h3>
                </div>
            </div>
        </div>


        <!-- Page Features -->
        <div class="row text-center" style="opacity: 0.85">

            <div class="col-md-3 col-sm-6 hero-feature photo">
            <a class="btn btn-primary" href="{{route('admin.category.index')}}">
                <div class="thumbnail">
                    <img src="img2/category.jpg" alt="">
                    <div class="caption">
                        <h3>Category</h3>
                        
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature photo">
            <a class="btn btn-default" href="{{route('admin.users.index')}}">
                <div class="thumbnail">
                    <img src="img2/user.png" alt="">
                    <div class="caption">
                        <h3>Users</h3>
                        
                    </div>
                </div>
                </a>
            </div>

             <div class="col-md-3 col-sm-6 hero-feature photo">
            <a class="btn btn-success" href="{{route('admin.events.active')}}">
                <div class="thumbnail">
                    <img src="img2/active.jpg" alt="">
                    <div class="caption">
                        <h3>Active Events</h3>
                        
                    </div>
                </div>
                </a>
            </div>

             <div class="col-md-3 col-sm-6 hero-feature photo">
            <a class="btn btn-danger" href="{{route('admin.events.index')}}">
                <div class="thumbnail">
                    <img src="img2/pending.jpg" alt="">
                    <div class="caption">
                        <h3>Pending Events</h3>
                        
                    </div>
                </div>
                </a>
            </div>
        </div>
        <!-- /.row -->

        <hr>
         



    </div>
        </div>
</div>

        <hr>
@endsection