<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobField extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'jobfields';
   
    public function PackageData(){
    	return $this->belongsTo(\App\Models\Package::class, 'package_id', 'id');
    }
}
