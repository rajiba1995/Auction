<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryParticipant extends Model{
    use HasFactory;
    protected $table = 'inquiry_participants';
    public function SellerData(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
