<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyBadge extends Model
{
    use HasFactory;
    protected $table ="my_badges";


    public function getBadgeDetails()
    {
        return $this->belongsTo('App\Models\Badge','badge_id','id');
    }
}
