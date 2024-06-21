<?php
namespace App\Repositories;

use App\Models\Job;
use App\Models\Package;
use App\Models\Report;
use App\Models\Vendor;
use App\Models\JobFinalReport;
use App\Models\Notification;
use App\Models\JobRequiredValue;
use App\Models\RequiredValue;
use Illuminate\Http\UploadedFile;
use App\Contracts\JobContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class JobRepository
 *
 * @package \App\Repositories
 */
class JobRepository implements JobContract
{
    /**
     * JobRepository constructor.
     * @param Job $model
     */
    public function __construct(Job $model)
    {
        $this->model = $model;
    }
    public function getAllJobs(){
        return Job::orderBy('id', 'DESC')->paginate(20);
    }
    public function getJobById($id){
        return Job::findOrFail($id);
    }
    public function getAllJobsByClient(){
        if(Auth::guard('client')->check()){
            $user_id= Auth::guard('client')->user()->id;
            $data =  Job::select('vendor_id')->where('client_id', '=', $user_id)
            ->groupBy('vendor_id')->get()->toArray();
            return Vendor::with('jobs')->whereIn('id', $data)->orderBy('name', 'ASC')->paginate(20);
        }
    }
    public function getAllJobsVendorWise($id){
        $user_id = Auth::guard('client')->user()->id;
        return Job::where('vendor_id', $id)->where('client_id', $user_id)->orderBy('id', 'DESC')->paginate(20);
    }
    
    public function JobCreate(array $data){
        try {
            DB::beginTransaction();
    
            $collection = collect($data);
    
            $store = new Job;
            $store->vendor_id = $collection['vendor_name'];
            $store->client_id = $collection['client_name'];
            $store->unit_name = $collection['unit_name'];
            $store->package_id = $collection['package_name'];
            $store->vendor_location = $collection['vendor_location'];
            $store->inspection_date = $collection['inspection_date'];
            $store->po_no = $collection['po_no'];
            $store->lot_no = $collection['lot_no'];
            $store->quantity = $collection['quantity'];
            $store->quality = $collection['quality'];
            $store->branding_side = $collection['branding_side'];
            $store->stitching_thread_colour = $collection['stitching_thread_colour'];
            $store->inspector_id = $collection['inspector_name'];
            $store->save();
    
            if ($store) {
                for ($i = 0; $i < 50; $i++) {
                    $report = new Report;
                    $report->job_id = $store->id;
                    $report->save();
                }
                $Notification = new Notification;
                $Notification->title = 'You have one more new job';
                $Notification->description = 'Client:-' . $store->ClientData->name;
                $Notification->job_id = $store->id;
                $Notification->inspector_id = $store->inspector_id;
                $Notification->client_id = $store->client_id;
                $Notification->save();
            }
    
            DB::commit();
    
            return $store;
        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();
    
            // You might want to log the exception or handle it appropriately
            echo $e->getMessage();
        }
    }


    public function JobUpdateData(array $data){
        $collection = collect($data);
        $store = Job::findOrFail($collection['id']);
        $store->vendor_id = $collection['vendor_name'];
        $store->client_id = $collection['client_name'];
        $store->unit_name = $collection['unit_name'];
        $store->package_id = $collection['package_name'];
        $store->vendor_location = $collection['vendor_location'];
        $store->inspection_date = $collection['inspection_date'];
        $store->po_no = $collection['po_no'];
        $store->lot_no = $collection['lot_no'];
        $store->quantity = $collection['quantity'];
        $store->quality = $collection['quality'];
        $store->branding_side = $collection['branding_side'];
        $store->stitching_thread_colour = $collection['stitching_thread_colour'];
        $store->inspector_id = $collection['inspector_name'];
        $store->save();
        return $store;
    }

    public function JobRequiredValueData($arrayItem){
        $JobItem = collect($arrayItem);
        $JobRequiredValue = JobRequiredValue::where('package_id', '!=', $JobItem['package_id'])->where('job_id', $JobItem['id'])->first();
        $ExistValue = JobRequiredValue::where('package_id', $JobItem['package_id'])->where('job_id', $JobItem['id'])->get();
        if ($JobRequiredValue) {
            $JobRequiredValue->delete();
        }

        $data = RequiredValue::where('package_id', $JobItem['package_id'])->where('client_id', $JobItem['client_id'])->first();
        if($data){
            $item = collect($data);
            if(count($ExistValue)==0){
                $collection = new JobRequiredValue;
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
                    $collection->$property = isset($item[$property]) ? $item[$property] : null;
                    $collection->$plusProperty = isset($item[$plusProperty]) ? $item[$plusProperty] : null;
                    $collection->$minusProperty = isset($item[$minusProperty]) ? $item[$minusProperty] : null;
                }
    
                $collection->job_id = $JobItem['id'];
                $collection->package_id = $JobItem['package_id'];
                $collection->save();
                return true;
            }
            
        }
        return true;
    }

    public function FetchJobRequiredValue($jobId, $packageId){
        $JobRequiredValue = JobRequiredValue::where('package_id', $packageId)
        ->where('job_id', $jobId)
        ->first();
        return $JobRequiredValue;
    }
    public function PendingJobList($id){
        return Job::with('VendorData', 'InspectorData', 'ClientData')->where('status', 0)->where('inspector_id', $id)->orderBy('id', 'DESC')->get();
    }
    public function CompletedJobList($id){
        return Job::with('VendorData')->where('status', 1)->where('inspector_id', $id)->get();
    }
    public function RejectedJobList($id){
        return Job::with('VendorData')->where('status', 2)->where('inspector_id', $id)->get();
    }

    public function ListInspectorNotification($id){
        return Notification::where('inspector_id', $id)->get();
    }
    public function TotalJobList($id){
        return Job::where('inspector_id', $id)->get()->count();
    }
    public function deleteJob($id){
        $delete = Job::findOrFail($id);
        $delete->delete();
        return $delete;
    }
    public function UpdateJobPriority(array $data){
        $update = Job::findOrFail($data['id']);
        $update->priority = $data['value'];
        $update->save();
        return $update;
    }

    public function ReportByJobId($id){
        return Report::where('job_id', $id)->orderBy('id', 'ASC')->get();
    }

    public function JobReportCalculation($id, $data){
        $store=[];
        foreach($data as $key => $item){
            $store['dimension_length'][] = isset($item['dimension_length'])?$item['dimension_length']:null;
            $store['dimension_width'][] = isset($item['dimension_width'])?$item['dimension_width']:null;
            $store['value_size_opening'][] = isset($item['value_size_opening'])?$item['value_size_opening']:null;
            $store['value_size_depth'][] = isset($item['value_size_depth'])?$item['value_size_depth']:null;
            $store['patch_length_os'][] = isset($item['patch_length_os'])?$item['patch_length_os']:null;
            $store['patch_length_ds'][] = isset($item['patch_length_ds'])?$item['patch_length_ds']:null;
            $store['patch_width_os'][] = isset($item['patch_width_os'])?$item['patch_width_os']:null;
            $store['patch_width_ds'][] = isset($item['patch_width_ds'])?$item['patch_width_ds']:null;
            $store['bag_weight'][] = isset($item['bag_weight'])?$item['bag_weight']:null;
            $store['stitching_dm'][] = isset($item['stitching_dm'])?$item['stitching_dm']:null;
            $store['mesh_length'][] = isset($item['mesh_length'])?$item['mesh_length']:null;
            $store['mesh_weight'][] = isset($item['mesh_weight'])?$item['mesh_weight']:null;
            $store['folding_top'][] = isset($item['folding_top'])?$item['folding_top']:null;
            $store['folding_bottom'][] = isset($item['folding_bottom'])?$item['folding_bottom']:null;
            $store['tape_width'][] = isset($item['tape_width'])?$item['tape_width']:null;
            $store['breaking_length'][] = isset($item['breaking_length'])?$item['breaking_length']:null;
            $store['breaking_length_elongation'][] = isset($item['breaking_length_elongation'])?$item['breaking_length_elongation']:null;
            $store['breaking_width'][] = isset($item['breaking_width'])?$item['breaking_width']:null;
            $store['breaking_width_elongation'][] = isset($item['breaking_width_elongation'])?$item['breaking_width_elongation']:null;
            $store['seam_top'][] = isset($item['seam_top'])?$item['seam_top']:null;
            $store['seam_bottom'][] = isset($item['seam_bottom'])?$item['seam_bottom']:null;
            $store['struss_sl'][] = isset($item['struss_sl'])?$item['struss_sl']:null;
            $store['struss_kgs'][] = isset($item['struss_kgs'])?$item['struss_kgs']:null;
            $store['patch_strength_os'][] = isset($item['patch_strength_os'])?$item['patch_strength_os']:null;
            $store['patch_strength_ds'][] = isset($item['patch_strength_ds'])?$item['patch_strength_ds']:null;
            $store['bale_weight_sl'][] = isset($item['bale_weight_sl'])?$item['bale_weight_sl']:null;
            $store['bale_weight_wt'][] = isset($item['bale_weight_wt'])?$item['bale_weight_wt']:null;
            $store['air_permiabilty'][] = isset($item['air_permiabilty'])?$item['air_permiabilty']:null;
            $store['ash_content'][] = isset($item['ash_content'])?$item['ash_content']:null;
        }
        $result = [];
        foreach ($store as $key => $values) {
            
            if (isset($values)) {
                $valuesWithoutNull = array_filter($values, function ($value) {
                    return $value !== null && $value !== 0 && $value !=="";
                });
                if($valuesWithoutNull){
                    $array_sum = array_sum($valuesWithoutNull);
                    $count = count($valuesWithoutNull);
                    
                    $result[$key] = [
                        'average' => $array_sum / $count,
                        'max' => max($valuesWithoutNull),
                        'min' => min($valuesWithoutNull),
                    ];
                      // dd(array_sum($valuesWithoutNull))
                }else{
                    $result[$key]=[
                        'average' => "",
                        'max' => "",
                        'min' => "",
                    ];
                }
            }
        }
      
        $finalResult = [];

        foreach ($result as $dimension => $stats) {
            $finalResult[$dimension] = $stats['average'];
            $finalResult[$dimension . '_max'] = $stats['max'];
            $finalResult[$dimension . '_min'] = $stats['min'];
        }
        $item = collect($finalResult);
        $store = JobFinalReport::where('job_id', $id)->first();
        if($store){
            $store = JobFinalReport::findOrFail($store->id);
        }else{
            $store = new JobFinalReport;
            $store->job_id = $id;
        }
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
            $plusProperty = $property . '_max';
            $minusProperty = $property . '_min';
                // Set values for the main property and its variations
                if($item[$property]){
                    $store->$property = $item[$property];
                }
                if($item[$plusProperty]){
                    $store->$plusProperty = $item[$plusProperty];
                }
                if($item[$minusProperty]){
                    $store->$minusProperty = $item[$minusProperty];
                }
            
        }
        $store->save();
        return $store;
    }
    public function getAllPackage(){
        return Package::all();
    }
    public function JobReportUpdateById($data){
        $store = Report::findOrFail($data['id']);
        if(isset($data['dimension_length']) || $data['dimension_length']==""){
            $store->dimension_length = $data['dimension_length'];
        }
        if(isset($data['dimension_width']) || $data['dimension_width']==""){
            $store->dimension_width = $data['dimension_width'];
        }
        if(isset($data['value_size_opening']) || $data['value_size_opening']==""){
            $store->value_size_opening = $data['value_size_opening'];
        }
        if(isset($data['value_size_depth']) || $data['value_size_depth']==""){
            $store->value_size_depth = $data['value_size_depth'];
        }
       
        if(array_key_exists('patch_length_os', $data)){
            $store->patch_length_os =$data['patch_length_os']==""?null:$data['patch_length_os'];
        }
        if(array_key_exists('patch_length_ds', $data)){
            $store->patch_length_ds =$data['patch_length_ds']==""?null:$data['patch_length_ds'];
        }
        if(array_key_exists('patch_width_os', $data)){
            $store->patch_width_os =$data['patch_width_os']==""?null:$data['patch_width_os'];
        }
        if(array_key_exists('patch_width_ds', $data)){
            $store->patch_width_ds =$data['patch_width_ds']==""?null:$data['patch_width_ds'];
        }
        if(isset($data['bag_weight']) || $data['bag_weight']==""){
            $store->bag_weight = $data['bag_weight'];
        }
        if(array_key_exists('stitching_dm', $data)){
            $store->stitching_dm =$data['stitching_dm']==""?null:$data['stitching_dm'];
        }
       
        if(isset($data['mesh_length']) || $data['mesh_length']==""){
            $store->mesh_length = $data['mesh_length'];
        }
        if(isset($data['mesh_weight']) || $data['mesh_weight']==""){
            $store->mesh_weight = $data['mesh_weight'];
        }
        if(array_key_exists('folding_top', $data)){
            $store->folding_top =$data['folding_top']==""?null:$data['folding_top'];
        }
        if(array_key_exists('folding_bottom', $data)){
            $store->folding_bottom =$data['folding_bottom']==""?null:$data['folding_bottom'];
        }
        if(array_key_exists('tape_width', $data)){
            $store->tape_width =$data['tape_width']==""?null:$data['tape_width'];
        }
       
        if(isset($data['breaking_length']) || $data['breaking_length']==""){
            $store->breaking_length = $data['breaking_length'];
        }
        if(isset($data['breaking_length_elongation']) || $data['breaking_length_elongation']==""){
            $store->breaking_length_elongation = $data['breaking_length_elongation'];
        }
        if(isset($data['breaking_width']) || $data['breaking_width']==""){
            $store->breaking_width = $data['breaking_width'];
        }
        if(isset($data['breaking_width_elongation']) || $data['breaking_width_elongation']==""){
            $store->breaking_width_elongation = $data['breaking_width_elongation'];
        }
        if(array_key_exists('seam_top', $data)){
            $store->seam_top =$data['seam_top']==""?null:$data['seam_top'];
        }
        if(array_key_exists('seam_bottom', $data)){
            $store->seam_bottom =$data['seam_bottom']==""?null:$data['seam_bottom'];
        }
        if(array_key_exists('struss_sl', $data)){
            $store->struss_sl =$data['struss_sl']==""?null:$data['struss_sl'];
        }
        if(array_key_exists('struss_kgs', $data)){
            $store->struss_kgs =$data['struss_kgs']==""?null:$data['struss_kgs'];
        }
        if(array_key_exists('patch_strength_os', $data)){
            $store->patch_strength_os =$data['patch_strength_os']==""?null:$data['patch_strength_os'];
        }
        if(array_key_exists('patch_strength_ds', $data)){
            $store->patch_strength_ds =$data['patch_strength_ds']==""?null:$data['patch_strength_ds'];
        }
        if(array_key_exists('bale_weight_sl', $data)){
            $store->bale_weight_sl =$data['bale_weight_sl']==""?null:$data['bale_weight_sl'];
        }
        if(array_key_exists('bale_weight_wt', $data)){
            $store->bale_weight_wt =$data['bale_weight_wt']==""?null:$data['bale_weight_wt'];
        }
        if(array_key_exists('air_permiabilty', $data)){
            $store->air_permiabilty =$data['air_permiabilty']==""?null:$data['air_permiabilty'];
        }
        if(isset($data['ash_content']) || $data['ash_content']==""){
            $store->ash_content = $data['ash_content'];
        }
        $store->save();
        return $store;
    }
    public function FetchFinalJobData($id){
        return JobFinalReport::where('job_id', $id)->first();
    }


}
