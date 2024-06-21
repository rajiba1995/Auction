<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutsideParticipant extends Model
{
    use HasFactory;
    protected $table ="participant_outside_watchlist";

    function  BuyerDetails(){
        return $this->belongsTo('App\Models\User', 'buyer_id','id');
    }
}
