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

 <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Event Features</h3>
            </div>
        </div>

        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center" style="opacity: 0.9">
            @foreach($events as $event)
            <div class="col-md-3 col-sm-6 hero-feature photo">
                <div class="thumbnail">
                    <img src="{{asset('img/'.$event->image)}}" alt="Featured Image"/>
                    <div class="caption">
                        <h3 class="truncate">{{$event->title}}</h3>
                        
                <p class="truncate">When : {{ date('M j,Y',strtotime($event->date))}} at {{date('h:ia',strtotime($event->time))}}</p>
                <p class="truncate">Where : {{$event->place}}</p>
                        <p><small class="truncate">Posted By {{$event->user->name}}</small></p>
                        <p>
              
                    {{  Html::linkroute('event.user.show','View Event',array($event->id),['class'=>'btn btn-danger btn-block']) }}
                        </p>
                    </div>
                </div>
            </div>
         

            @endforeach


    </div>
</div>

        <hr>
@endsection