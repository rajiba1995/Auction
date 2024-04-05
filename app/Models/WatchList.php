<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchList extends Model{
    use HasFactory;
    protected $table = 'watchlists';
    public function SellerData(){
        return $this->belongsTo('App\Models\User','seller_id','id');
    }
}
