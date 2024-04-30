<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryOutsideParticipant extends Model
{
    use HasFactory;
    protected $table ="inquiry_outside_pareticipants";

    function  BuyerDetails(){
        return $this->belongsTo('App\Models\User', 'buyer_id','id');
    }
}