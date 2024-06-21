<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquirySellerQuotes extends Model{
    use HasFactory;
    protected $table = 'inquiry_seller_quotes';

    public function InquiryData(){
        return $this->belongsTo('App\Models\Inquiry','inquiry_id','id');
    }
    public function SellerData(){
        return $this->belongsTo('App\Models\User','seller_id','id');
    }
}
