<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'jobs';
    protected $dates = ['deleted_at'];

    public function ClientData(){
    	return $this->belongsTo(\App\Models\Client::class, 'client_id', 'id');
    }
    public function VendorData(){
    	return $this->belongsTo(\App\Models\Vendor::class, 'vendor_id', 'id');
    }
    public function InspectorData(){
    	return $this->belongsTo(\App\Models\User::class, 'inspector_id', 'id');
    }
}
