@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-default" style="opacity: 0.95">
         
                          <div class="panel-body">
                          <div class="box-body">
              <div class="col col-md-10 col-md-offset-1">
                 <div class="box box-info">
                 <div class="box-header with-border">
                 <h3 class="box-title">Personal Information</h3>
                  {{ Form::model($users,array('route'=>array('user.update',$users->id),'method'=>'put','files'=>true),['class'=>'form-horizontal'])}}

                  <div class="box-body">
                      <div class="form-group">
                      {{ Form::label('name','Name',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::text('name',$users->title,['class'=>'form-control'])}}
                        {!! $errors->first('name', '<p class="error">:message</p>') !!}
                        </div>
                      </div>
            <br><br><br>
                      <div class="form-group">
                      {{ Form::label('email','Email',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::email('email',$users->email,['class'=>'form-control'])}}
                        {!! $errors->first('email', '<p class="error">:message</p>') !!}
                        </div>
                      </div>
            <br><br>
      

            <div class="form-group">
                      {{ Form::label('picture','Picture',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::file('image',['class'=>'form-control'])}}
                        {!! $errors->first('image', '<p class="error">:message</p>') !!}
                        </div>
                      </div>
            <br><br>

                    <div class="form-group">
                         {{ Form::submit('Update',['class'=>'btn btn-danger btn-lg pull-right'])}}
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

 <!-- Title -->
     
</div>

        <hr>
@endsection