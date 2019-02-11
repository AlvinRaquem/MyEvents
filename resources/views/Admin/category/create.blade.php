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



    <section class="content">
<div class="row">
<div class="col-xs-12">

  <div class="box">
  <div class="row">
         
<div class="container">
    <div class="row">
            <div class="col-lg-6 col-md-offset-3">
                  <div class="panel panel-default" style="opacity: 0.95">
         
                          <div class="panel-body">
                                  <div class="box-body">
              <div class="col col-md-10 col-md-offset-1">
                 <div class="box box-info">
                 <div class="box-header with-border">
                 <h3 class="box-title"></h3>
                  {!!Form::open(array('route'=>'admin.category.store'),['class'=>'form-horizontal'])!!}
                  <div class="box-body">
                      <div class="form-group">
                      {{ Form::label('category','Category',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::text('category','',['class'=>'form-control'])}}
                        {!! $errors->first('category', '<p class="error">:message</p>') !!}
                        </div>
                      </div>

                    <div class="form-group">
                         {{ Form::submit('Save',['class'=>'btn btn-primary btn-lg pull-right'])}}
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