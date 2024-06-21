<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Contracts\UserContract;
use Illuminate\Validation\Rule;

use DB;

class AuthController extends Controller{

    /**
     * @var UserContract
     */
    protected $userRepository;

    /**
     * PageController constructor.
     * @param UserContract $userRepository
     */
    public function __construct(UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * This method is for user authentication check
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request){
        $credentials = $request->only('mobile', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                $error = true;
                $message = "You have entered an invalid mobile no or password. Please try with the correct one!";
                return response()->json(compact('error','message'));
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('mobile', $credentials['mobile'])->first();
        
        if($user->status !== 1) {
            $error = true;
            $message = "Your account has been blocked. Please connect with customer support to resolve this.";
            return response()->json(compact('error','message'));
        }
        if($user){
            $error = false;
            $message = "Success";
            return response()->json(compact('error','message','token', 'user'));
        }
    }

    public function LogInWithOTP(Request $request){
        $validator = Validator::make($request->all(), [
            'otp' => ['required']
        ]);
        if ($validator->fails()) {
            $errors = $validator->messages();
            foreach ($errors->getMessages() as $key=>$value){
                $err[]=$value[0];
            }
            $response=array("code"=>403,"success"=>false,'message'=>$err, "data" => [] );
            return response()->json($response);
        }else{
            $user = User::where('mobile', $request->mobile)->where('otp', $request->otp)->first();
            if($user){
                if($user->otp !== $request->otp) {
                    $response=array("code"=>403,"success"=>false,'message'=>"OTP doesn't match.", "data" => [] );
                    return response()->json($response);
                }
                if($user->status !== 1) {
                    $response=array("code"=>403,"success"=>false,'message'=>"Your account has been blocked. Please connect with customer support to resolve this.", "data" => [] );
                    return response()->json($response);
                }
                if($user){
                    $response=array("code"=>200,"success"=>true, "message"=>"You are successfully logged in", "data" => [$user]);
                    return response()->json($response);
                }
            }else{
                $response=array("code"=>403,"success"=>false,'message'=>"OTP doesn't match", "data" => [] );
                return response()->json($response);
            }
            
        }
    }
    public function ValidUserMobile(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => ['required', 'digits:10']
        ]);
        if ($validator->fails()) {
            $errors = $validator->messages();
            foreach ($errors->getMessages() as $key=>$value){
                $err[]=$value[0];
            }
            $response=array("code"=>403,"success"=>false,'message'=>$err, "data" => [] );
            return response()->json($response);
        }else{
            $User = User::where('mobile', $request->mobile)->first();
            if($User){
                $User->otp = rand(1111, 9999);
                $User->save();
                $data = [
                    'name' =>$User->name,
                    'mobile' =>$User->mobile,
                    'otp' =>$User->otp,
                ];
                $response=array("code"=>200,"success"=>true, "message"=>"OTP has been sent to your mobile", "data" => [$data]);
                return response()->json($response);
            }else{
                $response=array("code"=>403,"success"=>false,'message'=>"this number does not exist", "data" => []);
                return response()->json($response);
            }
        }
    }

    public function getProfile(){
    }
    /**
     * This method is for user registration
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }
        $params = $request->except('_token');
        
        $name = $params['name'];
        $email = $params['email'];
        $mobile = $params['mobile'];
        $password = $params['password'];
        $referrer_code = (isset($params['referrer_code']) && $params['referrer_code']!='')?$params['referrer_code']:'';

        if($name==''){
            $error = true;
            $message = "Name is required";
            return response()->json(compact('error','message'));
        }else if($mobile==''){
            $error = true;
            $message = "Mobile no is required";
            return response()->json(compact('error','message'));
        }else if($password==''){
            $error = true;
            $message = "Email id is required";
            return response()->json(compact('error','message'));
        }else{
            $thisMobile = $mobile;
            $uniqueMobileResult = User::where('mobile',$thisMobile)->get();
            
            //echo "<pre>";
            //print_r($uniqueMobileResult);
            
            //echo "count>>".count($uniqueMobileResult);

            if(count($uniqueMobileResult)>0){
                
                $error = true;
                $message = "An user already exists with same mobile no. Please try with a different one!";
                return response()->json(compact('error','message'));
            }else{
                $thisEmail = $email;
                $uniqueEmailResult = User::where('email',$thisEmail)->get();

                if(count($uniqueEmailResult)>0){
                    $error = true;
                    $message = "An user already exists with same email id. Please try with a different one!";
                    return response()->json(compact('error','message'));
                }else{
                    $error = false;
                    $message = "Success";
                    return response()->json(compact('error','message','user'),201);
                }
            }   
        }
        
    }

    /**
     * This method is for getting authenticated user data
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthenticatedUser(){
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }

    /**
     * This method is for user profile update
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $params = $request->except('_token');
        $user = $this->userRepository->updateUser($params);

        $error = false;
        $message = "Success";
        return response()->json(compact('error','message','user'));
    }

    /**
     * This method is for updating user device details
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDeviceDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'id'     =>  'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $params = $request->except('_token');

        $user = $this->userRepository->updateDeviceDetails($params);

        if (!$user) {
            $error = true;
            $message = 'Some error occurred. Please try again';

            return response()->json(compact('error','message'));
        }else{
            $error = false;
            $message = 'Success';

            return response()->json(compact('error','message','user'));
        }
    }
}
