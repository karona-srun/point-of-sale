<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    protected $primaryKey = "purchase_histories_id";
    protected $table = "purchase_histories";
}
