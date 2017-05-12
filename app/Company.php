<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $company='companies';
   protected $fillable=['name','id',];

   public function users(){
   	return $this->hasMany('App\User');
   }

}
