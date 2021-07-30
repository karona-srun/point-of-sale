<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "Roles";
    protected $primaryKey = 'role_id';
    protected $fillable = ['role_name'];
    public function permission(){
        return $this->belongsTo('App\Permission'); 
    }
}
