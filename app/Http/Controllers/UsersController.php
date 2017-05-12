<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Task;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Employee;
use DB;
use Session;
use Redirect;
use Carbon\Carbon;
use Auth;
use App\Company;
use App\Attendence;
use DateTime;

use Illuminate\Support\Facades\Validator;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('companies', 'companies.id', '=', 'users.company_id')
            ->select('users.id','users.name','users.email','users.status','companies.name as c_name')->get();

        return view('admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Employee $request)
    {


         $rules = array(
            
            'name'       => 'required',
            'email'      => 'required|email',
            'password'  => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } 
        else {
            // store
            
             $auth=Auth::user()->name;
             
             
             $user = new User;
            
             $user->name       = Input::get('name');
             $user->email      = Input::get('email');
             $user->password   = bcrypt(Input::get('password'));
            
            $user->save();
        

            // redirect
            Session::flash('message', 'Successfully created User!');
            return redirect()->route('users.index')->with('message','Record has been Inserted Successfully!!!');
        }
 
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         
       return view('admin.edit',compact('user'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            
            
            
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } 
        else {
            // store
            $user = User::find($id);
            $user->name       = Input::get('name');
            $user->email      = Input::get('email');
            
            if(!empty(Input::get('password')))
            {
                $user->password      = bcrypt(Input::get('password'));
            }
            //$user->nerd_level = Input::get('nerd_level');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated user!');
            return Redirect::to('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if($user->status=='1'){
            $user->status='0';
            
        }
        else{
            $user->status='1';
            
        }
        $user->save();
        
        return redirect()->route('users.index')->with('message','User Have Been Block Successfully!!!');

    }
      public function checkAttendence()
    {
        die('hello');
       $users = User::join('attendence', 'users.id', '=', 'attendence.employee_id')
            ->select('users.*', 'attendence.*')
            ->get();
          
       return view('admin.attendence',compact('users'));
    }

    public function AdminTask($id){
        $task=User::find($id);
        return view('admin.adminTask',compact('task'));
    }


    public function AssignTask($id){
  
     $auth=Auth::user()->name;
        
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'eTask'       => 'required',
            'date'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/create')
                ->withErrors($validator);
        } 
        else {
            // store

            $user = new Task;
            $task = Task::where('description',Input::get('eTask'))->where('employee_id',$id)->count
            ();
                $date = Input::get('date');
                $form = strtotime($date);
                $date2 = date('d-M-Y',$form);
                
            if($task == 0)
            {
                $user->employee_id  = $id;
                $user->description  =  Input::get('eTask');   
                $user->due_date     =  $date2; 
                $user->assigned_by  =   $auth;
                $user->save();
                Session::flash('message', 'Task Assigned Successfully!');
                return Redirect::to('users');
            }
            else
            {
                 Session::flash('message', 'Sorry!! You are not allowed To Assign Same Task To This User!');
              return Redirect::to('users');
            

            }

        }
    }

    public function EmployeeTaskStatus(){

        $id = Auth::id();
        $users = User::join('tasks', 'users.id', '=', 'tasks.employee_id')
            ->select('users.name','users.email', 'tasks.description','tasks.due_date','tasks.status')
            ->get();

            return view('admin.EmployeeTaskStatus',compact('users'));

    }
    public function AdminListing(){

        $users = User::join('tasks', 'users.id', '=', 'tasks.employee_id')
                ->select('users.id','users.name','users.email','tasks.description','tasks.due_date')->get();
        return view('admin.AdminListing',compact('users'));
    }

    public function dateFilter(){


     return "here";

    }

}
