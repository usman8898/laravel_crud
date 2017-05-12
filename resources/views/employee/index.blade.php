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
                  <div class="pull-right" style="position: relative;bottom: 8px;">
                        <a href="{{URL::route('attendence')}}" class="btn btn-success">Check IN</a>
                        <a href="{{URL::route('attendence2')}}" class="btn btn-default">Check OUT</a>  
                  </div>
                  
                 
                </div>

                <div class="panel-body">

                   <table class="table">
                        <tr>
                            <th>Email</th>
                            <th>Task</th>
                            <th><center>Status</center></th>
                        </tr>

                        @foreach($users as $user)
                        <tr>
                         <td>{{ $user->email }}</td>
                         <td>{{ $user->description }}</td>
                         <td><center><a href="{{URL::route('taskStatus')}}" class="btn btn-primary">Send Report</a></center></td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
          
          <a href="{{URL::route('details')}}" class="btn btn-danger">View Details</a>
        </div>
    </div>
</div>
@endsection
