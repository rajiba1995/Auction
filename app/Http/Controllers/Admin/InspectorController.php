<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use App\Models\JobFinalReport;
use App\Contracts\UserContract;
use App\Contracts\JobContract;
use App\Contracts\VendorContract;
use App\Contracts\ClientContract;
use PDF;


class InspectorController extends Controller
{
    protected $userRepository;
    protected $JobRepository;

    public function __construct(ClientContract $clientRepository, UserContract $userRepository, JobContract $JobRepository, VendorContract $vendorRepository) {
        $this->userRepository = $userRepository;
        $this->JobRepository = $JobRepository;
        $this->vendorRepository = $vendorRepository;
        $this->clientRepository = $clientRepository;
    }

    public function index(){
        $data = $this->userRepository->getAllInspector();
        return view('admin.inspector.index', compact('data'));
    }
    public function create(){
        return view('admin.inspector.create');
    }

    public function store(Request $request){
        $softDeletedVendor = User::where('email', $request->email)->onlyTrashed()->first();
        if ($softDeletedVendor) {
            return redirect()->route('admin.inspector.create')->with('error', 'This email is already associated with a inspector. Please contact the admin for more information.')->withInput($request->all());
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'mobile_number' => 'required|numeric',
                'address' => 'required',
                'stencil_number' => 'required',
                'city' => 'required',
                'state' => 'required',
                'pin_code' => 'required|between:6,6',
                'email' => 'required|unique:users,email',
                'password' => 'required',
            ]);
        }
        
        $params = $request->except('_token');
        $data = $this->userRepository->userRegistration($params);
        if($data){
            return redirect()->route('admin.inspector.index')->with('success', 'Data has been successfully stored!');
        }else{
            return redirect()->route('admin.inspector.create')->with('error', 'Something went wrong please try again!');
        }
        
    }

    public function edit($id){
        $data = $this->userRepository->findUserById($id);
        return view('admin.inspector.edit', compact('data'));
    }
    public function update(Request $request){
        $softDeletedVendor = User::where('email', $request->email)->where('id', '!=', $request->id)->onlyTrashed()->first();
        if ($softDeletedVendor) {
            return redirect()->route('admin.inspector.edit', $request->id)->with('error', 'This email is already associated with a inspector. Please contact the admin for more information.');
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'mobile_number' => 'required|numeric',
                'address' => 'required',
                'stencil_number' => 'required',
                'city' => 'required',
                'state' => 'required',
                'pin_code' => 'required|between:6,6',
                'email' => 'required',
            ]);
        }
        $params = $request->except('_token');
        $data = $this->userRepository->updateUser($params);
        if($data){
            return redirect()->route('admin.inspector.edit', $request->id)->with('success', 'Data has been successfully updated!');
        }else{
            return redirect()->route('admin.inspector.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function delete($id){
        $data = $this->userRepository->deleteUser($id);
        if($data){
            return redirect()->route('admin.inspector.index')->with('success','Deleted Successfully!');
        }else{
            return redirect()->route('admin.inspector.index')->with('error', 'Something went wrong please try again!');
        }
    }
   
    public function status($id){
        $data = $this->userRepository->updateUserStatus($id);
        return redirect()->back();
    }

    // Job Management
    public function JobIndex(Request $request){
        $data = $this->JobRepository->getAllJobs();
        $vendors = $this->vendorRepository->GetOnlyVendorList();
        return view('admin.job.index',compact('data', 'vendors'));
    }

    public function JobCreate(Request $request){
        $inspectors = $this->userRepository->getOnlyInspectorList();
        $vendors = $this->vendorRepository->GetOnlyVendorList();
        $clients = $this->clientRepository->getAllClient();
        $units = $this->clientRepository->GetAllUnit();
        $packages = $this->JobRepository->getAllPackage();
        return view('admin.job.create',compact('vendors', 'inspectors', 'clients', 'units', 'packages'));
    }
    public function JobEdit($id){
        $inspectors = $this->userRepository->getOnlyInspectorList();
        $vendors = $this->vendorRepository->GetOnlyVendorList();
        $clients = $this->clientRepository->getAllClient();
        $units = $this->clientRepository->GetAllUnit();
        $packages = $this->JobRepository->getAllPackage();
        $data = $this->JobRepository->getJobById($id);
        return view('admin.job.edit',compact('vendors', 'inspectors', 'clients', 'units', 'packages', 'data'));
    }

    public function VendorFetchData($id){
        $vendors = $this->vendorRepository->findVendorById($id);
        return response()->json(['result'=>$vendors]);
    }

    public function JobStore(Request $request){
        $request->validate([
            'vendor_name' => 'required|max:500',
            'client_name' => 'required',
            'unit_name' => 'required',
            'vendor_location' => 'required',
            'inspection_date' => 'required',
            'po_no' => 'required',
            'lot_no' => 'required',
            'package_name' => 'required',
            'quantity' => 'required',
            'quality' => 'required',
            'inspector_name' => 'required',
        ]);
        
        $params = $request->except('_token');
        $data = $this->JobRepository->JobCreate($params);
        if($data){
            $jobRequiredValues = $this->JobRepository->JobRequiredValueData($data);
            return redirect()->route('admin.job.index')->with('success', 'Job has been successfully created!');
        }else{
            return redirect()->route('admin.job.index')->with('error', 'Something went wrong please try again!');
        }
    }
    public function JobUpdate(Request $request){
        $request->validate([
            'vendor_name' => 'required|max:500',
            'client_name' => 'required',
            'unit_name' => 'required',
            'vendor_location' => 'required',
            'inspection_date' => 'required',
            'po_no' => 'required',
            'lot_no' => 'required',
            'package_name' => 'required',
            'quantity' => 'required',
            'quality' => 'required',
            'inspector_name' => 'required',
        ]);
        
        $params = $request->except('_token');
        $data = $this->JobRepository->JobUpdateData($params);
        if($data){
            $jobRequiredValues = $this->JobRepository->JobRequiredValueData($data);
            return redirect()->route('admin.job.edit', $request->id)->with('success', 'Job has been successfully updated!');
        }else{
            return redirect()->route('admin.job.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function JobDelete($id){
        $data = $this->JobRepository->deleteJob($id);
        if($data){
            return redirect()->route('admin.job.index')->with('success','Deleted Successfully!');
        }else{
            return redirect()->route('admin.job.index')->with('error', 'Something went wrong please try again!');
        }
    }
    public function UpdatePriority(Request $request){
        $data = $this->JobRepository->UpdateJobPriority($request->all());
        return response()->json(['status'=>200]);
    }
    public function JobReport($id){
        $job = $this->JobRepository->getJobById($id);
        if($job){
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
            // dd($TextValuePack2);
            $finalValue = $this->JobRepository->JobReportCalculation($id, $data);
            $AllRequiredValue = $this->JobRepository->FetchJobRequiredValue($id, $job->package_id);
            return view('admin.job.report',compact('job', 'data', 'AllRequiredValue', 'finalValue', 'TextValuePack1', 'TextValuePack2'));
        }else{
            return redirect()->route('admin.job.index')->with('error', 'this job is not exist!');
        }
    }

    public function JobReportPDF($id){
        $job = $this->JobRepository->getJobById($id);
        if ($job) {
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
            $pdf->save($path . '/' . $fileName);
            // Return the PDF for streaming
            if($finalValue){
                $store = JobFinalReport::findOrFail($finalValue->id);
                $store->file_link = $link_path . '/' . $fileName;
                $store->save();
            }
            return $pdf->stream($fileName);
        } else {
            return redirect()->route('admin.job.index')->with('error', 'This job does not exist!');
        }

    }
    public function InspectorJobReport($id){
        $job = $this->JobRepository->getJobById($id);
        if($job){
            $data = $this->JobRepository->ReportByJobId($id);
            $finalValue = $this->JobRepository->JobReportCalculation($id, $data);
            $AllRequiredValue = $this->JobRepository->FetchJobRequiredValue($id, $job->package_id);
            return view('client.job.report',compact('job', 'data', 'AllRequiredValue', 'finalValue'));
        }else{
            return redirect()->route('client.job.report.supplier-wise')->with('error', 'this job is not exist!');
        }
    }
    public function JobReportUpdate(Request $request){
        $data =  $this->JobRepository->JobReportUpdateById($request->all());
        return redirect()->back()->with('success','Report has been successfully updated!');
    }

    public function JobReportIndex(){
        $data = $this->JobRepository->getAllJobs();
        return view('admin.job.report-list',compact('data'));
    }
    public function JobReportByClientIndex(){
        $data = $this->JobRepository->getAllJobsByClient();
        return view('client.job.report-list',compact('data'));
    }
    
    public function JobReportByVendorWise($id){
        $data = $this->JobRepository->getAllJobsVendorWise($id);
        $vendor = $this->vendorRepository->findVendorById($id);
        return view('client.job.vendor-wise-report-list',compact('data', 'vendor'));
    }

    public function JobReleaseOrder($id){
        $data = $this->JobRepository->getJobById($id);
        $FetchFinalJobData = $this->JobRepository->FetchFinalJobData($id);
        $AllRequiredValue = $this->JobRepository->FetchJobRequiredValue($id, $data->package_id);
        return view('admin.job.release-order',compact('data', 'FetchFinalJobData', 'AllRequiredValue'));
    }
    public function JobCertificate($id){
        $data = $this->JobRepository->getJobById($id);
        $reports = $this->JobRepository->ReportByJobId($id);
        $FetchFinalJobData = $this->JobRepository->FetchFinalJobData($id);
        $AllRequiredValue = $this->JobRepository->FetchJobRequiredValue($id, $data->package_id);
        $AllBales = [];
        foreach($reports as $key =>$items){
            if($items->bale_weight_wt){
                $AllBales[]=$items->bale_weight_wt;
            }
        }
        return view('admin.job.certificate',compact('data', 'FetchFinalJobData', 'AllRequiredValue', 'AllBales'));
    }
}
