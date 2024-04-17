<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\PaymentManageMentContract;
use App\Models\Badge;


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

}