<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequiredTextValues extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'required_text_values';
    protected $fillable = [
        'id', 'client_id', 'package_id', 'dimension_length_text', 'dimension_width_text',
        'value_size_opening_text', 'value_size_depth_text', 'patch_length_os_text',
        'patch_length_ds_text', 'patch_width_os_text', 'patch_width_ds_text',
        'bag_weight_text', 'stitching_dm_text', 'mesh_length_text', 'mesh_weight_text',
        'folding_top_text', 'folding_bottom_text', 'tape_width_text', 'breaking_length_text',
        'breaking_length_elongation_text', 'breaking_width_text', 'breaking_width_elongation_text',
        'seam_top_text', 'seam_bottom_text', 'struss_sl_text', 'struss_kgs_text',
        'patch_strength_os_text', 'patch_strength_ds_text', 'bale_weight_sl_text',
        'bale_weight_wt_text', 'air_permiabilty_text', 'ash_content_text'
    ];
    
   
    public function PackageData(){
    	return $this->belongsTo(\App\Models\Package::class, 'package_id', 'id');
    }
}
