<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Report;
use App\Models\Vendor;
use App\Models\Job;
use App\Models\Grade;
use App\Models\RequiredValue;
use App\Models\JobFinalReport;
use App\Models\Client;
use App\Models\RequiredTextValues;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contracts\UserContract;
use App\Contracts\JobContract;
use App\Contracts\ClientContract;
use App\Contracts\VendorContract;
use Illuminate\Validation\Rule;
use PDF;
use DB;

class InspectorController extends Controller{

    protected $userRepository;
    protected $JobRepository;

    public function __construct(UserContract $userRepository, JobContract $JobRepository, VendorContract $vendorRepository, ClientContract $clientRepository){
        $this->userRepository = $userRepository;
        $this->JobRepository = $JobRepository;
        $this->vendorRepository = $vendorRepository;
        $this->clientRepository = $clientRepository;
    }

    public function PendingJobList($id){
        $data = $this->JobRepository->PendingJobList($id);
        $completedJobs = $this->JobRepository->CompletedJobList($id);
        $RejectedJobs = $this->JobRepository->RejectedJobList($id);
        $totalJobs = $this->JobRepository->TotalJobList($id);
        $completedJobs = count($completedJobs);
        $RejectedJobs = count($RejectedJobs);
        if(count($data)>0){
            $response=array("code"=>200,"success"=>true, "data" => $data, 'completed_job'=>$completedJobs, 'total_job'=>$totalJobs, 'rejected_jobs'=>$RejectedJobs);
            return response()->json($response);
        }else{
            $response=array("code"=>200,"success"=>true, "data" => '', 'completed_job'=>$completedJobs, 'total_job'=>$totalJobs,'rejected_jobs'=>$RejectedJobs);
            return response()->json($response);
        }
    }
    public function CompletedJobList($id){
        $data = $this->JobRepository->CompletedJobList($id);
        if(count($data)>0){
            $response=array("code"=>200,"success"=>true, 'completed_job'=>$data);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'No Data Found');
            return response()->json($response);
        }
    }
    public function CompletedJobReport($jobid){
        $jobData = $this->JobRepository->getJobById($jobid);
        $Reports = Report::where('job_id', $jobid)->get();
        $vendor = Vendor::findOrFail($jobData->vendor_id);
        if($vendor){
            $vendor = $vendor->name;
        }else{
            $vendor = "";
        }
        
        if(count($Reports)>0){
            $TotalActiveFields = $this->vendorRepository->getAllVendors();
            $TotalActiveFields = $this->vendorRepository->FindJobFieldByPackage($jobData->client_id, $jobData->package_id);
            $AllRequiredValue = $this->JobRepository->FetchJobRequiredValue($jobid, $jobData->package_id);
            $response=array("code"=>200,"success"=>true, "data" => $jobData, 'vendor'=>$vendor, 'required_value'=>$AllRequiredValue, 'TotalActiveFields'=>$TotalActiveFields, 'Reports'=>$Reports);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'No Data Found');
            return response()->json($response);
        }
    }
    public function InspectorNotificationList($id){
        $data = $this->JobRepository->ListInspectorNotification($id);
        if(count($data)>0){
            $response=array("code"=>200,"success"=>true, 'msg'=>$data);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'No Data Found');
            return response()->json($response);
        }
    }

    public function PendingJobCreate($id){
        $jobData = $this->JobRepository->getJobById($id);
       
        if($jobData){
            $TotalActiveFields = $this->vendorRepository->FindJobFieldByPackage($jobData->client_id, $jobData->package_id);
            $AllRequiredValue = $this->JobRepository->FetchJobRequiredValue($id, $jobData->package_id);
            
            // Data Modification Section
            $keysToRemove = ['id', 'created_at', 'updated_at', 'vendor_id', 'deleted_at', 'package_id'];
            $TotalActiveFields = collect($TotalActiveFields)->except($keysToRemove)->all();
            $filteredData = array_filter($TotalActiveFields, function ($value) {
                return $value !== null;
            });
            $properties = array_keys($filteredData);
            $NewRequiredValue = [];
            if(!empty($AllRequiredValue)){
                $keysToRemove2 = ['id', 'job_id', 'created_at', 'updated_at', 'package_id'];
                $AllRequiredValue = collect($AllRequiredValue)->except($keysToRemove2)->all();

                $result = [];

                foreach ($AllRequiredValue as $key => $value) {
                    // Check if the key has "_plus" suffix
                    if (strpos($key, '_plus') !== false) {
                        $prefixArray = explode('_plus', $key);
                        $prefix = current($prefixArray);
                    }
                    // Check if the key has "_minus" suffix
                    elseif (strpos($key, '_minus') !== false) {
                        $prefixArray = explode('_minus', $key);
                        $prefix = current($prefixArray);
                    } else {
                        $prefix = $key;
                    }
                
                    // Create a new array if the prefix doesn't exist in the result array
                    if (!isset($result[$prefix])) {
                        $result[$prefix] = [];
                    }
                
                    // Add the key-value pair to the result array
                    $result[$prefix][$key] = $value;
                    if($key =='folding_bottom'){
                        // dd($result);
                    }
                }
                foreach($result as $key =>$item){
                    if(in_array($key, $properties)){
                        $NewRequiredValue[$key] = $item;
                    }
                }
            }

            
            $Reports = $this->JobRepository->ReportByJobId($id);
            $Reportsdata = [];
            foreach ($properties as $column) {
                $propertyData = $Reports->map(function ($report) use ($column) {
                    return [
                        'id' => $report->id,
                        $column => $report->$column,
                    ];
                })->all();
                $Reportsdata[$column] = $propertyData;
            }
            if($Reportsdata!=null){
                foreach ($NewRequiredValue as $key => $values) {
                    // Check if the key exists in the data array
                    if (isset($Reportsdata[$key])) {
                        foreach($Reportsdata[$key] as $keydata =>$item){
                            // Create a new entry based on the required values
                            $newEntry = [
                                $key => $values[$key] ?? null,
                                $key . '_plus' => $values[$key . '_plus'] ?? null,
                                $key . '_minus' => $values[$key . '_minus'] ?? null,
                            ];
                            // Push the new entry into the corresponding array in the data section
                            $Reportsdata[$key][$keydata]['Required_val'] = $newEntry;
                        }
                       
                    }
                }
                $response=array("code"=>200,"success"=>true, 'required_value'=>$NewRequiredValue, "data"=>$Reportsdata);
                return response()->json($response);
            }else{
                $response=array("code"=>403,"success"=>false, "msg" => 'Please check required fields on this package!');
                return response()->json($response);
            }
           
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'No Data Found');
            return response()->json($response);
        }
       
    }
    public function PendingJobStore(Request $request){
        $collection = collect($request->all());
        $data = json_decode($collection, true);
        $data['blank'] = [""];
        $job_id = $data["job_id"];
        $package_id = $data["package_id"];
        $art_work = $data["art_work"]?$data["art_work"]:"";
        $ink_quality = $data["ink_quality"]?$data["ink_quality"]:"";
        $remarks = $data["remarks"]?$data["remarks"]:"";
        unset($data["job_id"]);
        unset($data["package_id"]);
        unset($data["art_work"]);
        unset($data["ink_quality"]);
        unset($data["remarks"]);
        // Extract the number of commas from 'dimension_length'
        $dimensionLengthCommas = substr_count($data['dimension_length'], ',');

        // Update values with the same number of commas
        foreach ($data as &$value) {
            if (empty($value)) {
                $value = str_repeat(',', $dimensionLengthCommas);
            }
        }

        // Example of accessing updated values
        $resultArray = [];
        foreach ($data as $property => $value) {
            $resultArray[$property] = "$value";
        }
      
        // Process each key-value pair
        foreach ($resultArray as $key => $value) {
            // Check if the value is a comma-separated string
            if (is_string($value) && strpos($value, ',') !== false) {
                // Split the string into an array
                $arrayValue = explode(',', $value);
                // Trim each element to remove spaces
                $arrayValue = array_map('trim', $arrayValue);
                // Update the original data array with the new array value
                $data[$key] = $arrayValue;
                // return $arrayValue;
            } else {
                if($data[$key]!=""){
                    $data[$key] = [$data[$key]];
                }else{
                    // Store a blank array with a length based on $dimensionLengthCommas
                    $data[$key] = array_fill(0, $dimensionLengthCommas, "");
                }
               
            }
        }
        foreach ($data['dimension_length'] as $key => $value) {
            $store = new Report;
            $store->job_id = $job_id;
            $store->dimension_length = $value ? $value : null;
            $store->dimension_width = array_key_exists('dimension_width', $data)&& array_key_exists($key, $data['dimension_width']) ? $data['dimension_width'][$key] : null;
            $store->value_size_opening =array_key_exists('value_size_opening', $data) && array_key_exists($key, $data['value_size_opening']) ? $data['value_size_opening'][$key] : null;
            $store->value_size_depth = array_key_exists('value_size_depth', $data) && array_key_exists($key, $data['value_size_depth']) ? $data['value_size_depth'][$key] : null;
            $store->patch_length_os = array_key_exists('patch_length_os', $data) && array_key_exists($key, $data['patch_length_os']) ? $data['patch_length_os'][$key] : NULL;
            $store->patch_length_ds = array_key_exists('patch_length_ds', $data) &&  array_key_exists($key, $data['patch_length_ds']) ? $data['patch_length_ds'][$key] : NULL;
            $store->patch_width_os = array_key_exists('patch_width_os', $data) &&  array_key_exists($key, $data['patch_width_os']) ? $data['patch_width_os'][$key] : null;
            $store->patch_width_ds = array_key_exists('patch_width_ds', $data) &&  array_key_exists($key, $data['patch_width_ds']) ? $data['patch_width_ds'][$key] : null;
            $store->bag_weight = array_key_exists('bag_weight', $data) &&  array_key_exists($key, $data['bag_weight']) ? $data['bag_weight'][$key] : null;
            $store->stitching_dm = array_key_exists('stitching_dm', $data) &&  array_key_exists($key, $data['stitching_dm']) ? $data['stitching_dm'][$key] : null;
            $store->mesh_length = array_key_exists('mesh_length', $data) &&  array_key_exists($key, $data['mesh_length']) ? $data['mesh_length'][$key] : null;
            $store->mesh_weight = array_key_exists('mesh_weight', $data) &&  array_key_exists($key, $data['mesh_weight']) ? $data['mesh_weight'][$key] : null;
            $store->folding_top = array_key_exists('folding_top', $data) &&  array_key_exists($key, $data['folding_top']) ? $data['folding_top'][$key] : null;
            $store->folding_bottom = array_key_exists('folding_bottom', $data) &&  array_key_exists($key, $data['folding_bottom']) ? $data['folding_bottom'][$key] : null;
            $store->tape_width = array_key_exists('tape_width', $data) &&  array_key_exists($key, $data['tape_width']) ? $data['tape_width'][$key] : null;
            $store->breaking_length = array_key_exists('breaking_length', $data) &&  array_key_exists($key, $data['breaking_length']) ? $data['breaking_length'][$key] : null;
            $store->tape_width = array_key_exists('tape_width', $data) &&  array_key_exists($key, $data['tape_width']) ? $data['tape_width'][$key] : null;
            $store->breaking_length_elongation = array_key_exists('breaking_length_elongation', $data) &&  array_key_exists($key, $data['breaking_length_elongation']) ? $data['breaking_length_elongation'][$key] : null;
            $store->breaking_width = array_key_exists('breaking_width', $data) &&  array_key_exists($key, $data['breaking_width']) ? $data['breaking_width'][$key] : null;
            $store->breaking_width_elongation = array_key_exists('breaking_width_elongation', $data) &&  array_key_exists($key, $data['breaking_width_elongation']) ? $data['breaking_width_elongation'][$key] : null;
            $store->seam_top = array_key_exists('seam_top', $data) &&  array_key_exists($key, $data['seam_top']) ? $data['seam_top'][$key] : null;
            $store->seam_bottom = array_key_exists('seam_bottom', $data) &&  array_key_exists($key, $data['seam_bottom']) ? $data['seam_bottom'][$key] : null;
            $store->struss_sl = array_key_exists('struss_sl', $data) &&  array_key_exists($key, $data['struss_sl']) ? $data['struss_sl'][$key] : null;
            $store->struss_kgs = array_key_exists('struss_kgs', $data) &&  array_key_exists($key, $data['struss_kgs']) ? $data['struss_kgs'][$key] : null;
            $store->patch_strength_os = array_key_exists('patch_strength_os', $data) &&  array_key_exists($key, $data['patch_strength_os']) ? $data['patch_strength_os'][$key] : null;
            $store->patch_strength_ds = array_key_exists('patch_strength_ds', $data) &&  array_key_exists($key, $data['patch_strength_ds']) ? $data['patch_strength_ds'][$key] : null;
            $store->bale_weight_sl = array_key_exists('bale_weight_sl', $data) &&  array_key_exists($key, $data['bale_weight_sl']) ? $data['bale_weight_sl'][$key] : null;
            $store->bale_weight_wt = array_key_exists('bale_weight_wt', $data) &&  array_key_exists($key, $data['bale_weight_wt']) ? $data['bale_weight_wt'][$key] : null;
            $store->air_permiabilty = array_key_exists('air_permiabilty', $data) &&  array_key_exists($key, $data['air_permiabilty']) ? $data['air_permiabilty'][$key] : null;
            $store->ash_content = array_key_exists('ash_content', $data) &&  array_key_exists($key, $data['ash_content']) ? $data['ash_content'][$key] : null;
            $store->save();
        }
        $Reports = Report::where('job_id', $job_id)->get();
        if(count($Reports)>0){
            $JobUpdate = Job::findOrFail($job_id);
            $JobUpdate->status = 1;
            $JobUpdate->save();
            $JobFinalReport = new JobFinalReport;
            $JobFinalReport->job_id = $job_id;
            $JobFinalReport->art_work = $art_work;
            $JobFinalReport->ink_quality = $ink_quality;
            $JobFinalReport->remarks = $remarks;
            $JobFinalReport->save();
            $AllRequiredValue = $this->JobRepository->FetchJobRequiredValue($job_id, $package_id);
            $response=array("code"=>200,"success"=>true, "data" => $Reports, 'required_value'=>$AllRequiredValue);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'No Data Found!');
            return response()->json($response);
        }
    }

    public function PendingJobFinalSubmit(Request $request){
        try {
            DB::beginTransaction();
            // dd($request->all());
            $jobUpdate = Job::findOrFail($request->input('job_id'));
            $jobUpdate->status = $request->input('status');
            $jobUpdate->save();
    
            $artWork = $request->input('art_work', '');
            $inkQuality = $request->input('ink_quality', '');
            $remarks = $request->input('remarks', '');
            $bale_weight_less = $request->input('bale_weight_less', '');
    
            $FetchJobFinalReport = JobFinalReport::where('job_id', $request->input('job_id'))->first();
            if($FetchJobFinalReport){
                $FetchJobFinalReport->job_id = $request->input('job_id');
                $FetchJobFinalReport->art_work = $artWork;
                $FetchJobFinalReport->ink_quality = $inkQuality;
                $FetchJobFinalReport->remarks = $remarks;
                $FetchJobFinalReport->bale_weight_less = $bale_weight_less;
                $FetchJobFinalReport->save();
            }else{
                $jobFinalReport = new JobFinalReport;
                $jobFinalReport->job_id = $request->input('job_id');
                $jobFinalReport->art_work = $artWork;
                $jobFinalReport->ink_quality = $inkQuality;
                $jobFinalReport->remarks = $remarks;
                $jobFinalReport->bale_weight_less = $bale_weight_less;
                $jobFinalReport->save();
            }
            
    
            DB::commit();
    
            $response = ["code" => 200, "success" => true, "msg" => "Job updated successfully"];
            return response()->json($response);
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction and handle the error
            DB::rollBack();
    
            $response = ["code" => 500, "success" => false, "msg" => $e->getMessage()];
            return response()->json($response);
        }
    }
    public function CreateJob(){
        $AllVendors = $this->vendorRepository->getAllVendors();
        $AllClients = $this->clientRepository->getAllClient();
        $AllUnits = $this->clientRepository->GetAllUnit();
        $AllPackeges = $this->JobRepository->getAllPackage();
        $response=array("code"=>200,"success"=>true, "AllVendors" => $AllVendors, 'AllUnits'=>$AllUnits, 'AllPackeges'=>$AllPackeges, 'AllClients'=>$AllClients);
            return response()->json($response);
    }
    
    public function UpdateJob($id){
        $JobDetails = $this->JobRepository->getJobById($id);
        $AllVendors = $this->vendorRepository->getAllVendors();
        $AllClients = $this->clientRepository->getAllClient();
        $AllUnits = $this->clientRepository->GetAllUnit();
        $AllPackeges = $this->JobRepository->getAllPackage();
        $response=array("code"=>200,"success"=>true, "AllVendors" => $AllVendors, 'AllUnits'=>$AllUnits, 'AllPackeges'=>$AllPackeges, 'AllClients'=>$AllClients, 'JobDetails'=>$JobDetails);
            return response()->json($response);
    }

    public function VendorFetchData($id){
        $vendors = $this->vendorRepository->findVendorById($id);
        $response=array("code"=>200,"success"=>true, "vendordata" => $vendors);
            return response()->json($response);
    }
    public function JobStore(Request $request){
        $params = $request->except('_token');
        // return $params;
        $data = $this->JobRepository->JobCreate($params);
        if($data){
            $jobRequiredValues = $this->JobRepository->JobRequiredValueData($data);
            $response=array("code"=>200,"success"=>true, "data" => $data);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'Something went wrong!');
            return response()->json($response);
        }
    }
    public function UpdateJobStore(Request $request){
        $params = $request->except('_token');
        // return $params;
        $data = $this->JobRepository->JobUpdateData($params);
        if($data){
            $jobRequiredValues = $this->JobRepository->JobRequiredValueData($data);
            $response=array("code"=>200,"success"=>true, "data" => $data);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'Something went wrong!');
            return response()->json($response);
        }
    }
    public function AllClientList(){
        $AllPackeges = $this->JobRepository->getAllPackage();
        $clients = Client::select(['name','id'])->orderBy('name', 'ASC')->get()->toArray();
        $response=array("code"=>200,"success"=>true, "clients" => $clients, 'AllPackeges'=>$AllPackeges);
        return response()->json($response);
    }
    public function FieldCreate($clientid, $packid){
        $client = $this->clientRepository->GetClientById($clientid);
        $RequiredFields = $this->vendorRepository->FindJobFieldByPackId($clientid, $packid);
        $this->vendorRepository->ClientPackWiseGradeList($clientid);
        $AllGrade = $this->vendorRepository->FindGradeByPackId($clientid, $packid);
        $required_values1 = RequiredValue::where('client_id', $clientid)->where('package_id', $packid)->get();
        $required_text_values1 = RequiredTextValues::where('client_id', $clientid)->where('package_id', $packid)->get();
        if(count($required_values1)==0){
            $RequiredValue = new RequiredValue;
            $RequiredValue->client_id = $clientid;
            $RequiredValue->package_id = $packid;
            $RequiredValue->save();
        }
        if(count($required_text_values1)==0){
            $RequiredTextValues = new RequiredTextValues;
            $RequiredTextValues->client_id = $clientid;
            $RequiredTextValues->package_id = $packid;
            $RequiredTextValues->save();
        }
        $RequiredValue = RequiredValue::where('client_id', $clientid)->where('package_id', $packid)->first();
        $RequiredTextValues = RequiredTextValues::where('client_id', $clientid)->where('package_id', $packid)->first();
        if($RequiredFields){
            $response=array("code"=>200,"success"=>true, "client" => $client, "grades" => $AllGrade, "RequiredFields" => $RequiredFields, "RequiredValue" => $RequiredValue, 'RequiredTextValues'=>$RequiredTextValues);
            return response()->json($response);
        }else{
            $RequiredFields = $this->vendorRepository->FindJobFieldByPackId($clientid, $packid);
            $response=array("code"=>200,"success"=>true, "client" => $client, "grades" => $AllGrade, "RequiredFields" => $RequiredFields, "RequiredValue" => $RequiredValue);
            return response()->json($response);
        }
    }
    public function FieldStore(Request $request){
        $data = $this->vendorRepository->StoreJobField($request->all());
        if($data){
            $response=array("code"=>200,"success"=>true);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'Something went wrong!');
            return response()->json($response);
        }
    }
    public function FieldRequiredValueStore(Request $request){
        $params = $request->except('_token');
        $data = $this->vendorRepository->RequiredFieldValueStore($params);
        if($data){
            $response=array("code"=>200,"success"=>true, 'data'=>$data);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'Something went wrong!');
            return response()->json($response);
        }
    }
    public function JobSingleValueUpdate(Request $request){
        try {
            DB::beginTransaction();
    
            $inputData = $request->all();
    
            $data = Report::where('id', $request->id)->update($inputData);
    
            if ($data === 1) {
                // If the update is successful, commit the transaction
                DB::commit();
    
                $response = ["code" => 200, "success" => true];
                return response()->json($response);
            } else {
                // If the update fails, rollback the transaction
                DB::rollBack();
    
                $response = ["code" => 401, "success" => false, "msg" => 'Something went wrong!'];
                return response()->json($response);
            }
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction and handle the error
            DB::rollBack();
    
            $response = ["code" => 500, "success" => false, "msg" => $e->getMessage()];
            return response()->json($response);
        }
    }

    public function ReportDownloadPDF($id){
        $job = $this->JobRepository->getJobById($id);
            $data = $this->JobRepository->ReportByJobId($id);
            $RequiredTextValue = $this->vendorRepository->ClientWiseRequiredTextValue($job->client_id);
            $TextValuePack1 ="";
            $TextValuePack2 = "";
            foreach($RequiredTextValue as $key =>$item){
                if($item->package_id==1){
                    $TextValuePack1 = $item;
                }else{
                    $TextValuePack2 = $item;
                }
                
            }
            $finalValue = $this->JobRepository->JobReportCalculation($id, $data);
            $AllRequiredValue = $this->JobRepository->FetchJobRequiredValue($id, $job->package_id);
            $options = [
                'dpi' => 300,
                'isHtml5ParserEnabled' => true,
                'enable_remote' => true,
                // Add more options as needed
            ];
            // Load the view with data and options
            $pdf = PDF::loadView('admin.job.report_pdf', compact('job', 'data', 'AllRequiredValue', 'finalValue', 'TextValuePack1', 'TextValuePack2'))->setOptions($options);

            // Define the directory for storing the PDF
            $path = public_path('admin/pdf');
            $link_path = asset('admin/pdf');

            // Ensure the directory exists, create it if not
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $fileName = 'report_' . $job->inspection_date . '_' . $job->id . '.pdf';
            // Save the PDF to the specified path
            $response = $pdf->save($path . '/' . $fileName);
            // Return the PDF for streaming
            if($finalValue && $response){
                $store = JobFinalReport::findOrFail($finalValue->id);
                $store->file_link = $link_path . '/' . $fileName;
                $store->save();
                $res=array("code"=>200,"success"=>true, 'link'=>$store->file_link);
                return response()->json($res);
            }else{
                $res = ["code" => 401, "success" => false, "msg" => 'Something went wrong!'];
                return response()->json($res);
            }
    }

    public function AllVendorList(){
        $allVendor = $this->vendorRepository->getAllVendors();
        if($allVendor){
            $response=array("code"=>200,"success"=>true, 'vendor'=>$allVendor);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'No Data Found');
            return response()->json($response);
        }
    }
    public function VendorStore(Request $request){
        try {
            DB::beginTransaction();
            $softDeletedVendor = Vendor::where('contact_mail', $request->email)->onlyTrashed()->first();
            if ($softDeletedVendor) {
                $response = [
                    "code" => 401,
                    "success" => false,
                    "msg" => 'This email is already associated with a vendor. Please contact the admin for more information',
                ];
            } 
            $data = $this->vendorRepository->createVendor($request->all());
            DB::commit();
            $response = ["code" => 200, "success" => true, 'vendor'=>$data];
        } catch (\Exception $e) {
            DB::rollBack();
            $response = [
                "code" => 401,
                "success" => false,
                "msg" => 'Error updating records: ' . $e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    public function VendorEdit($id){
        $data = $this->vendorRepository->findVendorById($id);
        if($data){
            $response=array("code"=>200,"success"=>true, 'vendor'=>$data);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'No Data Found');
            return response()->json($response);
        }
    }
    public function VendorUpdate(Request $request){
        try {
            DB::beginTransaction();
            $softDeletedVendor = Vendor::where('contact_mail', $request->email)->where('id', '!=', $request->id)->onlyTrashed()->first();
            if ($softDeletedVendor) {
                $response = [
                    "code" => 401,
                    "success" => false,
                    "msg" => 'This email is already associated with a vendor. Please contact the admin for more information',
                ];
            }
            $data = $this->vendorRepository->updateVendor($request->all());
            DB::commit();
            $response = ["code" => 200, "success" => true, 'vendor'=>$data];
        } catch (\Exception $e) {
            DB::rollBack();
            $response = [
                "code" => 401,
                "success" => false,
                "msg" => 'Error updating records: ' . $e->getMessage(),
            ];
        }
        return response()->json($response);
    }


    public function GradeValueStore(Request $request){
      
        try {
            DB::beginTransaction();
        
            $id = explode(',', $request['id']);
            $field_value = explode(',', $request['field_value']);
        
            // Combine the arrays into a single associative array
            $data = array_combine($id, $field_value);
        
            // Iterate over the combined array and update records
            foreach ($data as $id => $fieldValue) {
                $update = Grade::findOrFail($id);
                $update->field_value = $fieldValue;
                $update->save();
            }
        
            DB::commit();
        
            $response = ["code" => 200, "success" => true];
        } catch (\Exception $e) {
            DB::rollBack();
        
            $response = [
                "code" => 401,
                "success" => false,
                "msg" => 'Error updating records: ' . $e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    public function ClientWiseGradesByPackId($client_id, $package_id){
        $grades = $this->vendorRepository->FindGradeByPackId($client_id, $package_id);
     
        if($grades){
            $response=array("code"=>200,"success"=>true, 'grades'=>$grades);
            return response()->json($response);
        }else{
            $response=array("code"=>401,"success"=>false, "msg" => 'No Data Found');
            return response()->json($response);
        }
    }

    public function JobTabWiseValueUpdate(Request $request){
        $id = explode(',', $request['id']);
        $tab_name = $request->tab_name;
        $field_value = explode(',', $request[$tab_name]);
        
        // Combine the arrays into a single associative array
        $data = array_combine($id, $field_value);
        try {
            DB::beginTransaction();
    
            // Iterate over the combined array and update records
            foreach ($data as $id => $fieldValue) {
                $collection = Report::findOrFail($id);
                $collection->$tab_name = $fieldValue;
                $collection->save();
            }
    
            DB::commit();
    
            $response = ["code" => 200, "success" => true];
                return response()->json($response);
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
    
            // You can log the error or perform other actions based on your application's requirements
            $response = [
                "code" => 500,
                "success" => false,
                "error" => $e->getMessage(), // Include the error message for debugging
            ];
    
            return response()->json($response);
        }
    }

    
   
}
