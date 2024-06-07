<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";

    
public function getUserAllDetails(){
    return $this->belongsTo('App\Models\User','user_id','id');
}
}
