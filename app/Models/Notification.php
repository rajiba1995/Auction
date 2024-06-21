<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model{
    use HasFactory;
    protected $table = 'notifications';
    // public function ClientData(){
    // 	return $this->belongsTo(\App\Models\Client::class, 'client_id', 'id');
    // }
    // public function InspectorData(){
    // 	return $this->belongsTo(\App\Models\User::class, 'inspector_id', 'id');
    // }
}
