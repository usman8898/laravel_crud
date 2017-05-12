@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
         @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard
                 
                </div>

                <div class="panel-body">

                   <table class="table">
                        <tr>
                            <th>Employee Name</th>
                            <th>Employee E_mail</th>
                            <th>Task</th>
                            <th>Assigned By</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Assign Task</th>
                        </tr>

                         @foreach($users as $user)
                        <tr>
                         <td>{{ $user->name }}</td>
                         <td>{{ $user->email }}</td>
                         <td>{{ $user->description }}</td>
                         <td>{{ $user->assigned_by }}</td>
                         <td>{{ date('M-d-y',strtotime($user->due_date)) }}</td>
                          <td>
                                @if( $user->status == 0)
                                    Pending
                                    @else
                                    Complete
                                @endif
                          </td>
                          
                         <td><a href="{{ URL::route('addTask',$user->id) }}" class="btn btn-danger">Add+</a></td>
                        </tr>
                    @endforeach
                         
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
