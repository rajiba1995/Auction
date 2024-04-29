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
    public function BuyerData(){
        return $this->belongsTo('App\Models\User','buyer_id','id');
    }
    
    public function GroupWacthListData(){
        return $this->belongsTo('App\Models\GroupWatchList','group_id','id');
    }
    
}
