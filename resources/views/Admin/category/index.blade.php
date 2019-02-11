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
      <h1>
        Category
      
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
                       <h3 class="box-title"><a href="{{route('admin.category.create')}}" class="btn btn-primary">
                             <span class="glyphicon glyphicon-plus"></span>Add Category
                           </a></h3>

                         </div>
               </div>
           <div class="col-md-6">
                 
            </div>
  </div>

            <!-- /.box-header -->          <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--<th>ID</th>-->
                  <th>ID</th>
                  <th>category</th>
                  <th style="width:20px"></th>
                  <th style="width:20px"></th>
                  
                </tr>
                </thead>
                <tbody>
                @if(count($categ))
                @foreach($categ as $category)
                <tr class="item{{$category->id}}">
            <td>{{ $category->id}}</td>
            <td>{{ $category->category}}</td>
           
            <td align="center">
             {{  Html::linkroute('admin.category.edit','Edit',array($category->id),['class'=>'btn btn-warning glyphicon glyphicon-edit']) }}</td>
            <td align="center">
            {{ Form::open(array('route' => array('admin.category.destroy', $category->id), 'method' => 'delete', 'class' => 'destroy')) }}
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
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to {{$categ->count()}} of {{$categ->total() }} entries</div>
                        </div>
                      <div class="col col-md-4 col-md-offset-6 text-right">
                        {{ $categ->links() }}
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