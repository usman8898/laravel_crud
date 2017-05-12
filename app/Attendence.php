<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $table='attendence';
    protected $fillable=['employee_id','in_time','out_time','status',];

    // public function user(){
    // 	return $this->hasMany('App\User');
    // }
}
