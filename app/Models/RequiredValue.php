<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredValue extends Model
{
    use HasFactory;
    protected $table = 'required_values';
    public function PackageData(){
    	return $this->belongsTo(\App\Models\Package::class, 'package_id', 'id');
    }
}
