@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Attendence
                </div>

                <div class="panel-body">

                   <table class="table">
                        <tr>
                            <th>Employee Name</th>
                            <th>Employee Email</th>
                            <th>Employee Attendence</th>
                        </tr>
                        @foreach($users as $user) 
                        <tr>

                         <td>{{ $user->name}}</td>
                         <td>{{$user->email }}</td>
                         <td> {{$user->status }} </td>
                        </tr>
                    @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
