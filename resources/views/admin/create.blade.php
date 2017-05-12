@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create A Employee</div>

                <div class="panel-body">
                  
                    {!! Form::open(array('route' => 'users.store')) !!}
                        
                        <div class="form-group">
                            {!! Form::label('name','Enter Name') !!}
                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                        </div>
                      <div class="form-group">
                            {!! Form::label('email','Enter Email') !!}
                            {!! Form::email('email',null,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password','Enter Password') !!}
                            {!! Form::password('password',['class' => 'form-control']) !!}
                        </div>
                       
                        
                        <div class="form-group">
                            
                            {!! Form::button('create',['type' =>'submit', 'class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
