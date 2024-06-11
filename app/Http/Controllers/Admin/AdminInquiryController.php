<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\AdminInquiryContract;
use App\Models\Inquiry;

use Illuminate\Http\Request;

class AdminInquiryController extends Controller
{
    protected $adminInquiryRepository;

    public function __construct(AdminInquiryContract $adminInquiryRepository)
    {
        $this->adminInquiryRepository = $adminInquiryRepository;
    }

    public function InquiryIndex(Request $request){
        $startDate = $request->start_date ?? '';
        $endDate = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
        if (!empty($keyword) || !empty($startDate) || !empty($endDate)) {     
            $data = $this->adminInquiryRepository->getSearchInquery($keyword,$startDate,$endDate);            
        }elseif(isset($request->status)){
            $data = $this->adminInquiryRepository->getSearchInquriesByStatus($request->status);

        }else{
            $data= $this->adminInquiryRepository->getAllInquiries();
        }
        return view('admin.inquiry.index',compact('data'));
    }
    public function InquiryDetailsView($id){
        $data= $this->adminInquiryRepository->getInquiryDetailsById($id);
        return view('admin.inquiry.view',compact('data'));
    }
    public function InquiryParticipantsView($id){
        $data=$this->adminInquiryRepository->getAllParticipantsByInquiryId($id);
        return view('admin.inquiry.participant',compact('data'));
    }

    public function InquiryDetailsExport(Request $request)
    {
        // dd($request->all());
        $start_date = $request->start_date ?? '';
        $end_date = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
        $status = $request->status ?? '';
        $query = Inquiry::query();

        $query->when($start_date && $end_date, function($query) use ($start_date, $end_date) {
            $query->where('created_at', '>=', $start_date." 00:00:00")
                  ->where('created_at', '<=', date("Y-m-d 23:59:59",strtotime($end_date)));
        });

        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('inquiry_id', 'like', '%' . $keyword . '%')
            ->orWhere('title', 'like', '%' . $keyword . '%')
            ->orWhere('location', 'like', '%' . $keyword . '%')
            ->orWhere('inquiry_amount', 'like', '%' . $keyword . '%')
            ->orWhere('category', 'like', '%' . $keyword . '%')
            ->orWhere('sub_category', 'like', '%' . $keyword . '%');
        });

        $query->when($keyword, function ($query) use ($status) {
            $query->where('status',$status);
        });


        $data = $query->latest('id')->where('inquiry_id','!=',null)->get();
        // dd($data);

        if(count($data)>0){
            $delimiter = ",";
            $fileName = "Inquiry Details-".date('d-m-Y').".csv";
            // Create a file pointer
            $f = fopen('php://memory', 'w');

            // Set Column Headers
            $header = array("Inquiry Id","Buyer Name","Title","Inquiry Type","Location","Category","Sub-Category","Start Date & Time","End Date & Time","Description","Execution Date","Participants","Minimum Quote Amount","Maximum Quote Amount","Final Quote","Allot Seller","Date");
            fputcsv($f,$header,$delimiter);

            $count =1;
            foreach($data as $key => $row){
                $exportData = array(
                    $row->inquiry_id ? $row->inquiry_id : '',
                    $row->BuyerData ? $row->BuyerData->name : '',      
                    $row->title ? $row->title : '',
                    $row->inquiry_type ? $row->inquiry_type : '',
                    $row->location ? $row->location : '',      
                    $row->category ? $row->category : '',      
                    $row->sub_category ? $row->sub_category : '',      
                    $row->start_date && $row->start_time ? date('d M, Y', strtotime($row->start_date))."//".date('g:i A', strtotime($row->start_time)) : '',      
                    $row->end_date && $row->end_time ? date('d M, Y', strtotime($row->end_date))."//".date('g:i A', strtotime($row->end_time)) : '',                              
                    $row->description ? $row->description : '',      
                    date("Y-m-d h:i a",strtotime($row->execution_date)) ? date("d-m-Y h:i a",strtotime($row->execution_date)) : '',
                    $row->quotes_per_participants ? $row->quotes_per_participants : '',      
                    $row->minimum_quote_amount ? number_format($row->minimum_quote_amount,2, '.', ',') : '',      
                    $row->maximum_quote_amount ? number_format($row->maximum_quote_amount,2, '.', ',') : '',      
                    $row->inquiry_amount ? number_format($row->inquiry_amount,2, '.', ',') : '',      
                    $row->allot_seller ? $row->BuyerData->name : '',      
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

}