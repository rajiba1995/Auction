<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UserContract;
use App\Contracts\MasterContract;
use App\Models\WatchList;
use App\Models\User;
use App\Models\Inquiry;
use App\Models\InquiryParticipant;
use App\Models\OutsideParticipant;
use App\Models\InquiryOutsideParticipant;
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
        $group_id = "";
        $watch_list_data = [];
        $existing_inquiry = [];
        $exsisting_outside_participant = [];
        if($request->inquiry_type=="existing-inquiry"){
            $inquiry_id = $request->inquiry_id;
            $existing_inquiry = Inquiry::with('ParticipantsData')->where('inquiry_id', $inquiry_id)->first();
        }
        if($request->group && $request->inquiry_type){
            try {
                $group_id = Crypt::decrypt($request->group);
                $watch_list_data = WatchList::with('SellerData')->where('group_id', $group_id)->get();
                $outside_participant_data = OutsideParticipant::where('group_id', $group_id)->where('buyer_id', $user->id)->get();
                // return view('front.user.auction-inquiry-generation', compact('group_id','existing_inquiry', 'user','watch_list_data', 'inquiry_id', 'all_category', 'outside_participant_data', 'outside_participant_without_group'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }elseif($request->inquiry_type=="saved-inquiry"){
            try{
                $inquiry_id = Crypt::decrypt($request->inquiry_id);
                $existing_inquiry = Inquiry::with('ParticipantsData')->where('id', $inquiry_id)->first();
                $exsisting_outside_participant = InquiryOutsideParticipant::where('inquiry_id', $existing_inquiry->id)->get();
                $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->get();
                $outside_participant_without_group = [];
                $outside_participant_data = [];
                // return view('front.user.auction-inquiry-generation', compact('group_id','user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry', 'outside_participant_data', 'outside_participant_without_group'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }elseif($request->seller && $request->inquiry_type){
            try{
                $id = Crypt::decrypt($request->seller);
                $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->where('seller_id', $id)->get();
                $outside_participant_data = [];
                $outside_participant_without_group = [];
                // return view('front.user.auction-inquiry-generation', compact('group_id','user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry', 'outside_participant_data', 'outside_participant_without_group'));
            } catch ( DecryptException $e) {
                return abort(404);
            }
        }else{
            $watch_list_data = WatchList::with('SellerData')->where('group_id', null)->where('buyer_id', $user->id)->get();
            $outside_participant_data = [];
            $outside_participant_without_group = [];
        }
        
        
        $outside_participant_without_group = OutsideParticipant::where('group_id', null)->where('buyer_id', $user->id)->get();
        return view('front.user.auction-inquiry-generation', compact('group_id', 'user','watch_list_data', 'inquiry_id', 'all_category', 'existing_inquiry', 'outside_participant_data', 'outside_participant_without_group','exsisting_outside_participant'));
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
            'maximum_quote_amount' => 'required|numeric|gt:minimum_quote_amount',
            'bid_difference_quote_amount' => 'required|numeric|gt:0', // Ensure bid difference is positive
        ]);
       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $inquiry_id = $request->saved_inquiry_id?$request->saved_inquiry_id:"";
            $inquiry = Inquiry::where('id', $inquiry_id)->first();
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
            $inquiry->bid_difference_quote_amount = $request->bid_difference_quote_amount;
            $inquiry->inquiry_type = $request->auction_type?$request->auction_type:$inquiry->inquiry_type;
            

            if($request->auctionfrom == "region"){
                $inquiry->location = $request->region; 
            } elseif($request->auctionfrom == "country") {
                $inquiry->location = "India"; 
            } elseif($request->auctionfrom == "city") {
                $inquiry->location = $request->city; 
            }
            if($inquiry->inquiry_type=="close auction"){
                $user = User::findOrFail($request->created_by)->with('CityData')->first();
                $inquiry->location = $user->city?$user->CityData->city:"";
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
            
            if($inquiry && isset($request->outside_participant) && count($request->outside_participant) > 0){
              
                foreach($request->outside_participant as $key => $item){
                    $outside_participant_data = OutsideParticipant::where('id', $item)->first();
                    if($outside_participant_data ){
                        // $Exist_outside_participant = InquiryOutsideParticipant::where('inquiry_id', $inquiry->id)->where('mobile', $outside_participant_data->mobile)->first();
                        // if(!isset($Exist_outside_participant)){
                            $inqOutParti =  new InquiryOutsideParticipant;
                            $inqOutParti->inquiry_id = $inquiry->id;
                            $inqOutParti->buyer_id = $outside_participant_data->buyer_id;
                            $inqOutParti->name = $outside_participant_data->name;
                            $inqOutParti->mobile = $outside_participant_data->mobile;
                            $inqOutParti->save();
                            if($inqOutParti){
                                $outside_participant_data->delete();
                            }
                        // }
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