@extends('layouts.app')

@section('content')

<br>


<div class="container">
    <div class="row">
            <div class="col-lg-12">
                  <div class="panel panel-default" style="opacity: 0.9">
         
                  <div class="panel-body">
    
      <div class="box-body">
              <div class="col col-md-10 col-md-offset-1">
                 <div class="box box-info">
                 <div class="box-header with-border">
                 <h3 class="box-title">Event Information</h3>
                  {!!Form::open(array('route'=>'event.event.store','files'=>true))!!}
                  <div class="box-body">
                      <div class="form-group">
                      {{ Form::label('title','Title',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::text('title','',['class'=>'form-control'])}}
                        {!! $errors->first('title', '<p class="error">:message</p>') !!}
                        </div>
                      </div>
            <br><br><br>
                      <div class="form-group">
                      {{ Form::label('date','Date',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::date('date','',['class'=>'form-control'])}}
                        {!! $errors->first('date', '<p class="error">:message</p>') !!}
                        </div>
                      </div>
            <br><br>
            <div class="form-group">
                      {{ Form::label('time','Time.',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::time('time','',['class'=>'form-control'])}}
                        {!! $errors->first('time', '<p class="error">:message</p>') !!}
                        </div>
                      </div>
            <br><br>

            <div class="form-group">
                      {{ Form::label('place','Location.',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::text('place','',['class'=>'form-control'])}}
                        {!! $errors->first('place', '<p class="error">:message</p>') !!}
                        </div>
                      </div>
            <br><br>
            <div class="form-group">
                      {{ Form::label('category','Category',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::select('category',App\Category::pluck('category','id'),'',['class'=>'form-control'])}}
                        </div>
                      </div>
            <br><br>
           
            <div class="form-group">
                      {{ Form::label('image','Featured Image',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::file('image',['class'=>'form-control'])}}
                        {!! $errors->first('image', '<p class="error">:message</p>') !!}
                        </div>
                      </div>
            <br><br>
             <div class="form-group">
                      {{ Form::label('body','Body',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-10">
                        {{ Form::textarea('body','',['class'=>'form-control'])}}
                        {!! $errors->first('body', '<p class="error">:message</p>') !!}
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
      

@endsection