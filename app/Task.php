<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Task extends Model
{
	protected $task='tasks';
    // protected $dates = ['due_date'];
   protected $fillable=['employee_id','description','assigned_by','due_date','completed_at','status',];

    public function users()
    {

        return $this->belongsTo('App\User');

    }

    public function setDueDateAttribute($date){
        $this->attributes['due_date'] = Carbon::parse($date);
    }
    

}
