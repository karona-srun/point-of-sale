<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{   
    protected $primaryKey = 'permission_id';
    protected $table = "permissions";    
    public function role(){
        return $this->hasMany('App\Role'); 
    }
}
