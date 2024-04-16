<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\PaymentManageMentContract;
use Illuminate\Validation\Rule;
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
                'logo' => 'required|image|dimensions:width=64,height=64',
                'short_desc'=>'required',
                'long_desc'=>'required',
                'price'=>'required',
                'price_prefix'=>'required',

           ],[
            'title.required'=>"Title is required",

            'title.unique'=>"Title has already been taken.",
            'logo.image' => 'The file must be an image.',
            'logo.required' => 'The file must be required.',
            'logo.dimensions' => 'The image must be 64px width and 64px height.',
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
                'logo' => 'nullable|image|dimensions:width=64,height=64',
            ], [               
                'title.required'=>"Title is required",
                'title.unique'=>"Title has already been taken.",
                'logo.image' => 'The file must be an image.',
                'logo.required' => 'The file must be required.',
                'logo.dimensions' => 'The image must be 64px width and 64px height.',
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
}
