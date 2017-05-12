<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;
use App\User;
use App\Task;
use Session;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Employee;

class EmployeeController extends Controller
{
    public function index(){
    	
    	$user=Auth::id();

    	$users = User::join('tasks', 'users.id', '=', 'tasks.employee_id')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->select('users.*', 'tasks.*', 'companies.name as c_name')->where('users.id', '=', $user)->get();
            
     
    	return view('employee.index',compact('users','user'));
    }


    public function TaskList()
    {
    	$users = User::join('tasks', 'users.id', '=', 'tasks.employee_id')->select('users.id','users.name','users.email','users.name','users.admin','tasks.employee_id', 'tasks.description','tasks.assigned_by','tasks.due_date','tasks.status')->where('users.admin', '=', '0')->get();

    	return view('employee.userDetails',compact('users'));
    }

    public function AddTask($id){
    
    	$task=Task::find($id);
        // $user=User::find($user);

    	return view('employee.employeeTask',compact('task'));
    }
   
   public function store($id)
    {
       $auth=Auth::user()->name;
        
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'eTask'       => 'required',
            'e_date'        =>    'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('employee/employeeTask')
                ->withErrors($validator);
        } 
        else {
            // store
            $user = new Task;
            $user = Task::where('description',Input::get('eTask'))->where('employee_id',$id)->count
            ();
            if($user == 0)
            {
            $user->employee_id  = $id;
            $user->description  = Input::get('eTask');
            $user->assigned_by  =   $auth;
            $user->due_date  =   Input::get('e_date');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully created Task!');
            return Redirect::to('details');
        }
        else{
             Session::flash('message', 'Sorry!! You are not allowed To Assign Same Task To This User!');
              return Redirect::to('details');
        }
        }
    }

    public function employeeTask(){
        $id=Auth::user()->name;
    

        $users = User::join('tasks', 'users.id', '=', 'tasks.employee_id')->select('users.*', 'tasks.*')->where('tasks.assigned_by', '=', $id)->get();

        return view('employee.myTasks',compact('users'));
    }


    public function TaskStatus(){

        $id = Auth::id();

        $task = Task::where('employee_id',$id)->first();
        
        $TaskStatus = $task->status;
        
        if ($TaskStatus == 0) {
            
            $task->status = 1;

        }
        
        $task->save();

        Session::flash('message', 'Successfully Send Report!');
            return Redirect::to('employee');
    }
}
