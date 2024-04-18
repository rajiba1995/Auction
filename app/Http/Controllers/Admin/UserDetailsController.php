<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\UserDetailsContract;
use Auth;
use App\Models\User;



class UserDetailsController extends Controller
{
    protected $userDetailsRepository;

    public function __construct(UserDetailsContract $userDetailsRepository)
    {
        $this->userDetailsRepository = $userDetailsRepository;
    }

    // Banner
    public function UserDetailsIndex(Request $request)
    {   
        $startDate = $request->start_date ?? '';
        $endDate = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
               // Check if any of the parameters are provided
        // If keyword is provided or both start_date and end_date are provided
        if (!empty($keyword) || !empty($startDate) || !empty($endDate)) {  
        $data = $this->userDetailsRepository->getSearchUser($keyword,$startDate,$endDate);
        }else{
        $data = $this->userDetailsRepository->getAllUsers();
         }
        return view('admin.user.index', compact('data'));
    }
    public function UserDetailsView(int $id)
    {
        $data = $this->userDetailsRepository->getUserDetailsById($id);
        $AllImages = $this->userDetailsRepository->getAllUsersImages($id);
        $badges = $this->userDetailsRepository->getAllBadgesByUserId($id);
        return view('admin.user.view', compact('data', 'AllImages','badges'));
    }
    public function UserDocumentView(int $id)
    { 
        $data = $this->userDetailsRepository->getUserAllDocumentsById($id);
        $Additional_data = $this->userDetailsRepository->getAllAddiDocByUserId($id);
        return view('admin.user.userDoc', compact('data', 'Additional_data'));
    }
    public function UserDocumentStatus(Request $request)
    {
        // dd($request->all());
        $data = $this->userDetailsRepository->StatusUserDocument($request);
        // dd($data);
        return response()->json(['status'=>200]);
    }
    public function UserStatus($id)
    {
        // dd($request->all());
        $data = $this->userDetailsRepository->StatusUser($id);
        return redirect()->back();

        // dd($data);
        return response()->json(['status'=>200]);
    }
    public function UserBlockStatus($id)
    {
        // dd($id);
        $data = $this->userDetailsRepository->StatusUserBlock($id);
        return redirect()->back();
      
       
    }
    public function UserReportStatus(int $id)
    {
        $data = $this->userDetailsRepository->StatusUserReport($id);
        return redirect()->back();
    }
    public function UserReportView(int $id)
    {
        // $seller_id = $id;
        $block_status =$this->userDetailsRepository->getBlockStatusOfUserById($id);
        // dd($block_status);
        $data = $this->userDetailsRepository->getAllReportsById($id);
        return view('admin.user.report',compact('data','block_status'));
        // $data = $this->userDetailsRepository->StatusUserDocument($id);
        // return redirect()->back();
    }
    public function UserDetailsExport(Request $request)
    {
        //  dd($request->all());
         $start_date = $request->start_date ?? '';
         $end_date = $request->end_date ?? '';
         $keyword = $request->keyword ?? '';
         $query = User::query();
 
         $query->when($start_date && $end_date, function($query) use ($start_date, $end_date) {
             $query->where('created_at', '>=', $start_date." 00:00:00")
                   ->where('created_at', '<=', date("Y-m-d 23:59:59",strtotime($end_date)));
         });
 
         $query->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('mobile', 'like', '%' . $keyword . '%')
            ->orWhere('business_name', 'like', '%' . $keyword . '%')
            ->orWhere('state', 'like', '%' . $keyword . '%')
            ->orWhere('business_type', 'like', '%' . $keyword . '%');
        });
            $data = $query->latest('id')->get();

       
         if(count($data)>0){
            $delimiter = ",";
            $fileName = "Users Details-".date('d-m-Y').".csv";
            // Create a file pointer
            $f = fopen('php://memory', 'w');

            // Set Column Headers
            $header = array("First Name","Last Name","Email","Mobile","Gender","Address","Pincode","Short Bio","Business Name","Business Type","No of Employee","Establish Year","Legal Status","added_by","Date");
            fputcsv($f,$header,$delimiter);

            $count =1;
            foreach($data as $key => $row){
                $exportData = array(
                    $row->first_name ? $row->first_name : '',
                    $row->last_name ? $row->last_name : '',
                    $row->email ? $row->email : '',
                    $row->mobile ? $row->mobile : '',      
                    $row->gender ? $row->gender : '',      
                    $row->address ? $row->address : '',      
                    $row->pincode ? $row->pincode : '',      
                    $row->short_bio ? $row->short_bio : '',      
                    $row->business_name ? $row->business_name : '',      
                    $row->business_type ? $row->business_type : '',      
                    $row->employee ? $row->employee : '',      
                    $row->Establishment_year ? $row->Establishment_year : '',      
                    $row->legal_status ? $row->legal_status : '',      
                    $row->added_by ? $row->getEmployeeName->name : '',      
                    date("Y-m-d h:i a",strtotime($row->created_at)) ? date("d-m-Y h:i a",strtotime($row->created_at)) : ''
                    
                );
                // dd($exportData);
                fputcsv($f,$exportData,$delimiter);
                $count++;
            }
            fseek($f,0);
            // Set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $fileName . '";');

            //output all remaining data on a file pointer
            fpassthru($f);

        }
    }

    public function UserTransactionView(Request $request,int $id)
    { 
        $startDate = $request->start_date ?? '';
        $endDate = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
        if (!empty($keyword) || !empty($startDate) || !empty($endDate)) {  
            $data = $this->userDetailsRepository->getSearchUsersTransaction($keyword,$startDate,$endDate);
            }else{
            $data = $this->userDetailsRepository->getUserAllTransactionById($id);
            }
        return view('admin.user.userTransaction', compact('data','id'));
    }


}
