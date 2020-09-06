<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name', 'password', 'email','phone','roles'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'users';

 	
}
