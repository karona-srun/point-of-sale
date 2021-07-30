<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey ="purchase_id";
    protected $table = "purchases";
}
