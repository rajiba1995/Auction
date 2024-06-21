<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
    protected $table ="categories";

    public function CollectionData(){
        return $this->belongsTo('App\Models\Collection','collection_id','id');
    }

}
