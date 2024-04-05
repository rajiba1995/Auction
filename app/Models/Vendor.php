<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'vendors';
    protected $dates = ['deleted_at'];
    public function jobs(){
        return $this->hasMany(Job::class, 'vendor_id');
    }
}
