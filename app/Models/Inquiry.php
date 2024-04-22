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
    public function BuyerData(){
        return $this->belongsTo('App\Models\User','created_by','id');
    }
}
