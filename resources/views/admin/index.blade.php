@extends('layouts.admin')

@section('content')

@include('layouts.includes.section')

 		<div class="box">
            <div class="box-header">
            <h3>Users
              {{ link_to_route('users.create','Add new Employee',null,['class' => 'btn btn-primary pull-right'])}} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   
                   <th>Name</th>
                   <th>Email</th>
                   <th>Login Status</th>
                   
                   <th><center>Action</center></th>
                </tr>
                </thead>
                <tbody>
                 @foreach($users as $user)
                        
                        <tr>
                        @if( $user->status == 0)
                        
                         <td style="background-color: red;color:white;"> {{ $user->name }}</td>
                         <td style="background-color: red;color:white;">{{ $user->email }}</td>
                         <td style="background-color: red;color:white;">
                                @if( $user->status == 0)
                                    Disable
                                    @else
                                    Active
                                @endif
                          </td>

                          @else
                        
                         <td > {{ $user->name }}</td>
                         <td >{{ $user->email }}</td>
                         <td>
                                @if( $user->status == 0)
                                    Disable
                                    @else
                                    Active
                                @endif
                          </td>
                          @endif
                         
                            <td><center>
                                {!! Form::open(array('route' => ['users.destroy',$user->id], 'method' => 'delete')) !!}
                                
                                {{ link_to_route('users.edit','edit',[$user->id],['class' => 'btn btn-primary'])}} | 
                            
                            {!! Form::button('Active',['class' => 'btn btn-warning','type' =>'submit']) !!}
                            {!! Form::close() !!}
                            </center></td>    
                        </tr>
                        
                        
                    @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  
                   <th>Name</th>
                   <th>Email</th>
                   <th>Login Status</th>
                   
                   <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
