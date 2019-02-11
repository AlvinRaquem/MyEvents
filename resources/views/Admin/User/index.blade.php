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
     <div class="col-md-6 pull-right">
                   <div class="box-header">
      
                 <div class="col-md-6 pull-right">
      {{ Form::open(['method'=>'GET','url'=>'users/Search']) }}
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
    </section>
    <section class="content">
<div class="row">
<div class="col-xs-12">

  <div class="box">
  <div class="row">
            

      
            </div>
  </div>

            <!-- /.box-header -->         
             <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--<th>ID</th>-->
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th style="width:20px"></th>
                  <th style="width:20px"></th>
                  
                </tr>
                </thead>
                <tbody>
                @if(count($users))
                @foreach($users as $user)
                <tr class="item{{$user->id}}">
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
             <td>{{ $user->role}}</td>
           
            <td align="center">
             {{  Html::linkroute('admin.users.edit','Make Admin',array($user->id),['class'=>'btn btn-warning glyphicon glyphicon-edit']) }}</td>
            <td align="center">
            {{ Form::open(array('route' => array('admin.users.destroy', $user->id), 'method' => 'delete', 'class' => 'destroy')) }}
            {{ Form::submit('Delete',['class'=>'btn btn-danger glyphicon-trash']) }}
            {{ Form::close() }}
            </td>           
                                 </tr>
                @endforeach
                @endif

                </tbody>
              </table>
                      <!--<div class="container">-->
                     
                      <div class="row">
                        <div class="col col-md-2">
                        <br>
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to {{$users->count()}} of {{$users->total() }} entries</div>
                        </div>
                      <div class="col col-md-4 col-md-offset-6 text-right">
                        {{ $users->links() }}
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