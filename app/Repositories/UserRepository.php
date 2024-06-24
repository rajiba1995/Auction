<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Notification;
use App\Models\Business;
use App\Models\LegalStatus;
use App\Models\UserImage;
use App\Models\ReviewRating;
use App\Models\Package;
use App\Models\SellerPackage;
use App\Models\MyBadge;
use App\Models\MySellerWallet;
use App\Models\Transaction;
use App\Models\State;
use App\Models\City;
use App\Models\Badge;
use App\Models\MyBuyerPackage;
use App\Models\MyBuyerWallet;
use App\Models\MySellerPackage;
use App\Models\UserDocument;
use Illuminate\Http\UploadedFile;
use App\Contracts\UserContract;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 *
 * @package \App\Repositories
 */
class UserRepository implements UserContract
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        // parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

     /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findUserById(int $id)
    {
        try {
            return User::findOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return User|mixed
     */
    public function createUser(array $params)
    {
        try {

            $collection = collect($params);

            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password =  bcrypt('user@123');
            $user->mobile = '+91'. $collection['mobile'];
            $user->otp = 1234;
            $user->gender = $collection['gender'];
            $user->date_of_birth = $collection['date_of_birth'];
            $user->device_id = '';
            $user->device_token = '';
            $user->is_verified = 1;
            $user->status = 1;
            $user->is_deleted = 0;

            $length = 6;
            $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
              
            $user->referal_code = substr(str_shuffle($str), 0, $length);
            
            $user->save();

            return $user;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return User|mixed
     */
    public function updateUser(Request $request, array $params){
        $user = User::findOrFail($params['id']); 
        $collection = collect($params)->except('_token');
        $user->first_name = $collection['first_name'];
        $user->last_name = $collection['last_name'];
        $user->name =$collection['first_name'].' '.$collection['last_name'];
        $user->short_bio = $collection['short_bio'];
        $user->email = $collection['email'];
        $user->business_name = $collection['business_name'];
        $user->slug_business_name = slugGenerateUpdateForBusinessName( $collection['business_name'],'users',$collection['id']);
        $user->business_type = $collection['business_type'];
        $user->address = $collection['address'];
        $user->city = $collection['city'];
        $user->state = $collection['state'];
        $user->pincode = $collection['pincode'];
        $user->mobile = $collection['phone_number'];
        $user->employee = $collection['employee'];
        $user->Establishment_year = $collection['Establishment_year'];
        $user->legal_status = $collection['legal_status'];
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
            $filePath = 'uploads/user/' . $fileName; // Construct full path
            $file->move(public_path('uploads/user'), $fileName);
            $user->image = $filePath;
        }
        $user->save();

        return $user;
    }

    /**
     * @param array $params
     * @return User|mixed
     */
    public function updateDeviceDetails(array $params){
        $user = $this->findOneOrFail($params['id']); 
        $collection = collect($params)->except('_token'); 

        $user->device_id = $collection['device_id'];
        $user->device_token = $collection['device_token'];

        $user->save();

        return $user;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function getUserDetails(int $id)
    {
        try {
            $user =  User::where('id',$id)->get();
            //return $this->findOneOrFail($id);

            return $user;

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

       /**
     * @method getUserDetailsMobile
     * @param mobile
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function getUserDetailsMobile( $mobile)
    {
        try {
            $user =  User::where('mobile','like','%'.$mobile.'%')  
            ->get(); 
            return $user; 
        } catch (ModelNotFoundException $e) { 
            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function blockUser($id,$is_block){
        $user = $this->findUserById($id);
        $user->is_block = $is_block;
        $user->save();

        return $user;
    }
    /**
     * @param array $params
     * @return mixed
     */
    public function verify($id,$is_verified){
        $user = $this->findUserById($id);
        $user->is_verified = $is_verified;
        $user->save();

        return $user;
    }

     /**
     * @param array $params
     * @return mixed
     */
    public function updateUserStatus($id){
        $user = User::findOrFail($id);
        $status = $user->status ==1?0:1;
        $user->status = $status;
        $user->save();
        return $user;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }

   
    /**
     * @param array $params
     * @return User|mixed
     */
    public function userRegistration(array $params)
    {
        try {
            $collection = collect($params);
            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = \Hash::make($collection['password']);
            $user->mobile = $collection['mobile_number'];
            $user->stencil_number = $collection['stencil_number'];
            $user->address = $collection['address'];
            $user->city = $collection['city'];
            $user->state = $collection['state'];
            $user->pin = $collection['pin_code'];
            $user->status = 1;
            $user->save();
            return $user;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }


      /**
     * Check User Exists
     */
    public function checkUserExists($email, $postMobile){ 
        $userEmailExist = User::where('email', '=', $email)->first();   //Email Checking
        $userMobileExist = User::where('mobile', '=', $postMobile)->first(); // User mobile checking
       
        if( !empty($userEmailExist) ) { 
            return 'email_exists';
        }
        elseif(!empty($userMobileExist)){
            return 'mobile_exists';
        }
        else{
            return 0;
        } 
    }

    public function getAllInspector(){
        return User::orderBy('name', 'ASC')->paginate(20);
    }
    public function getOnlyInspectorList(){
        return User::orderBy('name', 'ASC')->where('status', 1)->get();
    }

    public function ClientNotificationData(){
        if(Auth::guard('client')->check()){
            $user_id= Auth::guard('client')->user()->id;
            return Notification::orderBy('id', 'DESC')->where('client_id', $user_id)->paginate(20);
        }
    }
    public function getUserAllImages($userId){
        return UserImage::where('user_id',$userId)->get();
       }
    public function getUserAllData($userId){
        return UserDocument::where('user_id',$userId)->first();
       }
    //business
    public function getAllBusiness(){
        return Business::where('status',1)->where('deleted_at',1)->get();

    }
    //legal status
    public function getAllLegalStatus(){
        return LegalStatus::where('status',1)->where('deleted_at',1)->get();

    }
    public function getUserAllPackages(){
        return Package::where('status',1)->where('deleted_at',1)->orderBy('position', 'ASC')->get();
     }
    public function getSellerAllPackages(){
        return SellerPackage::where('status',1)->where('deleted_at',1)->orderBy('position', 'ASC')->get();
     }
    public function getAllBadgesById($id){
        return MyBadge::where('user_id',$id)->get('badge_id');
     }
    public function myBadgesFullDetails($id){
        return MyBadge::where('user_id',$id)->get();
     }
    public function getAllBadges($myBadges){
        if(isset($myBadges)){
            return Badge::whereNotIn('id',$myBadges)->where('type', '!=', 0)->get();
        }else{
            return Badge::where('type', '!=', 0)->get();
        }
       
    }
    public function getAllStates(){
       return State::all();
       
    }
    public function getAllCities(){
       return City::all();
       
    }
    
    //transaction
    
    public function getAllTransactionByUserId($id){
       return Transaction::where('user_id',$id)->paginate(20);
       
    }
    public function getSearchTransactionByUserId($id,$purpose,$mode,$startDate,$endDate){
        // dd($id,$purpose,$mode,$startDate,$endDate);
        // $query = Transaction::query();
        $query = Transaction::query()->where('user_id', $id);
        
        $query->when($mode || $purpose, function ($query) use ($mode, $purpose) {
            $query->where('transaction_type', 'like', '%' . $mode . '%')
                ->orWhere('purpose', 'like', '%' . $purpose . '%');
        });


        if (!is_null($startDate) && !is_null($endDate)) {
      
            $query->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                $query->where('created_at', '>=', $startDate." 00:00:00")
                      ->where('created_at', '<=', date("Y-m-d 23:59:59",strtotime($endDate)));
            });
        }
    return $query->paginate(25);
       
    }
    public function getSellerAllWalletTransactionByUserId($id){
       return MySellerWallet::where('user_id',$id)->latest('id')->paginate(20);
       
    }
    public function getSellerCurrentCreditByUserId($id){
       return MySellerWallet::where('user_id',$id)->latest('id')->first();
       
    }
    public function getBuyerAllWalletTransactionByUserId($id){
       return MyBuyerWallet::where('user_id',$id)->latest('id')->paginate(20);
       
    }
    public function getBuyerCurrentCreditByUserId($id){
       return MyBuyerWallet::where('user_id',$id)->latest('id')->first();
       
    }
    public function getSellerPackagehistory($id){
       $data = DB::table('old_seller_packages')->where('user_id',$id)->latest('id')->paginate(20);
       return $data;
       
    }
    public function getBuyerPackagehistory($id){
       $data = DB::table('old_buyer_packages')->where('user_id',$id)->latest('id')->paginate(20);
       return $data;
    }
    public function getUserAllReviewRating($id){
       return ReviewRating::where('rated_on',$id)->latest('id')->limit(10)->get();  
    }
    public function asBuyer($id){
       return ReviewRating::where('rated_on',$id)->where('type',1)->count();
    }
    public function on_time_payment_rating($id){
        return ReviewRating::where('rated_on',$id)->where('type',1)->sum('on_time_payment_rating');
    }
    public function delivery_cooperation_rating($id){
        return ReviewRating::where('rated_on',$id)->where('type',1)->sum('delivery_cooperation_rating');
    }
    public function genuiness_rating($id){
        return ReviewRating::where('rated_on',$id)->where('type',1)->sum('genuiness_rating');
    }
    public function asBuyerOverallRatingPoint($id){
        return ReviewRating::where('rated_on',$id)->where('type',1)->sum('overall_rating');
        // dd($data);
       
    }
    public function asSeller($id){
       return ReviewRating::where('rated_on',$id)->where('type',2)->count();  
    }
    public function on_time_delivery_rating($id){
       return ReviewRating::where('rated_on',$id)->where('type',2)->sum('on_time_delivery_rating');   
    }
    public function right_product_rating($id){
       return ReviewRating::where('rated_on',$id)->where('type',2)->sum('right_product_rating');   
    }
    public function post_delivery_service_rating($id){
       return ReviewRating::where('rated_on',$id)->where('type',2)->sum('post_delivery_service_rating');   
    }
    public function asSellerOverallRatingPoint($id){
       return ReviewRating::where('rated_on',$id)->where('type',2)->sum('overall_rating');
    }
    public function getCurrentSellerPackage($user_id){
        return MySellerPackage::with('getPackageDetails')->where('user_id', $user_id)->first();
    }
    public function getCurrentBuyerPackage($user_id){
        return MyBuyerPackage::with('package_data')->where('user_id', $user_id)->first();
    }
}