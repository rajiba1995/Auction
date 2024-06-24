<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\PaymentManageMentContract;
use Illuminate\Validation\Rule;
use App\Models\Transaction;
use Auth;

class PaymentManageMentController extends Controller
{
    protected $payment_management_Repository;

    public function __construct(PaymentManageMentContract $payment_management_Repository)
    {
        $this->payment_management_Repository = $payment_management_Repository;
    }

     //payment section 

     // badge
     public function BadgeIndex()
     {
         $data = $this->payment_management_Repository->getAllBadges();
         return view('admin.badge.index',compact('data'));
     }
     public function BadgeCreate()
     {
         return view('admin.badge.create');
     }
     public function  BadgeStore(Request $request){
  
           // dd($request->all());
           $request->validate([
                'title'=>'required| unique:badges,title',
                'logo' => 'required|image|dimensions:max_width=250,max_height=250',
                'short_desc'=>'required',
                'long_desc'=>'required',
                'price'=>'required',
                'price_prefix'=>'required',

           ],[
            'title.required'=>"Title is required",

            'title.unique'=>"Title has already been taken.",
            'logo.image' => 'The file must be an image.',
            'logo.required' => 'The file must be required.',
            'logo.dimensions' => 'The image must be 250px width and 250px height.',
            'short_desc.required'=>"Short Description is required",  
            'long_desc.unique'=>"Long Description is required",   
            'price.required'=>"Phone number is required",  
            'price_prefix.required'=>"Currency type is required",    
           ]);
           $params = $request->except('_token');
           $data = $this->payment_management_Repository->CreateBadge($params);
           if ($data) {
               return redirect()->route('admin.badge.index')->with('success', 'Badge has been successfully Added!');
           } else {
               return redirect()->route('admin.badge.create')->with('error', 'Something went wrong please try again!');
           }  
        }  
    public function BadgeEdit($id){
        $data = $this->payment_management_Repository->GetBadgeById($id);
        return view('admin.badge.edit', compact('data'));
    }
    public function BadgeUpdate(Request $request)
    {

            $request->validate([
                'title'=>'required', Rule::unique('badges', 'title')->ignore($request->id),
                'short_desc'=>'required',
                'long_desc'=>'required',
                'price'=>'required',
                'price_prefix'=>'required',
                'logo' => 'nullable|image|dimensions:max_width=250,max_height=64',
            ], [               
                'title.required'=>"Title is required",
                'title.unique'=>"Title has already been taken.",
                'logo.image' => 'The file must be an image.',
                'logo.required' => 'The file must be required.',
                'logo.dimensions' => 'The image must be 250px width and 250px height.',
                'short_desc.required'=>"Short Description is required",  
                'long_desc.unique'=>"Long Description is required",   
                'price.required'=>"Phone number is required",  
                'price_prefix.required'=>"Currency type is required",    
            ]);    

        $params = $request->except('_token');
        $data = $this->payment_management_Repository->updateBadge($params);
        if ($data) {
            return redirect()->route('admin.badge.index')->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.badge.edit',$request->id)->with('error', 'Something went wrong please try again!');
        }
    }   
    public function BadgeStatus($id)
    {
        $data = $this->payment_management_Repository->StatusBadge($id);
        return redirect()->back();
    }
    public function BadgeDelete($id){
        $data = $this->payment_management_Repository->deleteBadge($id);
        if ($data) {
            return redirect()->route('admin.badge.index')->with('success', 'Badge has been Deleted Successfully!');
        } else {
            return redirect()->route('admin.badge.index')->with('error', 'Something went wrong please try again!');
        }
    }
    // //Badge fetch by User id
    // public function getAllBadges(){
    //     $userId = Auth::guard('web')->user()->id;
    //     dd($userId);
    //     $data = $this->payment_management_Repository->getAllBadgesByUserId($userId);
    // }

    // badge
    public function TransactionIndex(Request $request)
    {
        $startDate = $request->start_date ?? '';
        $endDate = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
        $status = $request->status ?? '';
        if (!empty($keyword) || !empty($startDate) || !empty($endDate) || !empty($status) ) {     
            $data = $this->payment_management_Repository->getSearchTransaction($keyword,$startDate,$endDate,$status);            
            }else{
             $data = $this->payment_management_Repository->getAllTransaction();
            }
        return view('admin.transaction.index',compact('data','status'));
    }
    public function TransactionDetailsExport(Request $request)
    {
        $startDate = $request->start_date ?? '';
        $endDate = $request->end_date ?? '';
        $keyword = $request->keyword ?? '';
        $status = $request->status ?? '';

        $query = Transaction::query();

        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('unique_id', 'like', '%' . $keyword . '%')
            ->orWhere('transaction_id', 'like', '%' . $keyword . '%')
            ->orWhere('amount', 'like', '%' . $keyword . '%');
            // ->orWhere('role', 'like', '%' . $term . '%');
        });
        if (!is_null($startDate) && !is_null($endDate)) {
      
            $query->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                $query->where('created_at', '>=', $startDate." 00:00:00")
                      ->where('created_at', '<=', date("Y-m-d 23:59:59",strtotime($endDate)));
            });
        }
        if ($status == 1) {
            $query->where('user_type', 1); // Seller
        } elseif ($status == 2) {
            $query->where('user_type', 2); // Buyer
        }
        $data = $query->latest('id')->get();

        if(count($data)>0){
            $delimiter = ",";
            $fileName = "Transaction Details-".date('d-m-Y').".csv";
            // Create a file pointer
            $f = fopen('php://memory', 'w');

            // Set Column Headers
            $header = array("UniqueId","TransactionId","UserName","Email","Mobile","Amount","Date");
            fputcsv($f,$header,$delimiter);

            $count =1;
            foreach($data as $key => $row){
                $exportData = array(
                    $row->unique_id ? $row->unique_id : '',
                    $row->transaction_id ? $row->transaction_id : '',
                    $row->getUserAllDetails ? $row->getUserAllDetails->name : '',
                    $row->getUserAllDetails ? $row->getUserAllDetails->email : '',
                    $row->getUserAllDetails ? $row->getUserAllDetails->mobile : '',          
                    $row->amount ? $row->amount : '',          
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
