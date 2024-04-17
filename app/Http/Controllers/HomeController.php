<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Collection;
use App\Models\Product;
use App\Models\GroupWatchList;
use App\Models\Category;
use App\Models\Tutorial;
use App\Models\Client;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Models\SocialMedia;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Contracts\UserContract;
use Illuminate\Support\Facades\Redirect;



class HomeController extends Controller
{
    protected $userRepository;

    public function __construct(UserContract $userRepository) {
        $this->userRepository = $userRepository;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {       
        $data = (object)[];
        $data->banners = Banner::orderBy('file_path', 'ASC')->paginate(20);
        // dd($data->banners);  

        $data->collections = Collection::with('categoryDetails')->latest()->where('status', 1)->where('deleted_at', 1)->where('created_by', 1)->limit(2)->get();
        $data->categories = Category::latest()->where('deleted_at', 1)->where('status', 1)->where('created_by', 1)->paginate(20);
        $data->tutorials = Tutorial::latest()->where('deleted_at', 1)->paginate(20);
        $data->clients = Client::latest()->where('deleted_at', 1)->paginate(20);
        $data->feedbacks = Feedback::latest()->where('deleted_at', 1)->paginate(20);
        $data->socialmedias =  SocialMedia::orderBy('title', 'ASC')->paginate(20);
        $data->blogs =  Blog::where('deleted_at', 1)->orderBy('title','ASC')->paginate(20);
        // dd($data->collections);  
        return view('front.index',compact('data'));
    }

    public function UserGlobalMakeSlug(Request $request){
        $location = Str::slug($request->location, '-');
        $keyword = Str::slug($request->keyword, '-');
        $route = route('user.global.filter', [$location,$keyword]);
        return response()->json(['status'=>200, 'route'=>$route]);
    }
    public function UserGlobalFilter($old_location, $old_keyword){
        $location = str_replace('-', ' ', $old_location);
        $keyword = str_replace('-', ' ', $old_keyword);
        $userIds = User::where('state', $location)
            ->orWhere('city', $location)
            ->pluck('id')
            ->toArray();

        $category = Collection::where('title', $keyword)
            ->pluck('id')
            ->toArray();

        $User_products = Product::whereIn('user_id', $userIds)
            ->where('title', 'like', '%' . $keyword . '%')
            ->pluck('user_id')
            ->toArray();
        $User_products = array_merge($User_products, Product::whereIn('user_id', $userIds)
            ->whereIn('category_id', $category)
            ->pluck('user_id')
            ->toArray());
            $authUserId = Auth::guard('web')->check() ? Auth::guard('web')->user()->id : null;
            $data = User::with('MyBadgeData')->whereIn('id', $User_products)
            ->where('id', '!=', $authUserId)
            ->get();
            $groupWatchList = GroupWatchList::where('created_by',$authUserId)->get();
            $product_categories = [];
            if(count($data)>0){
                foreach($data as $item){
                    if($item->UserProductData){
                        foreach($item->UserProductData as $Ditem){
                            $product_categories[] = $Ditem->category_id;
                        }
                      
                    }
                }
            }
            $categories = [];
            if(count($product_categories)>0){
                $categories = Collection::whereIn('id', $product_categories)->pluck('title')
                ->toArray();
            }
            return view('front.filter', compact('data', 'location', 'keyword', 'old_location', 'old_keyword', 'categories','groupWatchList'));
    }

    public function UserProfileFetch($location, $keyword){
        $location = str_replace('-', ' ', $location);
        $keyword = str_replace('-', ' ', $keyword);
        $data = User::where(function($query) use ($location) {
            $query->where('state', $location)
                  ->orWhere('city', $location);
        })
        ->where('business_name', $keyword)
        ->first();

        if($data){
            return view('front.user.profile', compact('data', 'location', 'keyword'));
        }else{
            return redirect()->back();
        }
    }   
    public function UserPhotoAndDocument($location, $keyword){
        $location = str_replace('-', ' ', $location);
        $keyword = str_replace('-', ' ', $keyword);
        $data = User::where(function($query) use ($location) {
            $query->where('state', $location)
                  ->orWhere('city', $location);
        })
        ->where('business_name', $keyword)
        ->first();

        if($data){
            $AllImages = $this->userRepository->getUserAllImages($data->id);
            $user_document = $this->userRepository->getUserAllData($data->id);
            return view('front.user.photos_and_documents', compact('data', 'AllImages', 'user_document'));
        }else{
            return redirect()->back();
        }
    }   
    public function UserProductService($location, $keyword){
        $location = str_replace('-', ' ', $location);
        $keyword = str_replace('-', ' ', $keyword);
        $data = User::where(function($query) use ($location) {
            $query->where('state', $location)
                  ->orWhere('city', $location);
        })
        ->where('business_name', $keyword)
        ->first();
        if($data){
            $Product = Product::where('user_id', $data->id)->get();
            return view('front.user.product_and_service', compact('Product', 'data'));
        }else{
            return redirect()->back();
        }
    }   
}