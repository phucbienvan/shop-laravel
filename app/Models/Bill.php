<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    public function bill_detail(){
        return $this->hasMany('App\Models\BillDetail', 'id_bill', 'id');
    }

    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'id_customer', 'id');
    }

}
