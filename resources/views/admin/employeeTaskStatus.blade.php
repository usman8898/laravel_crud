@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
             @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message')}}</div>
            @endif
                <div class="panel-heading">Employees Tasks Report
                
                </div>
                <div class="panel-body">

                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Task</th>
                            <th>Due Date</th>
                            <th>Status</th> 
                        </tr>
                        @foreach($users as $user)
                        <tr>
                         <td> {{ $user->name }}</td>
                         <td>{{ $user->email }}</td>
                         <td>{{ $user->description }}</td>
                         <td>{{ $user->due_date }}</td>
                         <td> @if( $user->status == 0)
                                    Pending
                                    @else
                                    Complete
                                @endif</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
