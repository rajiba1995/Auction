<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyBuyerPackage extends Model{
    use HasFactory;
    protected $table = 'my_buyer_packages';
    function package_data(){
        return $this->belongsTo('App\Models\Package', 'package_id','id');
    }
}
