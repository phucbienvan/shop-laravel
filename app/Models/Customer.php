<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    public function bill(){
        return $this->hasMany('App\Models\Bill', 'id_customer', 'id');
    }
}
