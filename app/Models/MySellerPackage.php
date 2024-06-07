<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MySellerPackage extends Model{
    use HasFactory;
    protected $table = 'my_seller_packages';
    function  getPackageDetails(){
        return $this->belongsTo('App\Models\SellerPackage', 'package_id','id');
    }
}
