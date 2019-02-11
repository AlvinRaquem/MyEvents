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
    <div class="row">
            <div class="col-lg-12">
                  <div class="panel panel-default" style="opacity: 0.95">
         
                          <div class="panel-body">



    <section class="content-header">
    <a href="/">
      <h1>
        Events</a>
        <small>list</small>
      </h1>

      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>
    <section class="content">
<div class="row">
<div class="col-xs-12">

  <div class="box">
  <div class="row">
            <div class="col-md-6">

                   <div class="box-header">
                       <h3 class="box-title"><a href="{{route('event.event.create')}}" class="btn btn-primary">
                             <span class="glyphicon glyphicon-plus"></span>Add Event
                           </a></h3>

                         </div>
               </div>
           <div class="col-md-6 pull-right">
                  <div class="box-header">
                 <!-- search form -->
                 <div class="col-md-6 pull-right">
      {!! Form::open(['method'=>'GET','url'=>'organizer/home/search']) !!}
      <div class="input-group custom-search-form">
        <input type="text" name="search" class="form-control" placeholder="Search ....">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
      {!! Form::close() !!}
    </div>
    </div>
            </div>
      
            </div>
  </div>

            <!-- /.box-header -->          <div class="box-body" style="overflow-x:auto;">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--<th>ID</th>-->
                  <th style="width:20px"></th>
                  <th style="width:20px"></th>
                  <th style="width:20px"></th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Location</th>
                  <th>Category</th>
                  <th>Body</th>
                  <th>Image</th>
                  <th>Status</th>
                  
                </tr>
                </thead>
                <tbody>
                @if(count($events))
                @foreach($events as $event)
                <tr class="item{{$event->id}}">
                  <td align="center">
             {{  Html::linkroute('event.event.show','View',array($event->id),['class'=>'btn btn-success glyphicon glyphicon-eye-open']) }}</td>
            
            <td align="center">
             {{  Html::linkroute('event.event.edit','Edit',array($event->id),['class'=>'btn btn-warning glyphicon glyphicon-edit']) }}</td>
            
            <td align="center">
            {{ Form::open(array('route' => array('event.event.destroy', $event->id), 'method' => 'delete', 'class' => 'destroy')) }}
            {{ Form::submit('Delete',['class'=>'btn btn-danger glyphicon-trash']) }}
            {{ Form::close() }}
          </td>           
                  <td>{{ $event->title}}</td>
                  <td>{{ $event->date}}</td>
                  <td>{{ $event->time}}</td>
                  <td>{{ $event->place}}</td>
                  <td>{{ $event->category->category}}</td>
                  <td>{{ $event->body}}</td>
                  <td>{{ $event->image}}</td>
                  <td>{{ $event->status}}</td>
                  
                </tr>
                @endforeach
                @endif

                </tbody>
              </table>
                      <!--<div class="container">-->
                     
                      <div class="row">
                        <div class="col col-md-2">
                        <br>
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to {{$events->count()}} of {{$events->total() }} entries</div>
                        </div>
                      <div class="col col-md-4 col-md-offset-6 text-right">
                        {{ $events->links() }}
                        </div>
                    </div>
                    <!--</div>-->
            </div>
</div>
</div>
</div>

</section>
    
                      </div>
                </div>    
            </div>
      </div>
</div>
@endsection