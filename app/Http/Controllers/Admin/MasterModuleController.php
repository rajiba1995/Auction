<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Collection;
use App\Models\Inquiry;
use App\Models\City;
use App\Models\Category;
use App\Models\Feeback;
use App\Contracts\MasterContract;
use App\Contracts\AdminInquiryContract;

use Auth;
use Illuminate\Validation\Rule;

class MasterModuleController extends Controller
{
    protected $masterRepository;
    protected $adminInquiryRepository;


    public function __construct(MasterContract $masterRepository,AdminInquiryContract $adminInquiryRepository)
    {
        $this->masterRepository = $masterRepository;
        $this->adminInquiryRepository = $adminInquiryRepository;

    }


    // Banner
    public function BannerIndex()
    {
        $data = $this->masterRepository->getAllBanners();
        return view('admin.banner.index', compact('data'));
    }
    public function BannerCreate()
    {
        return view('admin.banner.create');
    }
    public function BannerStore(Request $request)
    {    
        if ($request->type == 0) {
            $request->validate([
                'image' => 'required|image|dimensions:min_width=1200,min_height=400,max_width=1300,max_height=450',
            ], [
                'image.image' => 'The file must be an image.',
                'image.dimensions' => 'The image must be 1200px width and 400px height.',
            ]);
        } else {
            $request->validate([
                'video' => 'required|file|max:10000|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime', // Max 10 MB
            ], [
                'video.file' => 'The file must be a video.',
                'video.max' => 'The video may not be greater than 10 MB.',
                'video.mimetypes' => 'The file must be a valid video format (MP4, AVI, MPEG, QuickTime).',
            ]);
        }
        
        $params = $request->except('_token');
        $data = $this->masterRepository->CreateBanner($params);
        if ($data) {
            return redirect()->route('admin.banner.index')->with('success', 'Data has been successfully stored!');
        } else {
            return redirect()->route('admin.banner.create')->with('error', 'Something went wrong please try again!');
        }
    }
    public function BannerStatus($id)
    {
        $data = $this->masterRepository->StatusBanner($id);
        return redirect()->back()->with('toast_success', 'Status has been successfully updated.');
    }
    public function BannerEdit($id)
    {
        $data = $this->masterRepository->GetBannerById($id);
        return view('admin.banner.edit', compact('data'));
    }
    public function BannerUpdate(Request $request)
    {
        if ($request->type == 0) {
            $request->validate([
                'image' => 'nullable|image|dimensions:min_width=1200,min_height=400,max_width=1300,max_height=450',
            ], [
                'image.image' => 'The file must be an image.',
                'image.dimensions' => 'The image must be 1200px width and 400px height.',
            ]);
        } else {
            $request->validate([
                'video' => 'nullable|file|max:10000|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime', // Max 10 MB
            ], [
                'video.file' => 'The file must be a video.',
                'video.max' => 'The video may not be greater than 10 MB.',
                'video.mimetypes' => 'The file must be a valid video format (MP4, AVI, MPEG, QuickTime).',
            ]);
        }
        
        $params = $request->except('_token');
        $data = $this->masterRepository->updateBanner($params);
        if ($data) {
            return redirect()->route('admin.banner.index', $request->id)->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.banner.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function BannerDelete($id)
    {
        $data = $this->masterRepository->DeleteBanner($id);
        if ($data) {
            return redirect()->route('admin.banner.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Something went wrong please try again!');
        }
    }



    //Collection
    public function CollectionIndex(Request $request)
    {
        
            if(isset($request->status)){
            $data = $this->masterRepository->getSearchCollectionByStatus($request->status);
            }else{
                // dd($request->status);   

            $data = $this->masterRepository->getAllCollections();
            }
        return view('admin.collection.index', compact('data'));
    }
   
    public function CollectionCreate()
    {
        return view('admin.collection.create');
    }
    public function CollectionStore(Request $request)
    {
        // dd($request->all());    
        $request->validate([
            'title' => 'required|max:255|unique:collections,title',
            'image' => 'mimes:jpeg,jepg,gif,webp,png',
        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->CreateCollection($params);
        if ($data) {
            return redirect()->route('admin.collection.index')->with('success', 'Data has been successfully stored!');
        } else {
            return redirect()->route('admin.collection.create')->with('error', 'Something went wrong please try again!');
        }
    }
    public function CollectionStatus(Request $request)
    {
        $data = $this->masterRepository->StatusCollection($request->id, $request->status);
        return redirect()->back();
    }
    public function CollectionEdit($id)
    {
        $data = $this->masterRepository->GetCollectionById($id);
        return view('admin.collection.edit', compact('data'));
    }
    public function CollectionUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'mimes:jpeg,jepg,gif,webp,png',

        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->updateCollection($params);
        if ($data) {
            return redirect()->route('admin.collection.index', $request->id)->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.collection.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function CollectionDelete($id)
    {
        $data = $this->masterRepository->DeleteCollection($id);
        if ($data) {
            return redirect()->route('admin.collection.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.collection.index')->with('error', 'Something went wrong please try again!');
        }
    }
    public function CollectionToCategory($id)
    {
    //    return $id;
    $data = $this->masterRepository->getSubcategoryByCategoryId($id);
   //  return $data;
     return view('admin.collection.sub-cat-list',compact('data'));
    }



    //category
    public function CategoryIndex()
    {
        $data = $this->masterRepository->getAllCategories();
        return view('admin.category.index', compact('data'));
    }
    public function CategoryCreate()
    {
        $data = $this->masterRepository->getAllCollections();
        // dd($data);
        return view('admin.category.create', compact('data'));
    }
    public function CategoryStore(Request $request)
    {
        // dd($request->all());    
        $request->validate([
            'title' => 'required|max:255|unique:categories,title,NULL,id,collection_id,' . $request->collection,
            'collection' => 'required',
            'image' => 'mimes:jpeg,jepg,gif,webp,png',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'title.unique' => 'The title has already been taken for this Category.',
            'collection.required' => 'The collection field is required.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, gif, webp, png.',
        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->CreateCategory($params);
        if ($data) {
            return redirect()->route('admin.category.index')->with('success', 'Data has been successfully stored!');
        } else {
            return redirect()->route('admin.category.create')->with('error', 'Something went wrong please try again!');
        }
    }
    public function CategoryStatus($id)
    {
        $data = $this->masterRepository->StatusCategory($id);
        return redirect()->back();
    }
    public function CategoryEdit($id)
    {
        $collection_data = $this->masterRepository->getAllCollections();
        $data = $this->masterRepository->GetCategoryById($id);
        return view('admin.category.edit', compact('data', 'collection_data'));
    }
    public function CategoryUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->where(function ($query) use ($request) {
                    return $query->where('collection_id', $request->collection)
                                 ->where('id', '!=', $request->id);
                }),
            ],
            // 'collection' => 'required',
            'image' => 'mimes:jpeg,jepg,gif,webp,png',

        ],[
            'title.unique' => 'The Sub-Category name is already taken for the selected Category.',
        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->updateCategory($params);
        if ($data) {
            return redirect()->route('admin.category.index', $request->id)->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.category.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function CategoryDelete($id)
    {
        $data = $this->masterRepository->DeleteCategory($id);
        if ($data) {
            return redirect()->route('admin.category.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Something went wrong please try again!');
        }
    }



    // Tutorial
    public function TutorialIndex()
    {
        $data = $this->masterRepository->getAllTutorials();
        return view('admin.tutorial.index', compact('data'));
    }
    public function TutorialCreate()
    {
        return view('admin.tutorial.create');
    }
    public function TutorialStore(Request $request)
    {
        //  dd($request->all());    
        $request->validate([
            'video' => 'required|mimes:mp4,mpg,mp4g,video,image/jpeg,image/png,image/gif',
        ]);

        $params = $request->except('_token');
        $data = $this->masterRepository->CreateTutorial($params);
        if ($data) {
            return redirect()->route('admin.tutorial.index')->with('success', 'Data has been successfully stored!');
        } else {
            return redirect()->route('admin.tutorial.create')->with('error', 'Something went wrong please try again!');
        }
    }
    public function TutorialStatus($id)
    {
        $data = $this->masterRepository->StatusTutorial($id);
        return redirect()->back();
    }
    public function TutorialEdit($id)
    {
        $data = $this->masterRepository->GetTutorialById($id);
        return view('admin.tutorial.edit', compact('data'));
    }
    public function TutorialUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'video' => 'mimes:mp4,mpg,mp4g,video',

        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->updateTutorial($params);
        if ($data) {
            return redirect()->route('admin.tutorial.edit', $request->id)->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.tutorial.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function TutorialDelete($id)
    {
        $data = $this->masterRepository->DeleteTutorial($id);
        if ($data) {
            return redirect()->route('admin.tutorial.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.tutorial.index')->with('error', 'Something went wrong please try again!');
        }
    }



    //Client
    public function ClientIndex()
    {
        $data = $this->masterRepository->getAllClients();
        return view('admin.client.index', compact('data'));
    }
    public function ClientCreate()
    {
        return view('admin.client.create');
    }
    public function ClientStore(Request $request)
    {
        // dd($request->all());    
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|mimes:jpeg,jepg,gif,webp,png',
        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->CreateClient($params);
        if ($data) {
            return redirect()->route('admin.client.index')->with('success', 'Data has been successfully stored!');
        } else {
            return redirect()->route('admin.client.create')->with('error', 'Something went wrong please try again!');
        }
    }
    public function ClientStatus($id)
    {
        $data = $this->masterRepository->StatusClient($id);
        return redirect()->back();
    }
    public function ClientEdit($id)
    {
        $data = $this->masterRepository->GetClientById($id);
        return view('admin.client.edit', compact('data'));
    }
    public function ClientUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'mimes:jpeg,jepg,gif,webp,png',

        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->updateClient($params);
        if ($data) {
            return redirect()->route('admin.client.edit', $request->id)->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.client.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function ClientDelete($id)
    {
        $data = $this->masterRepository->DeleteClient($id);
        if ($data) {
            return redirect()->route('admin.client.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.client.index')->with('error', 'Something went wrong please try again!');
        }
    }


    //Feddback
    public function FeedbackIndex()
    {
        $data = $this->masterRepository->getAllFeedbacks();
        return view('admin.feedback.index', compact('data'));
    }
    public function FeedbackCreate()
    {
        return view('admin.feedback.create');
    }
    public function FeedbackStore(Request $request)
    {
        // dd($request->all());    
        $request->validate([
            'logo' => 'required|mimes:jpeg,jepg,gif,webp,png',
            'customer_name' => 'required|max:255',
            'customer_designation' => 'required|max:255',
            'company_name' => 'required|max:255',
            'message' => 'required',
        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->CreateFeedback($params);
        if ($data) {
            return redirect()->route('admin.feedback.index')->with('success', 'Data has been successfully stored!');
        } else {
            return redirect()->route('admin.feedback.create')->with('error', 'Something went wrong please try again!');
        }
    }
    public function FeedbackStatus($id)
    {
        $data = $this->masterRepository->StatusFeedback($id);
        return redirect()->back();
    }
    public function FeedbackEdit($id)
    {
        $data = $this->masterRepository->GetFeedbackById($id);
        return view('admin.feedback.edit', compact('data'));
    }
    public function FeedbackUpdate(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'logo' => 'mimes:jpeg,jepg,gif,webp,png',
            'customer_name' => 'required|max:255',
            'customer_designation' => 'required|max:255',
            'company_name' => 'required|max:255',
            'message' => 'required',

        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->updateFeedback($params);
        if ($data) {
            return redirect()->route('admin.feedback.index', $request->id)->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.feedback.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function FeedbackDelete($id)
    {
        $data = $this->masterRepository->DeleteFeedback($id);
        if ($data) {
            return redirect()->route('admin.feedback.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.feedback.index')->with('error', 'Something went wrong please try again!');
        }
    }


    //social-Media


    public function SocialMediaIndex()
    {
        $data = $this->masterRepository->getAllSocialMedias();
        return view('admin.social_media.index', compact('data'));
    }
    public function SocialMediaCreate()
    {
        return view('admin.social_media.create');
    }
    public function SocialMediaStore(Request $request)
    {
        // dd($request->all());    
        $request->validate([
            'logo' => 'required|mimes:jpeg,jepg,gif,webp,png|max:1000',
            'title' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->CreateSocialMedia($params);
        if ($data) {
            return redirect()->route('admin.social_media.index')->with('success', 'Data has been successfully stored!');
        } else {
            return redirect()->route('admin.social_media.create')->with('error', 'Something went wrong please try again!');
        }
    }
    //  public function SocialMediaStatus($id)
    //  {
    //      $data = $this->masterRepository->StatusFeedback($id);
    //      return redirect()->back();
    //  }
    public function SocialMediaEdit($id)
    {
        $data = $this->masterRepository->GetSocialMediaById($id);
        return view('admin.social_media.edit', compact('data'));
    }
    public function SocialMediaUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'logo' => 'mimes:jpeg,jepg,gif,webp,png|max:1000',
            'title' => 'required|max:255',
            'link' => 'required|max:255',

        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->updateSocialMedia($params);
        if ($data) {
            return redirect()->route('admin.social_media.index', $request->id)->with('success', 'Data has been successfully updated!');
        } else {
            return redirect()->route('admin.social_media.edit', $request->id)->with('error', 'Something went wrong please try again!');
        }
    }
    public function SocialMediaDelete($id)
    {
        $data = $this->masterRepository->DeleteSocialMedia($id);
        if ($data) {
            return redirect()->route('admin.social_media.index')->with('success', 'Deleted Successfully!');
        } else {
            return redirect()->route('admin.social_media.index')->with('error', 'Something went wrong please try again!');
        }
    }

     //business

     public function BusinessIndex()
     {
         $data = $this->masterRepository->getAllBusiness();
         return view('admin.business.index', compact('data'));
     }
     public function BusinessCreate()
     {
         return view('admin.business.create');
     }
     public function BusinessStore(Request $request)
     {
         // dd($request->all());    
         $request->validate([
             'name' => 'required|string|max:255',
         ]);
         $params = $request->except('_token');
         $data = $this->masterRepository->CreateBusiness($params);
         if ($data) {
             return redirect()->route('admin.business.index')->with('success', 'Data has been successfully stored!');
         } else {
             return redirect()->route('admin.business.create')->with('error', 'Something went wrong please try again!');
         }
     }
     public function BusinessStatus($id)
     {
         $data = $this->masterRepository->StatusBusiness($id);
         return redirect()->back();
     }
     public function BusinessEdit($id)
     {
         $data = $this->masterRepository->GetBusinessById($id);
         return view('admin.business.edit', compact('data'));
     }
     public function BusinessUpdate(Request $request)
     {
         // dd($request->all());
         $request->validate([
             'name' => 'required|string|max:255',
 
         ]);
         $params = $request->except('_token');
         $data = $this->masterRepository->updateBusiness($params);
         if ($data) {
             return redirect()->route('admin.business.index', $request->id)->with('success', 'Data has been successfully updated!');
         } else {
             return redirect()->route('admin.business.edit', $request->id)->with('error', 'Something went wrong please try again!');
         }
     }
     public function BusinessDelete($id)
     {
         $data = $this->masterRepository->DeleteBusiness($id);
         if ($data) {
             return redirect()->route('admin.business.index')->with('success', 'Deleted Successfully!');
         } else {
             return redirect()->route('admin.business.index')->with('error', 'Something went wrong please try again!');
         }
     }



     //LegalStatus

     public function LegalStatusIndex()
     {
         $data = $this->masterRepository->getAllLegalstatus();
         return view('admin.legalStatus.index', compact('data'));
     }
     public function LegalStatusCreate()
     {
         return view('admin.legalStatus.create');
     }
     public function LegalStatusStore(Request $request)
     {
        //  dd($request->all());    
         $request->validate([
             'name' => 'required|string|max:255',
         ]);
         $params = $request->except('_token');
         $data = $this->masterRepository->CreateLegalStatus($params);
         if ($data) {
             return redirect()->route('admin.legalstatus.index')->with('success', 'Data has been successfully stored!');
         } else {
             return redirect()->route('admin.legalstatus.create')->with('error', 'Something went wrong please try again!');
         }
     }
     public function LegalStatusStatus($id)
     {
         $data = $this->masterRepository->StatusLegalStatus($id);
         return redirect()->back();
     }
     public function LegalStatusEdit($id)
     {
         $data = $this->masterRepository->GetLegalStatusById($id);
         return view('admin.legalStatus.edit', compact('data'));
     }
     public function LegalStatusUpdate(Request $request)
     {
         // dd($request->all());
         $request->validate([
             'name' => 'required|string|max:255',
 
         ]);
         $params = $request->except('_token');
         $data = $this->masterRepository->updateLegalStatus($params);
         if ($data) {
             return redirect()->route('admin.legalstatus.index', $request->id)->with('success', 'Data has been successfully updated!');
         } else {
             return redirect()->route('admin.legalstatus.edit', $request->id)->with('error', 'Something went wrong please try again!');
         }
     }
     public function LegalStatusDelete($id)
     {
         $data = $this->masterRepository->DeleteLegalStatus($id);
         if ($data) {
             return redirect()->route('admin.legalstatus.index')->with('success', 'Deleted Successfully!');
         } else {
             return redirect()->route('admin.legalstatus.index')->with('error', 'Something went wrong please try again!');
         }
     }

     //Location 
     public function LocationStatesIndex(Request $request)
     {  
        $keyword = $request->keyword ?? '';
        if (!empty($keyword)){
            $data = $this->masterRepository->getSearchState($keyword);
        }else{       
            $data = $this->masterRepository->getAllStates();
        }
         return view('admin.location.states-index', compact('data'));
     }
     public function LocationCitiesIndex(Request $request ,$id)
     {  
         $stateId = $id;
         $keyword = $request->keyword ?? '';
         if (!empty($keyword)){
            $data = $this->masterRepository->getSearchCity($keyword, $stateId);
        }else{  
            $data = $this->masterRepository->getAllCitiesByStateId($stateId);
            }
         return view('admin.location.cities-index', compact('data','stateId'));
     }
     public function LocationCityCreate($id)
     {
         $stateId = $id;
         return view('admin.location.cities-create', compact('stateId'));
     }
     public function LocationCityStore(Request  $request)
     {
    //   dd($request->all());
      $request->validate([
        "name" => "required|unique:cities,name,NULL,id,state_id," . $request->state_id,
        ], [
        "name.required" => "Please enter city name.",
        "name.unique" => "The city name is already taken for the selected state.",
    ]);
    $params = $request->except('_token');
    $data = $this->masterRepository->CreateLocationCity($params);
    if ($data) {
        return redirect()->route('admin.location.cities.index', $request->state_id)->with('success', 'City has been successfully stored under this state!');
    } else {
        return redirect()->route('admin.location.city.create')->with('error', 'Something went wrong please try again!');
    }
     }
     public function LocationCityEdit($cityId,$stateId)
     {
         $data = $this->masterRepository->getCityById($cityId,$stateId);
         return view('admin.location.cities-edit', compact('data','stateId'));
     }
     public function LocationCityUpdate(Request  $request)
     {
        // dd($request->all());
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cities')->where(function ($query) use ($request) {
                    return $query->where('state_id', $request->state_id)
                                 ->where('id', '!=', $request->id);
                }),
            ],
        ], [
            'name.required' => 'Please enter city name.',
            'name.unique' => 'The city name is already taken for the selected state.',
        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->updateCityLocation($params);
        if ($data) {
            return redirect()->route('admin.location.cities.index', $request->state_id)->with('success', 'City has been successfully updated!');
        } else {
            return redirect()->route('admin.location.city.edit', [$request->id,$request->state_id])->with('error', 'Something went wrong please try again!');
        }
     }

     //State
     public function LocationStateCreate()
     {
          //  $countryId = 1;
         return view('admin.location.state-create');
     }

     public function LocationStateStore(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required|unique:states,name',
        ],
            [
        
            "name.required" => "Please enter State name.",
            "name.unique" => "The State name is already taken for the selected Country.",
        ]);

        $params = $request->except('_token');
    $data = $this->masterRepository->CreateLocationState($params);
    if ($data) {
        return redirect()->route('admin.location.states.index')->with('success', 'States has been successfully stored under this Country!');
    } else {
        return redirect()->route('admin.location.state.create')->with('error', 'Something went wrong please try again!');
    }
     }


     public function LocationStateEdit($stateId,$countryId){
        $data = $this->masterRepository->getStateById($stateId,$countryId);
        return view('admin.location.state-edit', compact('data','countryId'));
     }

     public function  LocationStateUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('states')->where(function ($query) use ($request) {
                    return $query->where('country_id', $request->country_id)
                                 ->where('id', '!=', $request->id);
                }),
            ],
        ], [
            'name.required' => 'Please enter state name.',
            'name.unique' => 'The State name is already taken for the selected Country.',
        ]);

        $params = $request->except('_token');
        $data = $this->masterRepository->updateStateLocation($params);
        if ($data) {
            return redirect()->route('admin.location.states.index')->with('success', 'State has been successfully updated!');
        } else {
            return redirect()->route('admin.location.state.edit', [$request->id,$request->country_id])->with('error', 'Something went wrong please try again!');
        }
     }


     
     /// employee section start

     //attandance
     public function AttandanceIndex()
     {   
        $employeeId = Auth::guard('client')->user()->id;
        $data = $this->masterRepository->getEmployeeAttandanceById($employeeId);
        $today_login = $this->masterRepository->getTodayAttendanceByEmpId($employeeId);
        $today_logout = $this->masterRepository->getTodayLogoutAttendanceByEmpId($employeeId);
        $loggedStatus = $this->masterRepository->EmployeeLoggedStatusById($employeeId);

        return view('employee.attandance.index',compact('data','loggedStatus', 'today_login', 'today_logout'));
     }


     //sellers
     public function SellersIndex()
     {
        $employeeId =Auth::guard('client')->user()->id;    

         $data = $this->masterRepository->getAllUsersByEmployeeId($employeeId);
         return view('employee.sellers.index',compact('data'));
     }
     public function SellersCreate()
     {
        $employeeId =Auth::guard('client')->user();    
            // dd($employeeId);
        return view('employee.sellers.create',compact('employeeId'));
     }
     public function SellersStore(Request $request)
     {
        // dd($request->all());
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|digits:10|unique:users,mobile',
            'business_name' => 'required',
            'pass' => 'required|min:6|max:15'
        ],[
           'fname.required'=>"First Name is required",
           'lname.required'=>"Last Name is required",
           'email.required'=>"Email is required",  
           'email.unique'=>"This email has already been taken.",  
           'phone.required'=>"Phone number is required",  
           'phone.digits'=>"Please put 10 digit  phone number.",   
           'phone.unique'=>"This Phone number has already been used.",  
           'business_name.required'=>"Business Name is required",  
           'pass.required'=>"Password field is required",        
           'pass.min'=>"Minimum 6 characters are allowed in password field.",                       
           'pass.max'=>"Maximum 15 characters are allowed in password field.",                       
        ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->CreateSellers($params);
        if ($data) {
            return redirect()->route('employee.sellers.index')->with('success', 'Seller has been successfully Added!');
        } else {
            return redirect()->route('employee.sellers.create')->with('error', 'Something went wrong please try again!');
        }  
     }
     public function SellersEdit($id){
        $data = $this->masterRepository->GetUserById($id);
        return view('employee.sellers.edit', compact('data'));
     }
     public function SellersUpdate(Request $request){
         // dd($request->all());
         $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users,email,' . $request->user_id,
            'phone' => 'required|min:10|unique:users,mobile,' . $request->user_id,
            'business_name' => 'required',
            'pass' => 'nullable|min:6|max:15'
            ],[
                'fname.required'=>"First name is required",
                'lname.required'=>"Last name is required",
                'email.required'=>"Email is required",  
           'email.unique'=>"This email has already been taken.",  
           'phone.required'=>"Phone number is required",  
           'phone.unique'=>"This Phone number has already been used.",          
           'business_name.required'=>"Business Name is required",  
           'pass.min'=>"Minimum 6 characters are allowed in password field.",                       
           'pass.max'=>"Maximum 15 characters are allowed in password field.",                       
           ]);
        $params = $request->except('_token');
        $data = $this->masterRepository->UpdateSellers($params);
        if ($data) {
            return redirect()->route('employee.sellers.index', $request->id)->with('success', 'Sellers data has been successfully updated!');
            } else {
                return redirect()->route('employee.sellers.edit', $request->id)->with('error', 'Something went wrong please try again!');
                }
    }
                
                
    public function EmployeeShowBuyerActivity(int $id){
      $data =$this->masterRepository->AuctionCreateByUserId($id);
      return view('employee.sellers.activity_as_buyer',compact('data'));
    }
    public function EmployeeShowSellerActivity(int $id){
      $data =$this->masterRepository->AuctionParticipateByUserId($id);
    //   dd($data);
      return view('employee.sellers.activity_as_seller',compact('data'));
    }
    public function EmployeeViewBuyerInquiry(int $id){
        
        $data= $this->adminInquiryRepository->getInquiryDetailsById($id);
        $userId =$data->created_by;
      return view('employee.sellers.buyer_inquiry_details',compact('data','userId'));
    }
    public function EmployeeBuyerInquiryParticipantsView(int $id){
      $data=$this->adminInquiryRepository->getAllParticipantsByInquiryId($id);
      $userId = Inquiry::where('id', $id)->pluck('created_by')->first();
    //   dd($userId);
        return view('employee.sellers.buyer_inquiry_participants_view',compact('data','userId'));;
    }

     //Buyer cancell reason
     public function BuyerCancellReasonIndex()
     {
        $data = $this->masterRepository->getAllBuyerReason();
        return view('admin.buyer_cancell.index',compact('data'));
     }
     public function BuyerCancellReasonCreate()
     {
         return view('admin.buyer_cancell.create');
     }
     public function BuyerCancellReasonStore(Request $request)
     {   
        $request->validate([
            'name' => 'required|string|max:255|unique:buyer_cancell,title',
        ],[
            'name.required'=>'Name is required.',
            'name.unique'=>'The Reason is already taken.'
      
        ]);
        
         $params = $request->except('_token');
         $data = $this->masterRepository->CreateBuyerCancell($params);
         if ($data) {
             return redirect()->route('admin.buyer_cancell_reason.index')->with('success', 'Data has been successfully stored!');
         } else {
             return redirect()->route('admin.buyer_cancell_reason.create')->with('error', 'Something went wrong please try again!');
         }
     }
     public function BuyerCancellReasonEdit($id)
     {
         $data = $this->masterRepository->GetBuyerCancellById($id);
         return view('admin.buyer_cancell.edit', compact('data'));
     }
     public function BuyerCancellReasonUpdate(Request $request)
     {
         // dd($request->all());
         $request->validate([
            'name' => 'required|string|max:255|unique:buyer_cancell,title,' . $request->id,
        ]);
        
         $params = $request->except('_token');
         $data = $this->masterRepository->updateBuyerCancellReason($params);
         if ($data) {
             return redirect()->route('admin.buyer_cancell_reason.index', $request->id)->with('success', 'Data has been successfully updated!');
         } else {
             return redirect()->route('admin.buyer_cancell_reason.edit', $request->id)->with('error', 'Something went wrong please try again!');
         }
     }
     public function BuyerCancellReasonDelete($id)
     {
         $data = $this->masterRepository->DeleteBuyerCancellReason($id);
         if ($data) {
             return redirect()->route('admin.buyer_cancell_reason.index')->with('success', 'Deleted Successfully!');
         } else {
             return redirect()->route('admin.buyer_cancell_reason.index')->with('error', 'Something went wrong please try again!');
         }
     }


     //Seller cancell reason
     public function SellerCancellReasonIndex()
     {
        $data = $this->masterRepository->getAllSellerReason();
        return view('admin.seller_cancell.index',compact('data'));

     }
     public function SellerCancellReasonCreate()
     {
         return view('admin.seller_cancell.create');
     }
     public function SellerCancellReasonStore(Request $request)
     {   
        $request->validate([
            'name' => 'required|string|max:255|unique:seller_cancell,title',
        ],[
            'name.required'=>'Name is required.',
            'name.unique'=>'The Reason is already taken.'
      
        ]);
        
         $params = $request->except('_token');
         $data = $this->masterRepository->CreateSellerCancell($params);
         if ($data) {
             return redirect()->route('admin.seller_cancell_reason.index')->with('success', 'Data has been successfully stored!');
         } else {
             return redirect()->route('admin.seller_cancell_reason.create')->with('error', 'Something went wrong please try again!');
         }
     }
     public function SellerCancellReasonEdit($id)
     {
         $data = $this->masterRepository->GetSellerCancellById($id);
         return view('admin.seller_cancell.edit', compact('data'));
     }
     public function SellerCancellReasonUpdate(Request $request)
     {
         // dd($request->all());
         $request->validate([
            'name' => 'required|string|max:255|unique:seller_cancell,title,' . $request->id,
        ]);
        
         $params = $request->except('_token');
         $data = $this->masterRepository->updateSellerCancellReason($params);
         if ($data) {
             return redirect()->route('admin.seller_cancell_reason.index', $request->id)->with('success', 'Data has been successfully updated!');
         } else {
             return redirect()->route('admin.seller_cancell_reason.edit', $request->id)->with('error', 'Something went wrong please try again!');
         }
     }
     public function SellerCancellReasonDelete($id)
     {
         $data = $this->masterRepository->DeleteSellerCancellReason($id);
         if ($data) {
             return redirect()->route('admin.seller_cancell_reason.index')->with('success', 'Deleted Successfully!');
         } else {
             return redirect()->route('admin.seller_cancell_reason.index')->with('error', 'Something went wrong please try again!');
         }
     }


}