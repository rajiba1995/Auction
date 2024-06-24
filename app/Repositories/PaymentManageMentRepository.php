<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\PaymentManageMentContract;
use App\Models\Badge;
use App\Models\Transaction;
use App\Models\WebsiteLogs;
use Auth;


class PaymentManageMentRepository implements PaymentManageMentContract
{

    //payment section 
      //Badges
      public function getAllBadges()
      {
          return Badge::where('deleted_at',1)->paginate(20);
      }

      public function CreateBadge(array $data){

        try {
            $badge = new Badge();
            $collection = collect($data);
            $badge->title = $collection['title'];
            $badge->type = $collection['type'];
            if ($collection['type'] == 0) {
                $badge->duration = NULL;
            }else{
                $badge->duration = $collection['duration'];
            }
            $badge->short_desc = $collection['short_desc'];
            $badge->long_desc = $collection['long_desc'];
            $badge->price = $collection['price'];
            $badge->price_prefix = $collection['price_prefix'];
            $badge->status = 1;
            $badge->deleted_at = 1;
            
          
            if (isset($data['logo']) && $data['logo']->isValid()) {
                $file = $collection['logo'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/badge", $imageName);
                $uploadedImage = $imageName;
                $badge->logo = 'uploads/badge/' . $uploadedImage;
                $badge->save();
                
            } 
            return $badge;
        }
        catch (QueryException $exception) {
                throw new InvalidArgumentException($exception->getMessage());
            }
                
        }
        public function GetBadgeById($id){
            return Badge::findOrFail($id);
         }
        
         public function updateBadge(array $data)
    {

        try {

            $collection = collect($data);
            
            $badge = Badge::findOrFail($collection['id']);
            $badge->title = $collection['title'];
            $badge->type = $collection['type'];
            if ($collection['type'] == 0) {
                $badge->duration = NULL;
            }else{
                $badge->duration = $collection['duration'];
            }
            $badge->short_desc = $collection['short_desc'];
            $badge->long_desc = $collection['long_desc'];
            $badge->price = $collection['price'];
            $badge->price_prefix = $collection['price_prefix'];
            $badge->status = 1;
            $badge->deleted_at = 1;
            
            if (isset($data['logo']) && $data['logo']->isValid()) {
                $file = $collection['logo'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/badge", $imageName);
                $uploadedImage = $imageName;
                $badge->logo = 'uploads/badge/' . $uploadedImage;
            }            
        
            
    
            $badge->save();

            if($badge){
                $websiteLog =new WebsiteLogs();
                $websiteLog->emp_id = Auth::guard('admin')->user()->id;
                $websiteLog->logs_type ="UPDATED";
                $websiteLog->table_name ="badges";
                $websiteLog->response =json_encode($badge);
                $websiteLog->save();
            }
            return $badge;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function StatusBadge($id)
    {
        $badge = Badge::findOrFail($id);
        $status = $badge->status == 1 ? 0 : 1;
        $badge->status = $status;
        $badge->save();
        return $badge;
    }

    public function  deleteBadge($id){
        $badge = Badge::findOrFail($id);
        $badge->deleted_at =0;
        $badge->save();
        return $badge;
    }

    // public function getAllBadgesByUserId($id){

    // }

    public function  getAllTransaction(){
      return Transaction::latest('id')->paginate(20);
    }
    public function getSearchTransaction($keyword,$startDate,$endDate,$status)
    {
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
            
        if ($status == 1) {
            $query->where('user_type', 1); // Seller
        } elseif ($status == 2) {
            $query->where('user_type', 2); // Buyer
        }
        }
        return $data = $query->latest('id')->paginate(25);

        
    }
}