<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\MasterContract;

use App\Models\Banner;
use App\Models\Collection;
use App\Models\Category;
use App\Models\Tutorial;
use App\Models\Inquiry;
use App\Models\InquiryParticipant;
use App\Models\Client;
use App\Models\Feedback;
use App\Models\SocialMedia;
use App\Models\Badge;
use App\Models\Business;
use App\Models\BuyerCancell;
use App\Models\SellerCancell;
use App\Models\City;
use App\Models\State;
use App\Models\EmployeeAttandance;
use App\Models\Admin;
use App\Models\User;
use App\Models\MyBuyerPackage;
use App\Models\MyBuyerWallet;
use App\Models\MySellerWallet;
use App\Models\MySellerPackage;
use App\Models\LegalStatus;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Hash;





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
                $banner->image_link = $collection['image_link'];
                $banner->video_path="";
            }elseif(isset($data['video']) && $data['video']->isValid()) {
                $file_video = $collection['video'];
                $videoName = time() . "." . $file_video->getClientOriginalExtension();
                $file_video->move("uploads/banner", $videoName);
                $uploadedVideo = $videoName;
                $banner->video_path = 'uploads/banner/' . $uploadedVideo;
                $banner->video_link = $collection['video_link'];
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
                $banner->image_link = $collection['image_link'];
                $banner->video_path="";

            }            
        
            if(isset($data['video']) && $data['video']->isValid()) {
                $file_video = $collection['video'];
                $videoName = time() . "." . $file_video->getClientOriginalExtension();
                $file_video->move("uploads/banner", $videoName);
                $uploadedVideo = $videoName;
                $banner->video_path = 'uploads/banner/' . $uploadedVideo;
                $banner->video_link = $collection['video_link'];
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
    public function StateWiseCityData($data)
    {
        return City::latest()->where('state_id', $data)->get();
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
     //Location
     public function getAllStates()
     {
         return State::orderBy('name')->paginate(20);
     }
     public function getSearchState($keyword)
     {
        $query = State::query();      
        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');       
        });
        return $data = $query->latest('id')->paginate(25);


     }
     public function getAllCitiesByStateId($id)
     {
         return City::where('state_id', $id)->paginate(100);
     }
     public function getSearchCity($keyword, $stateId)
     {
        $query = City::query();      
        $query->when($keyword, function ($query) use ($keyword,$stateId) {
            $query->where('name', 'like', '%' . $keyword . '%')->where('state_id',$stateId);       
        });
        return $data = $query->latest('id')->paginate(25);
     }
     public function getCityById($cityId,$stateId)
     {
         return City::where('state_id',$stateId)->findOrFail($cityId);
     }
     public function CreateLocationCity(array $data)
     {
         try {
             $city = new City();
             $collection = collect($data);
             $city->name = $collection['name'];
             $city->slug = slugGenerateForCity($collection['name'], 'cities');
             $city->state_id = $collection['state_id'];
             $city->save();
             return $city;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function updateCityLocation(array $data)
     {
         try {
             $collection = collect($data);
             $city = City::where('state_id',$collection['state_id'])->findOrFail($collection['id']);
             $city->name = $collection['name'];
             $city->slug = slugGenerateUpdateForCity($collection['name'],'cities',$collection['id']);
             $city->state_id = $collection['state_id'];
             $city->save();
             return $city;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function CreateLocationState(array $data)
     {
         try {
             $state = new State();

             $collection = collect($data);
             $state->name = $collection['name'];
             $state->slug = slugGenerateForState($collection['name'], 'states');
             $state->country_id = 1;
             $state->save();
             return $state;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }
     public function getStateById($stateId,$countryId)
     {
         return State::where('country_id',$countryId)->findOrFail($stateId);
     }
     public function updateStateLocation(array $data)
     {
         try {
             $collection = collect($data);
             $state = State::where('country_id',$collection['country_id'])->findOrFail($collection['id']);
             $state->name = $collection['name'];
             $state->slug = slugGenerateUpdateForState($collection['name'],'states',$collection['id']);
             $state->country_id =$collection['country_id'];
             $state->save();
             return $state;
         } catch (QueryException $exception) {
             throw new InvalidArgumentException($exception->getMessage());
         }
     }

    ///employee section 
    //attandance
    public function getEmployeeAttandanceById($id){
    return  EmployeeAttandance::where('user_id',$id)->paginate(25);
    }
    public function getTodayAttendanceByEmpId($id){
    return EmployeeAttandance::where('user_id', $id)
        ->whereDate('login_time', today())
        ->first();
    }
    public function getTodayLogoutAttendanceByEmpId($id){
    return EmployeeAttandance::where('user_id', $id)
        ->whereDate('logout_time', today())
        ->first();
    }
    public function EmployeeLoggedStatusById($id){
    return  Admin::findOrFail($id);
    }


    //sellers
    public function getAllUsersByEmployeeId($id){
    return  User::where('added_by',$id)->paginate();
    }
    public function GetUserById($id){
    return User::findOrFail($id);
    }
    public function CreateSellers(array $data){

    try {
        $seller = new User();
        $collection = collect($data);
        $seller->name = $collection['fname']." ".$collection['lname'];
        $seller->first_name = $collection['fname'];
        $seller->last_name = $collection['lname'];
        $seller->email = $collection['email'];
        $seller->mobile = $collection['phone'];
        $seller->business_name = $collection['business_name'];
        $seller->slug_business_name =slugGenerateForBusinessName($collection['business_name'],'users');
        $seller->password = Hash::make($collection['pass']);
        $seller->status = 0;
        $seller->added_by = $collection['emp_id'];
        
        

        $seller->save();
        return $seller;
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
    }

    public function UpdateSellers(array $data)
    {

    try {
        $collection = collect($data);
        $seller = User::findOrFail($collection['user_id']);
        $seller->first_name = $collection['fname'];
        $seller->last_name = $collection['lname'];
        $seller->name = $collection['fname']." ".$collection['lname'];
        $seller->email = $collection['email'];
        $seller->mobile = $collection['phone'];
        $seller->business_name = $collection['business_name'];
        // $seller->slug_business_name = slugGenerateUpdateForBusinessName($collection['business_name'],'users',$collection['user_id']);

        if (!empty($collection['pass'])) {
                $seller->password = Hash::make($collection['pass']);
            }
        $seller->save();
        return $seller;
    } catch (QueryException $exception) {
        throw new InvalidArgumentException($exception->getMessage());
    }
    }


    //buyer cancell reason

    public function getAllBuyerReason(){
        return  BuyerCancell::orderBy('title', 'ASC')->paginate(20);;
    }
    public function CreateBuyerCancell(array $data)
    {
        try {
            $buyer_cancell = new BuyerCancell();
            $collection = collect($data);
            $buyer_cancell->title = $collection['name'];
            $buyer_cancell->save();
            return $buyer_cancell;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function GetBuyerCancellById($id)
    {
        return BuyerCancell::findOrFail($id);
    }
    public function updateBuyerCancellReason(array $data)
    {

        try {
            $collection = collect($data);
            $buyer_cancell = BuyerCancell::findOrFail($collection['id']);
            $buyer_cancell->title = $collection['name'];
            $buyer_cancell->save();
            return $buyer_cancell;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteBuyerCancellReason($id)
    {
        $delete = BuyerCancell::findOrFail($id);
        $delete->delete();
        return $delete;
    }



    //Seller cancell reason

    public function getAllSellerReason(){
        return  SellerCancell::orderBy('title', 'ASC')->paginate(20);;
    }
    public function CreateSellerCancell(array $data)
    {
        try {
            $seller_cancell = new SellerCancell();
            $collection = collect($data);
            $seller_cancell->title = $collection['name'];
            $seller_cancell->save();
            return $seller_cancell;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function GetSellerCancellById($id)
    {
        return SellerCancell::findOrFail($id);
    }
    public function updateSellerCancellReason(array $data)
    {

        try {
            $collection = collect($data);
            $seller_cancell = SellerCancell::findOrFail($collection['id']);
            $seller_cancell->title = $collection['name'];
            $seller_cancell->save();
            return $seller_cancell;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function DeleteSellerCancellReason($id)
    {
        $delete = SellerCancell::findOrFail($id);
        $delete->delete();
        return $delete;
    }
    public function getSellerActiveCredit($id){
        // Get the current date and time
        $currentDateTime = Carbon::now();
        // Check if there is an active package for the user
        $hasActivePackage = MySellerPackage::where('expiry_date', '>', $currentDateTime)
            ->where('user_id', $id)
            ->exists();
        // Get the latest wallet entry with current_unit > 0 for the user
        $latestWallet = MySellerWallet::latest()
            ->where('user_id', $id)
            ->where('current_unit', '>', 0)
            ->first();
        // Determine the current unit to return
        if ($hasActivePackage && $latestWallet) {
            $currentUnit = $latestWallet->current_unit;
        } else {
            $currentUnit = 0;
        }
        return $currentUnit;
    }
    public function getBuyerActiveCredit($id){
        // Get the current date and time
        $currentDateTime = Carbon::now();
        // Check if there is an active package for the user
        $hasActivePackage = MyBuyerPackage::where('expiry_date', '>', $currentDateTime)
        ->where('user_id', $id)
        ->exists();
        // Get the latest wallet entry with current_unit > 0 for the user
        $latestWallet = MyBuyerWallet::latest()
        ->where('user_id', $id)
        ->where('current_unit', '>', 0)
        ->first();
        // Determine the current unit to return
        if ($hasActivePackage && $latestWallet) {
            $currentUnit = $latestWallet->current_unit;
            } else {
                $currentUnit = 0;
                }
                return $currentUnit;
    }

    public function AuctionCreateByUserId($id){
        return Inquiry::with('BuyerData')->where('created_by',$id)->whereNotNull('inquiry_id')->latest('id')->paginate(20);
    }
    public function AuctionCreateByUserIdSearch($keyword,$id){

        $query = Inquiry::query();

        $query->when($keyword, function ($query) use ($keyword) {
            $query->where('inquiry_id', 'like', '%' . $keyword . '%')
                ->orWhere('title', 'like', '%' . $keyword . '%')
                ->orWhere('inquiry_amount', 'like', '%' . $keyword . '%')
                ->orWhere('category', 'like', '%' . $keyword . '%')
                ->orWhere('sub_category', 'like', '%' . $keyword . '%');
        });
        return $data = $query->with('BuyerData')->where('created_by',$id)->whereNotNull('inquiry_id')->latest('id')->paginate(20);
    }
    public function AuctionParticipateByUserId($id){
        return InquiryParticipant::with('SellerData')->where('user_id', $id)
        ->whereHas('InquriesData', function($query) {
            $query->whereNotNull('inquiry_id');
        })
        ->latest('id')
        ->paginate(20);
    }
    public function AuctionParticipateByUserIdSearch($keyword,$id){
        dd($id);
        // return InquiryParticipant::with('SellerData')->where('user_id', $id)
        // ->whereHas('InquriesData', function($query) {
        //     $query->whereNotNull('inquiry_id');
        // })
        // ->latest('id')
        // ->paginate(20);
    }
    
    }