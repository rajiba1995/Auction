<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\AdminInquiryContract;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Inquiry;
use App\Models\InquirySellerQuotes;
use App\Models\InquirySellerComments;
use App\Models\User;

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

    public function InquiryPdfGenarate($id){
        $inquiry = Inquiry::where('id',$id)->first();
        $final_seller_details = User::where('id',$inquiry->allot_seller)->first();
        $buyer_details = User::where('id',$inquiry->created_by)->first();
        $max_rate = InquirySellerQuotes::where('inquiry_id', $id)->max('quotes');
        $min_rate = InquirySellerQuotes::where('inquiry_id', $id)->min('quotes');
        $seller_ids = InquirySellerQuotes::select('seller_id')
        ->where('inquiry_id', $id)
        ->groupBy('seller_id')
        ->pluck('seller_id')
        ->toArray();
        $seller_data = [];
        foreach($seller_ids as $key =>$seller_id){
            $latest_quote = InquirySellerQuotes::where('seller_id', $seller_id)->where('inquiry_id', $id)->latest()->first()->quotes;
            $first_quote = InquirySellerQuotes::where('seller_id', $seller_id)->where('inquiry_id', $id)->orderBy('id', 'ASC')->first()->quotes;
            $seller_comments = InquirySellerComments::where('seller_id', $seller_id)->where('inquiry_id', $id)->latest()->take(2)->get();
            // Get seller details from the User table
            $seller_details = User::find($seller_id);
            //  dd($seller_details);
        // Store the seller data
        $seller_data[$seller_id] = [
            'latest_quote' => $latest_quote,
            'first_quote' => $first_quote,
            'seller_details' => $seller_details,
            'seller_comments'=>$seller_comments
        ];
        
        }
        $data = [
            'inquiry' => $inquiry,
            'max_rate' => $max_rate,
            'min_rate' => $min_rate,
            'buyer_details' => $buyer_details,
            'final_seller_details' => $final_seller_details,
            'seller_data' => $seller_data,
            'seller_count' => count($seller_ids)
        ];
        $pdf = Pdf::loadView('admin.inquiry.generate-inquiry-pdf', $data);
        return $pdf->download('inquiry-pdf.pdf');
    }

}