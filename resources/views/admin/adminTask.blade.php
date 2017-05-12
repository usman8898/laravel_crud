@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Assign a Task</div>

                <div class="panel-body">
                  
                    {!! Form::open(['route' => ['assignTask', $task]]) !!}
                        
                         <div class="form-group">
                            {!! Form::label('eTask','Define Task') !!}
                            {!! Form::text('eTask',null,['class' => 'form-control']) !!}
                        </div>  
                         <div class="form-group">
                            {!! Form::label('date','Define Date') !!}
                            {!! Form::input('date','date',date('Y-M-d'),['class' => 'form-control']) !!}
                        </div>  
                        
                        <div class="form-group">
                            
                            {!! Form::button('Assign',['type' =>'submit', 'class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
