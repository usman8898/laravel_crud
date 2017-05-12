<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attendence;
use auth;
use Redirect;
use DB;
use Session;
use Carbon\Carbon;
use datetime;

class AttendenceController extends Controller
{
   public function checkInStatus(){
   	
      // login user id
       $id = Auth::id();

       // current time
      $in_time = Carbon::now();
      $date = date("Y-m-d");
      
        
      $task = Attendence::where('date',$date)->where('employee_id',$id)->count();
      
      if($task > 0)
      {
      Session::flash('message', 'Your  Already Has been Checked IN!');
        return Redirect::to('employee');  
      }

        $data = array(
            'employee_id'   =>  $id,
             'status'   =>  '1',
            'in_time'   =>  $in_time,
            'date'      =>  $date
          );
        
        DB::table('attendence')->insert($data);
        
        Session::flash('message', 'You Are Checked IN Successfully!');
        return Redirect::to('employee');      
        
   }
   public function checkOutStatus(){
       // login user id
       $id = Auth::id();

       // current time
      $out = Carbon::now();
      $date = date("Y-m-d");
      
        
      $task = Attendence::where('employee_id',$id)->where('date',$date)->first();
  
      $null = '00:00:00';

      if ($task->out_time == $null) {

        Attendence::where('employee_id',$id)->update(array('out_time' => $out));

        Session::flash('message', 'You Are Checked OUT!');
        return Redirect::to('employee');
      }
      else{
            Session::flash('message', 'You Are Already Checked OUT Successfully!');
            return Redirect::to('employee');   
           
          }   
      }
      
   }
