<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\UserDetailsContract;
// use App\Models\Admin;
use App\Models\User;
use App\Models\MyBadge;
use App\Models\Product;
use App\Models\UserDocument;
use App\Models\SellerReport;
use App\Models\Transaction;
use App\Models\MySellerPackage;
use App\Models\MyBuyerPackage;

use App\Models\UserImage;
use App\Models\UserAdditionalDocument;
use Illuminate\Support\Facades\DB;



class UserDetailsRepository implements UserDetailsContract
{
    public function getAllUsers()
    {
        return User::with('UserDocumentData')->orderBy('name', 'ASC')->where('added_by',NULL)->paginate(20);
    }
    public function getAllUsersByEmployee()
    {
        return User::with('UserDocumentData')->whereNotNull('added_by')->latest('id')->paginate(20);
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
    public function getAllBadgesByUserId($id){
       return MyBadge::where('user_id',$id)->get();
    }
    public function getAllProductsByUserId($id){
       return Product::where('user_id',$id)->get();
    }
    
    public function getUserAllTransactionById($id){
       return Transaction::where('user_id',$id)->paginate(20);
    }
    
    public function getSearchUsersTransaction($keyword,$startDate,$endDate,$status,$id)
    {
        $query = Transaction::query();

        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('unique_id', 'like', '%' . $keyword . '%')
            ->orWhere('purpose', 'like', '%' . $keyword . '%')
            ->orWhere('amount', 'like', '%' . $keyword . '%')
            ->orWhere('transaction_id', 'like', '%' . $keyword . '%')
            ->orWhere('transaction_source', 'like', '%' . $keyword . '%');
            // ->orWhere('', 'like', '%' . $keyword . '%');
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
        return $data = $query->where('user_id',$id)->latest('id')->paginate(25);
    }
    public function getUserSellerCurrentPackageById($id)
    {
       return MySellerPackage::where('user_id',$id)->first();
    }
    public function getUserSellerOldPackageById($id)
    {
       $data = DB::table('old_seller_packages')->where('user_id',$id)->latest('id')->paginate(20);
       return $data;

    }
    public function getUserBuyerCurrentPackageById($id)
    {
       return MyBuyerPackage::where('user_id',$id)->first();
    }
    public function getUserBuyerOldPackageById($id)
    {
    //    $data = DB::table('old_seller_packages')->where('user_id',$id)->get();
       $data = DB::table('old_buyer_packages')->where('user_id',$id)->latest('id')->paginate(20);
       return $data;

    }

}