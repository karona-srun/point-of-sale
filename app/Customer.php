<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';
    protected $table = 'customers';
    protected $fillable = ['customer_name', 'telephone', 'address', 'customer_type'];
}
