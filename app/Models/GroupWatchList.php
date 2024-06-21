<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupWatchList extends Model
{
    use HasFactory;
    protected $table ="group_watchlist";
    public function buyerData(){
        return $this->belongsTo('App\Models\User','created_by','id');
    }
}
