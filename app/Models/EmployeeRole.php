<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    use HasFactory;
    protected $table ="employee_roles";

    // function  getRoleName(){
    //     return $this->hasMany('App\Models\Admin', 'role','id');
    // }

}
