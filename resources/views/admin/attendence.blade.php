@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
        <!-- <form method="post" action="{{ URL::route('register')}}"> -->

            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

            <div class="col-md-2">
                <input type="date" class="form-control" id="from" placeholder="Enter Start Date" />   
            </div>
            <div class="col-md-2">
                <input type="date" id="to" class="form-control" placeholder="Enter End Date" />
            </div>
            <div class="col-md-2">
                <input type="button" id="filter" value="Filter" class="btn btn-primary" />
            </div>

        <!-- </form> -->
            
            
            <div class="col-md-offset-3 col-md-3">
              <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search The Information">  
            </div>
            <div id="postRequestData">
                
            </div>
        </div>
    </div>
</div><br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Attendence
                </div>

                <div class="panel-body">

                   <table class="table" id="myTable">
                        <tr>
                            <th>Employee Name</th>
                            <th>Employee Email</th>
                            <th>Employee Attendence</th>
                            <th>Checking IN</th>
                            <th>Checking OUT</th>
                            <th>Attendence Date</th>
                        </tr>
                        @foreach($users as $user) 
                        <tr>

                         <td>{{ $user->name}}</td>
                         <td>{{$user->email }}</td>
                         <td> <center> @if( $user->status == 0)
                                    Absent
                                    @else
                                    Present
                                @endif </center></td>
                         <td><center> {{$user->in_time }} </center></td>
                         <td> <center>{{$user->out_time }}</center> </td>
                         <td>{{ date('M-d-y',strtotime($user->date)) }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
