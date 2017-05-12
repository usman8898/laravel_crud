@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Assign a Task</div>

                <div class="panel-body">
                  
                    {!! Form::open(['route' => ['task', $task]]) !!}
                         <div class="form-group">
                            {!! Form::label('eTask','Define Task') !!}
                            {!! Form::text('eTask',null,['class' => 'form-control']) !!}
                        </div>  

                        <div class="form-group">
                            {!! Form::label('e_date','Enter Date') !!}
                            {!! Form::date('e_date',null,['class' => 'form-control']) !!}
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
