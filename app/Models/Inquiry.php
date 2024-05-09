<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model{
    use HasFactory;
    protected $table = 'inquiries';

    public function ParticipantsData(){
        return $this->hasMany('App\Models\InquiryParticipant','inquiry_id','id');
    }
    public function SellerQuotesData(){
        return $this->hasMany('App\Models\InquirySellerQuotes','inquiry_id','id');
    }
    public function SellerCommentData(){
        return $this->hasMany('App\Models\InquirySellerComments','inquiry_id','id');
    }
    public function BuyerData(){
        return $this->belongsTo('App\Models\User','created_by','id');
    }
    public function SellerData(){
        return $this->belongsTo('App\Models\User','allot_seller','id');
    }
    
}
