<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\UserDetailsContract;

use App\Models\User;
use App\Models\UserDocument;
use App\Models\SellerReport;
use App\Models\UserImage;
use App\Models\UserAdditionalDocument;



class UserDetailsRepository implements UserDetailsContract
{
    public function getAllUsers()
    {
        return User::orderBy('name', 'ASC')->paginate(20);
    }
    public function getUserDetailsById(int $id)
    {
        return User::findOrFail($id);
    }
    public function getAllUsersImages(int $id)
    {
        return UserImage::where('user_id', $id)->get();
    

    }
    public function getUserAllDocumentsById(int $id)
    {
         return UserDocument::where('user_id',$id)->first(); 
    
    }
    public function getAllAddiDocByUserId(int $id)
    {
         return UserAdditionalDocument::where('user_id',$id)->get(); 
    
    }
    public function getSearchUser(string $term)
    {
        $query = User::query();

        $query->when($term, function ($query) use ($term) {
            $query->where('name', 'like', '%' . $term . '%')
            ->orWhere('email', 'like', '%' . $term . '%')
            ->orWhere('mobile', 'like', '%' . $term . '%')
            ->orWhere('business_name', 'like', '%' . $term . '%')
            ->orWhere('business_type', 'like', '%' . $term . '%');
        });
        return $data = $query->latest('id')->paginate(25);
    }
    public function StatusUserDocument($request){
        if($request->type=='additional_doc'){
            $add_doc = UserAdditionalDocument::findOrFail($request->id);
            $add_doc->status = $request->status;
            $add_doc->save();   
            return $add_doc;
        }

        $document = UserDocument::findOrFail($request->id);
        if($request->type == 'gst'){
            $document->gst_status = $request->status;
        }elseif($request->type == 'pan'){
            $document->pan_status = $request->status;
        }elseif($request->type == 'adhar'){
            $document->adhar_status = $request->status;
        }elseif($request->type == 'trade_license'){
            $document->trade_license_status = $request->status;
        }elseif($request->type == 'cancelled_cheque'){
            $document->cancelled_cheque_status = $request->status;
        }
        $document->save();

        return $document;
    }
    public function StatusUserReport($id){
        $report = SellerReport::findOrFail($id);
        $status = $report->status == 0 ? 1 : 0;
        $report->status = $status;
        $report->save();
        return $report;
    }
    public function getAllReportsById($id){
        return SellerReport::where('seller_id',$id)->paginate(20); 

    }


}