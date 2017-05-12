<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/users','UsersController');
Route::post('checkAttendence', ['as' => 'checkAttendence', 'uses' => 'UsersController@checkAttendence']);
Route::get('userStatus', ['as' => 'userStatus', 'uses' => 'UsersController@checkAttendence']);

Route::post('r2', ['as' => 'r2', 'uses' => 'UsersController@dateFilter']);


Route::get('employee', ['as' => 'employee', 'uses' => 'EmployeeController@index']);
Route::get('employeeTask', ['as' => 'employeeTask', 'uses' => 'EmployeeController@employeeTask']);
Route::get('details', ['as' => 'details', 'uses' => 'EmployeeController@TaskList']);
Route::get('addTask/{id}', ['as' => 'addTask', 'uses' => 'EmployeeController@AddTask']);
Route::get('adminTask', ['as' => 'adminTask', 'uses' => 'UsersController@AdminListing']);
Route::get('adminTask2/{id}', ['as' => 'adminTask2', 'uses' => 'UsersController@AdminTask']);
Route::post('assignTask/{id}', ['as' => 'assignTask', 'uses' => 'UsersController@AssignTask']);
Route::post('task/{id}', ['as' => 'task', 'uses' => 'EmployeeController@store']);
Route::get('attendence',['as'	=>	'attendence',	'uses'	=>	'AttendenceController@checkInStatus']);
Route::get('attendence2',['as'	=>	'attendence2',	'uses'	=>	'AttendenceController@checkOutStatus']);
Route::get('taskStatus',array('as'	=>	'taskStatus',	'uses'	=>	'EmployeeController@TaskStatus'));
Route::get('employeeTaskStatus',array('as'	=>	'employeeTaskStatus', 'uses'	=>	'UsersController@EmployeeTaskStatus'));



Auth::routes();



//Route::get('/home', 'HomeController@index');
