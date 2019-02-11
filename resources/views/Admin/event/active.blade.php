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
      <h1><a href="/Active/Events">
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
      
           <div class="col-md-6 pull-right">
                  <div class="box-header">
    
                 <!-- search form -->
                   <div class="col-md-6 pull-right">
      {!! Form::open(['method'=>'GET','url'=>'Active/Events/Search']) !!}
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

            <!-- /.box-header -->          <div class="box-body" style="overflow-x:auto;">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--<th>ID</th>-->
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
                @if(count($event))
                @foreach($event as $events)
                <tr class="item{{$events->id}}">
                  <td align="center">
             {{  Html::linkroute('admin.events.show','View',array($events->id),['class'=>'btn btn-success glyphicon glyphicon-eye-open']) }}</td>
      
                  <td>{{ $events->title}}</td>
                  <td>{{ $events->date}}</td>
                  <td>{{ $events->time}}</td>
                  <td>{{ $events->place}}</td>
                  <td>{{ $events->category->category}}</td>
                  <td>{{ $events->body}}</td>
                  <td>{{ $events->image}}</td>
                  <td>{{ $events->status}}</td>
                  
                </tr>
                @endforeach
                @endif

                </tbody>
              </table>
                      <!--<div class="container">-->
                     
                      <div class="row">
                        <div class="col col-md-2">
                        <br>
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to {{$event->count()}} of {{$event->total() }} entries</div>
                        </div>
                      <div class="col col-md-4 col-md-offset-6 text-right">
                        {{ $event->links() }}
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