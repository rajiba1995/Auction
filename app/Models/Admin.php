<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    
    public function isAdmin(){
        return true;
    }
    function  getSellers(){
        return $this->hasMany('App\Models\User', 'added_by','id');
    }
    
    public function getRoleName()
    {
        return $this->belongsTo('App\Models\EmployeeRole','role');
    }
}