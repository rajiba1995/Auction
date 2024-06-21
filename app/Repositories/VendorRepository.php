<?php

namespace App\Repositories;
use App\Contracts\VendorContract;

use App\Models\Vendor;
use App\Models\JobField;
use App\Models\Grade;
use App\Models\RequiredValue;
use App\Models\RequiredTextValues;
use Illuminate\Support\Str;


class VendorRepository implements VendorContract{
    public function getAllVendors(){
        return Vendor::orderBy('name', 'ASC')->paginate(20);
    }
    public function GetOnlyVendorList(){
        return Vendor::orderBy('name', 'ASC')->get();
    }

    public function findVendorById($id)
    {
        return Vendor::find($id);
    }

    public function createVendor(array $data)
    {
        $collection = collect($data);
        $store = new Vendor;
        $store->name = $collection['name'];
        $store->contact_number = $collection['contact_number'];
        $store->contact_mail = $collection['email'];
        $store->location = $collection['address'];
        $store->pincode = $collection['pin_code'];
        $store->state = $collection['state'];
        $store->save();
        return $store;
    }

    public function updateVendor(array $data)
    {
        $collection = collect($data);
        $update = Vendor::findOrFail($data['id']);
        $update->name = $collection['name'];
        $update->contact_number = $collection['contact_number'];
        $update->contact_mail = $collection['email'];
        $update->location = $collection['address'];
        $update->pincode = $collection['pin_code'];
        $update->state = $collection['state'];
        $update->save();
        return $update;
    }

    public function deleteVendor($id){
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();
        return $vendor;
    }
    public function StatusVendor($id){
        $vendor = Vendor::findOrFail($id);
        $status = $vendor->status ==1?0:1;
        $vendor->status = $status;
        $vendor->save();
        return $vendor;
    }
    public function FindJobField($id){
        return JobField::where('vendor_id', $id)->whereIn('package_id', [1,2])->get();
    }
    public function FindJobFieldByPackId($id, $packid){
        return JobField::where('vendor_id', $id)->where('package_id', $packid)->first();
    }
    public function FindJobFieldByPackage($client_id, $package_id){
        return JobField::where('vendor_id', $client_id)->where('package_id', $package_id)->first();
    }


    public function CreateJobField($id){
        $package1 = JobField::where('vendor_id', $id)->where('package_id', 1)->first();
        $package2 = JobField::where('vendor_id', $id)->where('package_id', 2)->first();
        if(!isset($package2)){
            $JobField = new JobField;
            $JobField->vendor_id = $id;
            $JobField->package_id = 2;
            $JobField->save();
        }
        if(!isset($package1)){
            $JobField = new JobField;
            $JobField->vendor_id = $id;
            $JobField->package_id = 1;
            $JobField->save();
        }
        return JobField::where('vendor_id', $id)->whereIn('package_id', [1,2])->get();
        
    }

    public function StoreJobField(array $data){
        $update = JobField::findOrFail($data['field_id']);
        $collection = collect($data);
      
        if($data['value']=='dimension_length'){
            $update->dimension_length = $update->dimension_length?null:1;
        }
        if($data['value']=='dimension_width'){
            $update->dimension_width = $update->dimension_width?null:1;
        }
        if($data['value']=='value_size_opening'){
            $update->value_size_opening = $update->value_size_opening?null:1;
        }
        if($data['value']=='value_size_depth'){
            $update->value_size_depth = $update->value_size_depth?null:1;
        }
        if($data['value']=='patch_length_os'){
            $update->patch_length_os = $update->patch_length_os?null:1;
        }
        if($data['value']=='patch_length_ds'){
            $update->patch_length_ds = $update->patch_length_ds?null:1;
        }
        if($data['value']=='patch_width_os'){
            $update->patch_width_os = $update->patch_width_os?null:1;
        }
        if($data['value']=='patch_width_ds'){
            $update->patch_width_ds = $update->patch_width_ds?null:1;
        }
        if($data['value']=='bag_weight'){
            $update->bag_weight = $update->bag_weight?null:1;
        }
        if($data['value']=='stitching_dm'){
            $update->stitching_dm = $update->stitching_dm?null:1;
        }
        if($data['value']=='mesh_length'){
            $update->mesh_length = $update->mesh_length?null:1;
        }
        if($data['value']=='mesh_weight'){
            $update->mesh_weight = $update->mesh_weight?null:1;
        }
        if($data['value']=='folding_top'){
            $update->folding_top = $update->folding_top?null:1;
        }
        if($data['value']=='folding_bottom'){
            $update->folding_bottom =$update->folding_bottom?null:1;
        }
        if($data['value']=='tape_width'){
            $update->tape_width = $update->tape_width?null:1;
        }
        if($data['value']=='breaking_length'){
            $update->breaking_length = $update->breaking_length?null:1;
        }
        if($data['value']=='breaking_length_elongation'){
            $update->breaking_length_elongation = $update->breaking_length_elongation?null:1;
        }
        if($data['value']=='breaking_width'){
            $update->breaking_width = $update->breaking_width?null:1;
        }
        if($data['value']=='breaking_width_elongation'){
            $update->breaking_width_elongation = $update->breaking_width_elongation?null:1;
        }
        if($data['value']=='seam_top'){
            $update->seam_top = $update->seam_top?null:1;
        }
        if($data['value']=='seam_bottom'){
            $update->seam_bottom = $update->seam_bottom?null:1;
        }
        if($data['value']=='struss_sl'){
            $update->struss_sl = $update->struss_sl?null:1;
        }
        if($data['value']=='struss_kgs'){
            $update->struss_kgs = $update->struss_kgs?null:1;
        }
        if($data['value']=='patch_strength_os'){
            $update->patch_strength_os = $update->patch_strength_os?null:1;
        }
        if($data['value']=='patch_strength_ds'){
            $update->patch_strength_ds = $update->patch_strength_ds?null:1;
        }
        if($data['value']=='bale_weight_sl'){
            $update->bale_weight_sl = $update->bale_weight_sl?null:1;
        }
        if($data['value']=='bale_weight_wt'){
            $update->bale_weight_wt = $update->bale_weight_wt?null:1;
        }
        if($data['value']=='air_permiabilty'){
            $update->air_permiabilty = $update->air_permiabilty?null:1;
        }
        if($data['value']=='ash_content'){
            $update->ash_content = $update->ash_content?null:1;
        }
        $update->save();
        return $update;
    }

    public function ProductRequiredValues($client_id, $package_id){
        return RequiredValue::where('client_id', $client_id)->where('package_id', $package_id)->first();
    }
    public function RequiredFieldValueStore(array $data){
        $collection = RequiredValue::findOrFail($data['id']);
     
        $item = collect($data);
        $properties = [
            'dimension_length', 'dimension_width', 'value_size_opening', 'value_size_depth',
            'patch_length_os', 'patch_length_ds', 'patch_width_os', 'patch_width_ds',
            'bag_weight', 'stitching_dm', 'mesh_length', 'mesh_weight',
            'folding_top', 'folding_bottom', 'tape_width', 'breaking_length',
            'breaking_length_elongation', 'breaking_width', 'breaking_width_elongation',
            'seam_top', 'seam_bottom', 'struss_sl', 'struss_kgs',
            'patch_strength_os', 'patch_strength_ds', 'bale_weight_sl', 'bale_weight_wt',
            'air_permiabilty', 'ash_content'
        ];
        foreach ($properties as $property) {
            $plusProperty = $property . '_plus';
            $minusProperty = $property . '_minus';
            // Set values for the main property and its variations
            $collection->$property = isset($item[$property]) && $item[$property] !== "null" ? $item[$property] : null;
            $collection->$plusProperty = isset($item[$plusProperty]) && $item[$plusProperty] !== "null" ? $item[$plusProperty] : null;
            $collection->$minusProperty = isset($item[$minusProperty]) && $item[$minusProperty] !== "null" ? $item[$minusProperty] : null;
        }
        $collection->save();
        $requiredTextValues = RequiredTextValues::findOrFail($data['text_field_id']);
        // Update the record with the data from the $data array
        $requiredTextValues->update($data);

        return $collection;
    }

    public function ClientPackWiseGradeList($client_id){
        $existingGrades1 = Grade::where('client_id', $client_id)->where('package_id', 1)->get();
        
        $existingGrades2 = Grade::where('client_id', $client_id)->where('package_id', 2)->get();

        // Check if either $existingGrades1 or $existingGrades2 is not empty
        if ($existingGrades1->isNotEmpty() || $existingGrades2->isNotEmpty()) {
            // Combine the results and return
            return $existingGrades1->merge($existingGrades2);
        }
        $grades = [
            "PPC (TRADE)",
            "PPC (NON TRADE)",
            "PSC (TRADE)",
            "PSC (NON TRADE)",
            "OPC43 (TRADE)",
            "OPC43 (NON TRADE)",
            "OPC53 (TRADE)",
            "OPC53 (NON TRADE)",
            "OTHERS",
        ];

        $newGrades = [];

        foreach ($grades as $gradeName) {
            $newGrade = new Grade;
            $newGrade->client_id = $client_id;
            $newGrade->package_id = 1; // Adjust the package_id as needed
            $newGrade->field_name = $gradeName;
            $newGrade->field_slug = Str::slug($gradeName);
            $newGrade->field_value = null;
            $newGrade->save();

            $newGrades[] = $newGrade;
        }

        foreach ($grades as $gradeName) {
            $newGrade = new Grade;
            $newGrade->client_id = $client_id;
            $newGrade->package_id = 2; // Adjust the package_id as needed
            $newGrade->field_name = $gradeName;
            $newGrade->field_slug = Str::slug($gradeName);
            $newGrade->field_value = null;
            $newGrade->save();
            $newGrades[] = $newGrade;
        }
        return $newGrades;
    }

    public function GradeValueUpdate(array $data){
        foreach ($data['id'] as $key=> $item) {
            $Update= Grade::findOrFail($item);
            $Update->field_value = $data['field_value'][$key];
            $Update->save();
        }
        return true;
    }
    public function FindGradeByPackId($id, $packid){
        return Grade::select('id', 'field_name', 'field_value')->where('client_id', $id)->where('package_id', $packid)->get();
    }
    public function ClientWiseRequiredTextValue($client_id){
        return $RequiredTextValues = RequiredTextValues::where('client_id', $client_id)->whereIn('package_id', [1,2])->get();
    }

    
}
