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

                <!-- Blog Comments -->

                <!-- Comments Form -->
             <!--    <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> -->

                <div class="well">
                <h4>Leave a Comment:</h4>
                {{ Form::open(['route'=>'comment.store'])}}
                <div class="form-group">
                {{ Form::textarea('comment','',['class'=>'form-control','rows'=>5])}}
                {!! $errors->first('comment', '<p class="error">:message</p>') !!}
                {{ Form::hidden('eventid',$events->id)}}
                </div>
                {{ Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {{ Form::close() }}
                </div>

                <hr>

                <!-- Posted Comments -->
                @foreach($events->comment() as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="{{asset('img/'.$comment->user->img)}}" alt="" width="50px" height="50px" />
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">{{$comment->user->name}}
                            <small>{{ date( 'M j, Y h:ia',strtotime($comment->created_at))}}</small>
                            </h5>
                       {!!$comment->body!!}
                       @if(Auth::user()->id==$comment->user_id)
                     {{ Form::open(array('route' => array('comment.destroy', $comment->id), 'method' => 'delete', 'class' => 'destroy')) }}
                    {{ Form::submit('Delete Comment',['class'=>'btn btn-danger btn-sm']) }}
                    {{ Form::close() }}
                     @endif
                    </div>
                    
                </div>
                <hr>
                 @endforeach


                 <div class="row">
                        
                      <div class="col col-md-4 col-md-offset-6 text-right">
                        {{ $events->comment()->links() }}
                        </div>
                    </div>
                <!-- Comment -->
               <!--  <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. -->
                        <!-- Nested Comment -->
                       <!--  <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div> -->
                        <!-- End Nested Comment -->
                 <!--    </div>
                </div>

 -->
 <hr>
 
            </div>

           </div>
           </div>
           </div>
           </div>
           </div>

        <!-- /.row -->

        <hr>


@endsection