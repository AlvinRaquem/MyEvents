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
                          <div class="col col-md-6">
                             <h3><b>Welcome Back {{Auth::user()->name}}</b></h3>
                                <p>{{Auth::user()->email}}</p>
                                {{  Html::linkroute('user.edit','Update Picture',array(Auth::user()->id)) }}
                                </div>

                               <div class="col-md-6 pull-right">
                  <div class="box-header">
                 <!-- search form -->
                   <div class="col-md-6 pull-right">
      {!! Form::open(['method'=>'GET','url'=>'Events/lists/search']) !!}
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



      <!-- /.search form -->




      
            </div>
      
                                </div> 

                                

                             </div>


                    </div>
            </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3" style="opacity: 0.9">
                <div class="list-group">
                    <p class="list-group-item active">Category</p>

                    <a href="{{route('events.index')}}" class="list-group-item" align="center">All</a>

                    @foreach($categories as $category)
             
                    {{ Form::open(array('route' => array('events.category', $category->category)))}}
                    {{ Form::hidden('category_id',$category->id)}}
                    {{ Form::submit($category->category,['class'=>'list-group-item btn-block'])}}
                    {{ Form::close()}}   
                    @endforeach
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <div class="row text-center" style="opacity: 0.9">
            @foreach($eventss as $event)
            <div class="col-md-3 col-sm-6 hero-feature photo">
                <div class="thumbnail">
                    <img src="{{asset('img/'.$event->image)}}" alt="Featured Image"/>
                    <div class="caption">
                        <h4 class="truncate">{{$event->title}}</h4>
                        
                        <p><small class="truncate">Posted By {{$event->user->name}}</small></p>
                        <p>
                  {{  Html::linkroute('event.user.show','View Event',array($event->id),['class'=>'btn btn-danger btn-block']) }}
                        </p>
                    </div>
                </div>
            </div>
         

            @endforeach
         
            </div>
            
                      <div class="row">
                        <div class="col col-md-2">
                        <br>
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to {{$eventss->count()}} of {{$eventss->total() }} entries</div>
                        </div>
                      <div class="col col-md-4 col-md-offset-6 text-right">
                        {{ $eventss->links() }}
                        </div>
                    </div>
       
        </div>
        <!-- /.row -->
        
        <hr>

</div>

@endsection