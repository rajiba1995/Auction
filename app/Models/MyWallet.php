<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyWallet extends Model{
    use HasFactory;
    protected $table = 'my_wallets';
    // function  getPackageDetails(){
    //     return $this->belongsTo('App\Models\Package', 'package_id','id');
    // }
}
