@extends('layouts.admin')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
             @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message')}}</div>
            @endif
                <div class="panel-heading">User Listing</div>
                <div class="panel-body">

                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Task</th>
                            <th>Due Date</th>
                        </tr>

                         @foreach($users as $user)
                        <tr>
                         <td> {{ $user->name }}</td>
                         <td>{{ $user->email }}</td>
                         <td>{{ $user->description }}</td>
                         <td>{{ date('M-d-y',strtotime($user->due_date)) }}</td>
                        </tr>
                    @endforeach
                       
                    </table>
                </div>
            </div>
           
            
        </div>
    </div>
</div>
@endsection
