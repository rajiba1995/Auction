<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table ="products";

    public function CatData(){
        return $this->belongsTo('App\Models\Collection','category_id','id');
    }
    public function SubCatData(){
        return $this->belongsTo('App\Models\Category','sub_category_id','id');
    }
    public function UserProductData(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
    
}
