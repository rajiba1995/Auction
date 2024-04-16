<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\UserDetailsContract;
// use App\Models\Admin;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\SellerReport;

use App\Models\UserImage;
use App\Models\UserAdditionalDocument;



class UserDetailsRepository implements UserDetailsContract
{
    public function getAllUsers()
    {
        return User::with('UserDocumentData')->orderBy('name', 'ASC')->paginate(20);
    }
    public function getUserDetailsById(int $id)
    {
        return User::findOrFail($id);
    }
    public function StatusUser($id){
        $user = User::findOrFail($id);
         $status = $user->status == 1 ? 0 : 1;
         $user->status = $status;    
         $user->save();
         return $user;
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
    public function getSearchUser($keyword,$startDate,$endDate)
    {
        $query = User::query();

        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('mobile', 'like', '%' . $keyword . '%')
            ->orWhere('business_name', 'like', '%' . $keyword . '%')
            ->orWhere('state', 'like', '%' . $keyword . '%')
            ->orWhere('business_type', 'like', '%' . $keyword . '%');
        });
        if (!is_null($startDate) && !is_null($endDate)) {
      
            $query->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                $query->where('created_at', '>=', $startDate." 00:00:00")
                      ->where('created_at', '<=', date("Y-m-d 23:59:59",strtotime($endDate)));
            });
        }
        return $data = $query->with('UserDocumentData')->latest('id')->paginate(25);
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
    public function StatusUserBlock($id){
        $block = User::findOrFail($id);
        $status = $block->block_status == 0 ? 1 : 0;
        $block->block_status = $status;
        $block->save();
        return $block;
    }
    public function getAllReportsById($id){
        return SellerReport::where('seller_id',$id)->paginate(20); 

    }
    public function getBlockStatusOfUserById($id){
        return User::findOrFail($id);

    }


}