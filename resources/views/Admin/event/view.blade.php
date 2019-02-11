@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                  <div class="panel panel-default" style="opacity: 0.95">
         
                  <div class="panel-body">
    
      <div class="box-body">
              <div class="col col-md-10 col-md-offset-1">
 <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-10 col-md-offset-1">

                <!-- Blog Post -->

                <hr>

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Posted on {{ date( 'M j, Y h:ia',strtotime($events->created_at))}}</p>
                <p>Posted by {{$events->user->name}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{asset('img/'.$events->image)}}" alt="">

                <hr>

                <!-- Post Content -->
                <h1 class="lead">{{ $events->title}}</h1>
                
                <p>When : {{$events->date}} at {{$events->time}}</p>
                <p>Where : {{$events->place}}</p>
                <hr>
                {!!$events->body!!}

                <hr>
                <div class="row">
                <div class="container">
                            <div class="col-md-6">
                      {{  Html::linkroute('admin.events.edit','Approve',array($events->id),['class'=>'btn btn-warning  btn-lg glyphicon glyphicon-edit']) }}
                          </div>
                             <div class="col-md-6">
                        {{ Form::open(array('route' => array('admin.events.destroy', $events->id), 'method' => 'delete', 'class' => 'destroy')) }}
                         {{ Form::submit('Delete',['class'=>'btn btn-danger btn-lg glyphicon-trash']) }}
                         {{ Form::close() }}
                             </div>
                    </div>
            </div>
            </div>
            </div>

           </div>
           </div>


           </div>
           </div>
           </div>

        <!-- /.row -->

        <hr>


@endsection