<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // public $timestamps = false; //set time to false
    protected $fillable = [
    	'email', 'password', 'admin_name'
    ];
    protected $primaryKey = 'admin_id';
 	protected $table = 'tbl_admin';

 	public function roles()
 	{
 		return $this->belongsToMany('App\Roles');
 	}

 	// //nhieu quyen
 	public function hasAnyRoles($roles)
 	{
 		if(is_array($roles)){
 			foreach($roles as $role){
 				if($this->hasRole($role)){
 					return true;
 				}
 			}
 		}else{
 			if($this->hasRole($roles)){
 				return true;
 			}
 		}
 		return false;
 	}

 	//1 quyen
 	public function hasRole($role)
 	{
 		if($this->roles()->where('name',$role)->first()){
 			return true;
 		}
 		return false;
 	}
}
