<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $table ="collections";
    protected $primaryKey ="id";
    
    public function categoryDetails(){
        return $this->hasMany('App\Models\Category','collection_id','id');
    }
}

