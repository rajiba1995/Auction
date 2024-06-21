<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementConsumption extends Model
{
    use HasFactory;
    protected $table = "requirement_consumptions";
    public function CatData(){
        return $this->belongsTo('App\Models\Collection','category','id');
    }
    public function SubCatData(){
        return $this->belongsTo('App\Models\Category','sub_category','id');
    }

}
