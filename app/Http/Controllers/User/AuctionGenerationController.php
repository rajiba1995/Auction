<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\MasterContract;
use App\Models\WatchList;
use App\Models\Inquiry;
use App\Models\InquiryParticipant;
use App\Models\GroupWatchList;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;



class AuctionGenerationController extends Controller
{
    protected $userRepository;
    protected $MasterRepository;

    public function __construct(UserContract $userRepository, MasterContract $MasterRepository) {
        $this->userRepository = $userRepository;
        $this->MasterRepository = $MasterRepository;
    }
    private function AuthCheck(){
        if(Auth::guard('web')->check()){
            return Auth::guard('web')->user();
        } else{
           return "";
        }
    }

    public function auction_inquiry_generation(Request $request){
        $all_category = $this->MasterRepository->getAllActiveCollections();
        $user = $this->AuthCheck();
        $inquiry_id = "";
        $watch_list_data = [];
        $existing_inquiry = [];
        if($request->inquiry_type=="existing-inquiry"){
            $inquiry_id = $request->inquiry_id;
            $existing_inquiry = Inquiry::with('ParticipantsData')->where('inquiry_id', $inquiry_id)->first();
        }
        if($request->group && $request->inquiry_type){
            try {
                $id = Crypt::decrypt($request->group);
                $watch_list_data = WatchList::with('SellerData')->where('group_id', $id)->get();
                return view('front.user.auction-inquiry-generation', compact('existing_inquiry', 'user','watch_list_data', 'inquiry_id', 'all_category'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }elseif($request->inquiry_type=="saved-inquiry"){
            try{
                $inquiry_id = Crypt::decrypt($request->inquiry_id);
                $existing_inquiry = Inquiry::with('ParticipantsData')->where('id', $inquiry_id)->first();
                $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->get();
                return view('front.user.auction-inquiry-generation', compact('user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }elseif($request->seller && $request->inquiry_type){
            try{
                $id = Crypt::decrypt($request->seller);
                $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->where('seller_id', $id)->get();
                return view('front.user.auction-inquiry-generation', compact('user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }else{
            $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->get();
            return view('front.user.auction-inquiry-generation', compact('user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry'));
        }
    }

    public function auction_inquiry_generation_store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'category' => 'required',
            'sub_category' => 'required',
            // 'description' => 'nullable|string',
            'execution_date' => 'required|date',
            'quotes_per_participants' => 'required|numeric',    
            'minimum_quote_amount' => 'required|numeric',
            'maximum_quote_amount' => 'required|numeric',
        ]);
       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $inquiry_id = $request->saved_inquiry_id?$request->saved_inquiry_id:"";
            $inquiry = Inquiry::where('id', $inquiry_id)->first();
            // dd($request->all());
            if(empty($inquiry)){
                $inquiry = new Inquiry;
                if($request->submit_type == "generate"){
                    $order_no = genAutoIncreNoYearWiseInquiry(8,'inquiries',date('Y'),date('m'));
                    $inquiry->inquiry_id = $order_no;
                }
            }else{
                if($request->submit_type == "generate" && $inquiry->inquiry_id==null){
                    $order_no = genAutoIncreNoYearWiseInquiry(8,'inquiries',date('Y'),date('m'));
                    $inquiry->inquiry_id = $order_no;
                }
            }
             
            $inquiry->created_by = $request->created_by;
            $inquiry->title = ucwords($request->title);
            $inquiry->slug = slugGenerate($request->title, 'inquiries');
            $inquiry->start_date = $request->start_date;
            $inquiry->start_time = $request->start_time;
            $inquiry->end_date = $request->end_date;
           
            $inquiry->end_time = $request->end_time;
            $inquiry->category = $request->category;
            $inquiry->sub_category = $request->sub_category;
            $inquiry->description = $request->description;
            $inquiry->execution_date = $request->execution_date;
            $inquiry->quotes_per_participants = $request->quotes_per_participants;
            $inquiry->minimum_quote_amount = $request->minimum_quote_amount;
           
            $inquiry->maximum_quote_amount = $request->maximum_quote_amount;
            $inquiry->inquiry_type = $request->auction_type?$request->auction_type:$inquiry->inquiry_type;
    
            if($request->auctionfrom == "region"){
                $inquiry->location = $request->region; 
            } elseif($request->auctionfrom == "country") {
                $inquiry->location = "India"; 
            } elseif($request->auctionfrom == "city") {
                $inquiry->location = $request->city; 
            }
            $inquiry->location_type =$request->auctionfrom;
            $inquiry->save();
            // dd($request->all());
            if($inquiry && isset($request->participant) && count($request->participant) > 0){
                foreach($request->participant as $key => $item){
                    $exist_participants = InquiryParticipant::where('inquiry_id', $inquiry->id)->where('user_id', $item)->get();
                    if(count($exist_participants)==0){
                        $participant = new InquiryParticipant;
                        $participant->inquiry_id = $inquiry->id;
                        $participant->user_id = $item;
                        $participant->save();
                    }
                  
                }
            }
            if($request->submit_type == "generate"){
                return redirect()->route('user_buyer_dashboard')->with('success', 'Inquiry has been generated successfully.');

            }else{
                return redirect()->route('user_buyer_dashboard')->with('success', 'Inquiry data has been saved successfully.');
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
             return abort(404);
         }
    }

    public function auction_participants_delete(Request $request){
        InquiryParticipant::destroy($request->id);
        return response()->json(['status'=>200]);  
    }
    
    
}