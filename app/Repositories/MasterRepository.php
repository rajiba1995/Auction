<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\MasterContract;

use App\Models\Banner;
use App\Models\Collection;
use App\Models\Category;
use App\Models\Tutorial;
use App\Models\Client;
use App\Models\Feedback;
use App\Models\SocialMedia;
use App\Models\Business;
use App\Models\LegalStatus;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;





class MasterRepository implements MasterContract
{
    //Banner
    public function getAllBanners()
    {
        return Banner::orderBy('file_path', 'ASC')->paginate(20);
    }
    public function CreateBanner(array $data)
    {

        try {
            $banner = new Banner();
            $collection = collect($data);
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/banner", $imageName);
                $uploadedImage = $imageName;
                $banner->file_path = 'uploads/banner/' . $uploadedImage;
                $banner->video_path="";
            }elseif(isset($data['video']) && $data['video']->isValid()) {
                $file_video = $collection['video'];
                $videoName = time() . "." . $file_video->getClientOriginalExtension();
                $file_video->move("uploads/banner", $videoName);
                $uploadedVideo = $videoName;
                $banner->video_path = 'uploads/banner/' . $uploadedVideo;
                $banner->file_path="";

            }

            $banner->save();
            return $banner;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function StatusBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $status = $banner->status == 1 ? 0 : 1;
        $banner->status = $status;
        $banner->save();
        return $banner;
    }
    public function GetBannerById($id)
    {
        return Banner::findOrFail($id);
    }
    public function updateBanner(array $data)
    {

        try {
            $collection = collect($data);
            $banner = Banner::findOrFail($collection['id']);
  

            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/banner", $imageName);
                $uploadedImage = $imageName;
                $banner->file_path = 'uploads/banner/' . $uploadedImage;
                $banner->video_path="";

            }            
        
            if(isset($data['video']) && $data['video']->isValid()) {
                $file_video = $collection['video'];
                $videoName = time() . "." . $file_video->getClientOriginalExtension();
                $file_video->move("uploads/banner", $videoName);
                $uploadedVideo = $videoName;
                $banner->video_path = 'uploads/banner/' . $uploadedVideo;
                $banner->file_path="";
            } 
    
            $banner->save();
            return $banner;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteBanner($id)
    {
        $delete = Banner::findOrFail($id);
        $image_path = $delete->file_path;
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $delete->delete();
        return $delete;
    }

    //Collection
    public function getAllCollections()
    {
        return Collection::latest()->where('status', 1)->where('deleted_at', 1)->paginate(20);
    }
    public function getSearchCollectionByStatus($status)
    {
        return Collection::where([['status', 'LIKE', '%' . $status . '%']])->where('deleted_at', 1)
        ->paginate(20);   
        // dd($data);

    }
    public function getAllActiveCollections()
    {
        return Collection::orderBy('title', 'ASC')->where('deleted_at', 1)->where('status', 1)->paginate(20);
    }
    public function CreateCollection(array $data)
    {
        try {
            $collect = new Collection();
            $collection = collect($data);
            $collect->title = $collection['title'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/collection", $imageName);
                $uploadedImage = $imageName;
                $collect->image = 'uploads/collection/' . $uploadedImage;
            }


            $collect->save();
            return $collect;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function StatusCollection($id, $status)
    {
        $collection = Collection::findOrFail($id);
        $collection->status = $status;
        $collection->save();
        return $collection;
    }
    public function GetCollectionById($id)
    {
        return Collection::findOrFail($id);
    }
    public function updateCollection(array $data)
    {

        try {
            $collection = collect($data);
            $collect = Collection::findOrFail($collection['id']);
            $collect->title = $collection['title'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/collection", $imageName);
                $uploadedImage = $imageName;
                $collect->image = 'uploads/collection/' . $uploadedImage;
            } else {
                $collect->image = $collection['old_collection_img'];
            }
            $collect->save();
            return $collect;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteCollection($id)
    {
        $delete = Collection::findOrFail($id);
        $delete->deleted_at = 0;
        $delete->save();
        if ($delete->deleted_at == 0) {
            $image_path = $delete->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }
        return $delete;
    }
    public function getSubcategoryByCategoryId($id)
    {
       return  Category::where('collection_id',$id)->get();
    }

    //category

    public function getAllCategories()
    {
        return Category::latest()->where('deleted_at', 1)->paginate(20);
    }
    public function getAllActiveCategories()
    {
        return Category::latest()->where('deleted_at', 1)->where('status', 1)->paginate(20);
    }
    public function CollectionWiseCategoryData($data)
    {
        return Category::latest()->where('deleted_at', 1)->where('status', 1)->where('collection_id', $data)->get();
    }
    public function CollectionWiseCategoryDataByTitle($data)
    {
        return Category::latest()->where('deleted_at', 1)->where('status', 1)->where('collection_id', $data)->get();
    }
    public function CreateCategory(array $data)
    {
        try {
            $category = new Category();
            $collection = collect($data);
            $category->title = $collection['title'];
            $category->collection_id = $collection['collection'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/category", $imageName);
                $uploadedImage = $imageName;
                $category->image = 'uploads/category/' . $uploadedImage;
            }


            $category->save();
            return $category;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function StatusCategory($id)
    {
        $category = Category::findOrFail($id);
        $status = $category->status == 1 ? 0 : 1;
        $category->status = $status;
        $category->save();
        return $category;
    }
    public function GetCategoryById($id)
    {
        return Category::findOrFail($id);
    }
    public function updateCategory(array $data)
    {

        try {
            $collection = collect($data);
            $category = Category::findOrFail($collection['id']);
            $category->title = $collection['title'];
            $category->collection_id = $collection['collection'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/category", $imageName);
                $uploadedImage = $imageName;
                $category->image = 'uploads/category/' . $uploadedImage;
            } else {
                $category->image = $collection['old_category_img'];
            }
            $category->save();
            return $category;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteCategory($id)
    {
        $delete = Category::findOrFail($id);
        $delete->deleted_at = 0;
        $delete->save();
        if ($delete->deleted_at == 0) {
            $image_path = $delete->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }
        return $delete;
    }


    //Tutorials
    public function getAllTutorials()
    {
        return Tutorial::latest()->where('deleted_at', 1)->paginate(20);
    }
    public function CreateTutorial(array $data)
    {

        try {
            $tutorial = new Tutorial();
            $collection = collect($data);
            if (isset($data['video']) && $data['video']->isValid()) {
                $file = $collection['video'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/tutorial", $imageName);
                $uploadedImage = $imageName;
                $tutorial->file_path = 'uploads/tutorial/' . $uploadedImage;
            }

            $tutorial->save();
            return $tutorial;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function StatusTutorial($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        $status = $tutorial->status == 1 ? 0 : 1;
        $tutorial->status = $status;
        $tutorial->save();
        return $tutorial;
    }
    public function GetTutorialById($id)
    {
        return Tutorial::findOrFail($id);
    }
    public function updateTutorial(array $data)
    {

        try {
            $collection = collect($data);
            $tutorial = Tutorial::findOrFail($collection['id']);
            if (isset($data['video']) && $data['video']->isValid()) {
                $file = $collection['video'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/tutorial", $imageName);
                $uploadedImage = $imageName;
                $tutorial->file_path = 'uploads/tutorial/' . $uploadedImage;
            } else {
                $tutorial->file_path = $collection['old_tutorial_img'];
            }
            $tutorial->save();
            return $tutorial;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteTutorial($id)
    {
        $delete = Tutorial::findOrFail($id);
        $delete->deleted_at = 0;
        $delete->save();
        if ($delete->deleted_at == 0) {
            $image_path = $delete->file_path;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }
        return $delete;
    }

    //Clients
    public function getAllClients()
    {
        return Client::latest()->where('deleted_at', 1)->paginate(20);
    }
    public function CreateClient(array $data)
    {
        try {
            $client = new Client();
            $collection = collect($data);
            $client->title = $collection['title'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/client", $imageName);
                $uploadedImage = $imageName;
                $client->image = 'uploads/client/' . $uploadedImage;
            }
            $client->save();
            return $client;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function StatusClient($id)
    {
        $client = Client::findOrFail($id);
        $status = $client->status == 1 ? 0 : 1;
        $client->status = $status;
        $client->save();
        return $client;
    }
    public function GetClientById($id)
    {
        return Client::findOrFail($id);
    }
    public function updateClient(array $data)
    {

        try {
            $collection = collect($data);
            $client = Client::findOrFail($collection['id']);
            $client->title = $collection['title'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $file = $collection['image'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/client", $imageName);
                $uploadedImage = $imageName;
                $client->image = 'uploads/client/' . $uploadedImage;
            } else {
                $client->image = $collection['old_client_img'];
            }
            $client->save();
            return $client;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteClient($id)
    {
        $delete = Client::findOrFail($id);
        $delete->deleted_at = 0;
        $delete->save();
        if ($delete->deleted_at == 0) {
            $image_path = $delete->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }
        return $delete;
    }



    //Feddback
    public function getAllFeedbacks()
    {
        return Feedback::latest()->where('deleted_at', 1)->paginate(20);
    }
    public function CreateFeedback(array $data)
    {
        try {
            $feedback = new Feedback();
            $collection = collect($data);
            $feedback->customer_name = $collection['customer_name'];
            $feedback->customer_designation = $collection['customer_designation'];
            $feedback->company_name = $collection['company_name'];
            $feedback->message = $collection['message'];
            if (isset($data['logo']) && $data['logo']->isValid()) {
                $file = $collection['logo'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/feedback", $imageName);
                $uploadedImage = $imageName;
                $feedback->logo = 'uploads/feedback/' . $uploadedImage;
            }
            $feedback->save();
            return $feedback;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function StatusFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        $status = $feedback->status == 1 ? 0 : 1;
        $feedback->status = $status;    
        $feedback->save();
        return $feedback;
    }
    public function GetFeedbackById($id)
    {
        return Feedback::findOrFail($id);
    }
    public function updateFeedback(array $data)
    {

        try {
            $collection = collect($data);
            $feedback = Feedback::findOrFail($collection['id']);
            $feedback->customer_name = $collection['customer_name'];
            $feedback->customer_designation = $collection['customer_designation'];
            $feedback->company_name = $collection['company_name'];
            $feedback->message = $collection['message'];
            if (isset($data['logo']) && $data['logo']->isValid()) {
                $file = $collection['logo'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/feedback", $imageName);
                $uploadedImage = $imageName;
                $feedback->logo = 'uploads/feedback/' . $uploadedImage;
            } else {
                $feedback->logo = $collection['old_feedback_img'];
            }
            $feedback->save();
            return $feedback;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteFeedback($id)
    {
        $delete = Feedback::findOrFail($id);
        $delete->deleted_at = 0;
        $delete->save();
        if ($delete->deleted_at == 0) {
            $image_path = $delete->logo;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }
        return $delete;
    }



    //Social Media
    public function getAllSocialMedias()
    {
        return SocialMedia::orderBy('title', 'ASC')->paginate(20);
    }
    public function CreateSocialMedia(array $data)
    {
        try {
            $socialMedia = new SocialMedia();
            $collection = collect($data);
            $socialMedia->title = $collection['title'];
            $socialMedia->link = $collection['link'];
            if (isset($data['logo']) && $data['logo']->isValid()) {
                $file = $collection['logo'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/social_media", $imageName);
                $uploadedImage = $imageName;
                $socialMedia->logo = 'uploads/social_media/' . $uploadedImage;
            }
            $socialMedia->save();
            return $socialMedia;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    // public function StatusSocialMedia($id)
    // {
    //     $feedback = SocialMedia::findOrFail($id);
    //     $status = $feedback->status == 1 ? 0 : 1;
    //     $feedback->status = $status;    
    //     $feedback->save();
    //     return $feedback;
    // }
    public function GetSocialMediaById($id)
    {
        return SocialMedia::findOrFail($id);
    }
    public function updateSocialMedia(array $data)
    {

        try {
            $collection = collect($data);
            $socialMedia = SocialMedia::findOrFail($collection['id']);
            $socialMedia->title = $collection['title'];
            $socialMedia->link = $collection['link'];
            if (isset($data['logo']) && $data['logo']->isValid()) {
                $file = $collection['logo'];
                $imageName = time() . "." . $file->getClientOriginalExtension();
                $file->move("uploads/social_media", $imageName);
                $uploadedImage = $imageName;
                $socialMedia->logo = 'uploads/social_media/' . $uploadedImage;
            } else {
                $socialMedia->logo = $collection['old_logo_img'];
            }
            $socialMedia->save();
            return $socialMedia;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteSocialMedia($id)
    {
        $delete = SocialMedia::findOrFail($id);
        $image_path = $delete->logo;
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $delete->delete();
        return $delete;
    }

     //Business
     public function getAllBusiness()
     {
         return Business::where('deleted_at', 1)->paginate(20);
     }
     public function CreateBusiness(array $data)
     {
         try {
             $business = new Business();
             $collection = collect($data);
             $business->name = $collection['name'];
             $business->save();
             return $business;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function StatusBusiness($id)
     {
         $business = Business::findOrFail($id);
         $status = $business->status == 1 ? 0 : 1;
         $business->status = $status;    
         $business->save();
         return $business;
     }
     public function GetBusinessById($id)
     {
         return Business::findOrFail($id);
     }
     public function updateBusiness(array $data)
     {
 
         try {
             $collection = collect($data);
             $business = Business::findOrFail($collection['id']);
             $business->name = $collection['name'];
             $business->save();
             return $business;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function DeleteBusiness($id)
     {
         $delete = Business::findOrFail($id);
         $delete->deleted_at = 0;
         
         $delete->save();
         return $delete;
     }
    


     //LegalStatus
     public function getAllLegalstatus()
     {
         return LegalStatus::where('deleted_at', 1)->paginate(20);
     }
     public function CreateLegalStatus(array $data)
     {
         try {
             $legal_status = new LegalStatus();
             $collection = collect($data);
             $legal_status->name = $collection['name'];
             $legal_status->save();
             return $legal_status;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function StatusLegalStatus($id)
     {
         $legal_status = LegalStatus::findOrFail($id);
         $status = $legal_status->status == 1 ? 0 : 1;
         $legal_status->status = $status;    
         $legal_status->save();
         return $legal_status;
     }
     public function GetLegalStatusById($id)
     {
         return LegalStatus::findOrFail($id);
     }
     public function updateLegalStatus(array $data)
     {
 
         try {
             $collection = collect($data);
             $legal_status = LegalStatus::findOrFail($collection['id']);
             $legal_status->name = $collection['name'];
             $legal_status->save();
             return $legal_status;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function DeleteLegalStatus($id)
     {
         $delete = LegalStatus::findOrFail($id);
         $delete->deleted_at = 0;
         
         $delete->save();
         return $delete;
     }
}