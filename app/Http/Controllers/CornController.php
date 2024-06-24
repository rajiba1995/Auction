<?php

namespace App\Http\Controllers;

use App\Models\MyBuyerPackage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MySellerPackage;
use App\Models\MySellerWallet;
use App\Models\MyBuyerWallet;
use App\Models\WebsiteLogs;
use App\Models\MyBadge;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException; // Import Exception class


class CornController extends Controller
{
    public function SellerMothlyPackageCheckCron(){
        $today = Carbon::today()->toDateString(); 
        // $today = '2024-07-19';
         // Get today's date in 'Y-m-d' format
        $data = MySellerPackage::where('package_duration','!=','usage_months')->whereDate('next_credit_date',$today)->whereDate('expiry_date','>=',$today)->latest()->get()->toArray();
        // dd($data);
        try{
            DB::beginTransaction();

            if (!empty($data)) { // Check if the collection is not empty
            foreach($data as $item){
                $wallet = MySellerWallet::where('user_id',$item['user_id'])->latest('id')->first();
                    if($wallet){
                        if($wallet->current_unit>0){
                            //debit the current_unit>0 of MysellerWallet 
                            $mySellerWalletDebit = new MySellerWallet();
                            $mySellerWalletDebit->inquiry_id = NULL;
                            $mySellerWalletDebit->purpose = "Monthly Credit Units Expired";
                            $mySellerWalletDebit->user_id = $wallet->user_id;
                            $mySellerWalletDebit->type = 0;//debit
                            $mySellerWalletDebit->credit_unit = 0;
                            $mySellerWalletDebit->debit_unit = $wallet->current_unit;
                            $mySellerWalletDebit->current_unit = 0;
                            $mySellerWalletDebit->save();
                            // Credit the new monthly units
                            $mySellerWalletCredit = new MySellerWallet();
                            $mySellerWalletCredit->inquiry_id = NULL;
                            $mySellerWalletCredit->purpose = "Monthly Credit Units Credited";
                            $mySellerWalletCredit->user_id = $wallet->user_id;
                            $mySellerWalletCredit->type = 1;//credit
                            $mySellerWalletCredit->credit_unit = $item['monthly_credit'];
                            $mySellerWalletCredit->debit_unit = 0;
                            $mySellerWalletCredit->current_unit = $item['monthly_credit'];
                            $mySellerWalletCredit->save();
                        
                        }else{
                            // if current_unit == 0 then no debit only monthly credit
                            $mySellerWalletCredit = new MySellerWallet();
                            $mySellerWalletCredit->inquiry_id = NULL;
                            $mySellerWalletCredit->purpose = "Monthly Credit Units Credited";
                            $mySellerWalletCredit->user_id = $wallet->user_id;
                            $mySellerWalletCredit->type = 1;
                            $mySellerWalletCredit->credit_unit = $item['monthly_credit'];
                            $mySellerWalletCredit->debit_unit = 0;
                            $mySellerWalletCredit->current_unit = $item['monthly_credit'];
                            $mySellerWalletCredit->save();
                        }

                        $mySellerPackageUpdate = MySellerPackage::findOrFail($item['id']);
                        $mySellerPackageUpdate->next_credit_date = Carbon::now()->addDays(30)->toDateString();
                        // dd($mySellerPackageUpdate->next_credit_date);
                        $mySellerPackageUpdate->usage_months = $item['usage_months']+1;
                        // dd($mySellerPackageUpdate->usage_months);
                        $mySellerPackageUpdate->save();
                    }   
                }
            } else {
                return false;
            }   
            DB::commit();

            // Log the operation  
        
            if (!empty($data)){
            $websiteLog =new WebsiteLogs();
            $websiteLog->emp_id = NULL;
            $websiteLog->logs_type ="Seller package mothly debit & credit";
            $websiteLog->table_name ="my_seller_package && my_seller_wallet";
            $websiteLog->response =json_encode($data);
            // dd('json');
            $websiteLog->save();
            }
        }
            catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
                // $websiteLog =new WebsiteLogs();
                // $websiteLog->emp_id = NULL;
                // $websiteLog->logs_type ="Seller package mothly debit & credit";
                // $websiteLog->table_name ="mysellerpackage && mysellerwallet";
                // $websiteLog->response =json_encode($exception->getMessage());
                // $websiteLog->save();
        }

    }


    public function SellerExpiryPackageCheckCron()
    {
        // Get the current datetime in 'Y-m-d H:i:00' format (excluding seconds)
        $currentDateTime = Carbon::now()->format('Y-m-d H:i:00');
        
        // Calculate the range for 1 minute before and 1 minute after the current datetime
        $oneMinuteBefore = Carbon::parse($currentDateTime)->subMinute()->format('Y-m-d H:i:00');
        $oneMinuteAfter = Carbon::parse($currentDateTime)->addMinute()->format('Y-m-d H:i:00');
        
        // Query MySellerPackage where expiry_date is within the 1-minute range
        $data = MySellerPackage::whereBetween('expiry_date', [$oneMinuteBefore, $oneMinuteAfter])->get()->toArray();
        // dd($data);
        $myBadge = MyBadge::whereBetween('expiry_date', [$oneMinuteBefore, $oneMinuteAfter])->get()->toArray();
        // dd($myBadge);

        try{
            DB::beginTransaction();

                if (!empty($data)) { // Check if the collection is not empty
                    foreach($data as $item){
                    $purchaseDate = Carbon::parse($item['created_at'])->format('Y-m-d H:i:s');
                // Insert into my_old_seller_package
                DB::table('old_seller_packages')->insert([
                    'package_id' => $item['package_id'],
                    'user_id' => $item['user_id'],
                    'package_duration' => $item['package_duration'],
                    'monthly_package_price' => $item['monthly_package_price'],
                    'monthly_credit' => $item['monthly_credit'],
                    'purchase_amount' => $item['purchase_amount'],
                    'next_credit_date' => $item['next_credit_date'],
                    'usage_months' => $item['usage_months'],
                    'purchase_date' => $purchaseDate,
                    'expiry_date' => $item['expiry_date'],

                    ]);

                // Delete from MySellerPackage
                MySellerPackage::where('id', $item['id'])->delete();
                    }
                }

                DB::commit();

                // Log the operation  
            
                if (!empty($data)){
                $websiteLog =new WebsiteLogs();
                $websiteLog->emp_id = NULL;
                $websiteLog->logs_type ="Seller package expiry";
                $websiteLog->table_name ="my_seller_package && old_seller_package";
                $websiteLog->response =json_encode($data);
                // dd('json');
                $websiteLog->save();
                }
            }
            catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
                // $websiteLog =new WebsiteLogs();
                // $websiteLog->emp_id = NULL;
                // $websiteLog->logs_type ="Seller package mothly debit & credit";
                // $websiteLog->table_name ="mysellerpackage && mysellerwallet";
                // $websiteLog->response =json_encode($exception->getMessage());
                // $websiteLog->save();
        }


        try{
            DB::beginTransaction();

                if (!empty($myBadge)) { // Check if the collection is not empty
                    foreach($myBadge as $item){
                    $purchaseDate = Carbon::parse($item['created_at'])->format('Y-m-d H:i:s');
                // Insert into my_old_seller_package
                DB::table('my_old_badges')->insert([
                    'user_id' => $item['user_id'],
                    'badge_id' => $item['badge_id'],
                    'duration' => $item['duration'],
                    'expiry_date' => $item['expiry_date'],
                    'purchase_date' => $purchaseDate,
                    ]);

                // Delete from MyBadge
                MyBadge::where('id', $item['id'])->delete();
                    }
                }

                DB::commit();

                // Log the operation  
            
                if (!empty($myBadge)){
                $websiteLog =new WebsiteLogs();
                $websiteLog->emp_id = NULL;
                $websiteLog->logs_type ="Badge expiry";
                $websiteLog->table_name ="my_badges && my_old_badges";
                $websiteLog->response =json_encode($myBadge);
                // dd('json');
                $websiteLog->save();
                }
            }
            catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
                // $websiteLog =new WebsiteLogs();
                // $websiteLog->emp_id = NULL;
                // $websiteLog->logs_type ="Seller package mothly debit & credit";
                // $websiteLog->table_name ="mysellerpackage && mysellerwallet";
                // $websiteLog->response =json_encode($exception->getMessage());
                // $websiteLog->save();
        }

    }
    public function BuyerPackageCurrentUnitCheckCron()
    {
        $latestRecords = MyBuyerWallet::select('user_id', DB::raw('MAX(id) as latest_id'))
        ->where('current_unit', 0)
        ->groupBy('user_id');

        // Join the main table with the subquery to get the latest records for each user_id
        $data = MyBuyerWallet::joinSub($latestRecords, 'latest_records', function($join) {
        $join->on('my_buyer_wallets.id', '=', 'latest_records.latest_id');
        })
        ->orderByDesc('created_at')
        ->get()
        ->toArray();
        // dd($data);
        try{
            DB::beginTransaction();

                if(!empty($data)){
                    foreach($data as $item){
                    $myCurrentBuyerPackage = MyBuyerPackage::where('user_id',$item['user_id'])->latest()->first();
                    // dd($myCurrentBuyerPackage);
                    $old_buyer_package = DB::table('old_buyer_packages')->insert([
                        'package_id' => $myCurrentBuyerPackage->package_id,
                        'package_type' => $myCurrentBuyerPackage->package_type,
                        'user_id' => $myCurrentBuyerPackage->user_id,
                        'package_duration' => $myCurrentBuyerPackage->package_duration,
                        'package_amount' => $myCurrentBuyerPackage->package_amount,
                        'package_credit' => $myCurrentBuyerPackage->package_credit,
                        'purchase_date' => $myCurrentBuyerPackage->created_at,
                        'expiry_date' => $myCurrentBuyerPackage->expiry_date,
                    ]);

                        // Delete from MyBuyerPackage
                        MyBuyerPackage::where('id', $myCurrentBuyerPackage->id)->delete();
                    }
                }
                DB::commit();

                // Log the operation  
            
                if (!empty($data)){
                $websiteLog =new WebsiteLogs();
                $websiteLog->emp_id = NULL;
                $websiteLog->logs_type ="Seller package expiry for current unit 0";
                $websiteLog->table_name ="my_buyer_package && old_buyer_package";
                $websiteLog->response =json_encode($data);
                // dd('json');
                $websiteLog->save();
                }
            }
            catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
                // $websiteLog =new WebsiteLogs();
                // $websiteLog->emp_id = NULL;
                // $websiteLog->logs_type ="Seller package mothly debit & credit";
                // $websiteLog->table_name ="mysellerpackage && mysellerwallet";
                // $websiteLog->response =json_encode($exception->getMessage());
                // $websiteLog->save();
            }


    }
    public function BuyerExpiryPackageCheckCron()
    {
        // Get the current datetime in 'Y-m-d H:i:00' format (excluding seconds)
        $currentDateTime = Carbon::now()->format('Y-m-d H:i:00');
        
        // Calculate the range for 1 minute before and 1 minute after the current datetime
        $oneMinuteBefore = Carbon::parse($currentDateTime)->subMinute()->format('Y-m-d H:i:00');
        $oneMinuteAfter = Carbon::parse($currentDateTime)->addMinute()->format('Y-m-d H:i:00');
        
        // Query MySellerPackage where expiry_date is within the 1-minute range
        $data = MyBuyerPackage::whereBetween('expiry_date', [$oneMinuteBefore, $oneMinuteAfter])->get()->toArray();
        // dd($data);

        
        try{
            DB::beginTransaction();


                if (!empty($data)) { // Check if the collection is not empty
                    foreach($data as $item){
                    $purchaseDate = Carbon::parse($item['created_at'])->format('Y-m-d H:i:s');
                // Insert into my_old_seller_package
                DB::table('old_buyer_packages')->insert([
                    'package_id' => $item['package_id'],
                    'package_type' => $item['package_type'],
                    'user_id' => $item['user_id'],
                    'package_duration' => $item['package_duration'],
                    'package_amount' => $item['package_amount'],
                    'package_credit' => $item['package_credit'],
                    'purchase_date' => $purchaseDate,
                    'expiry_date' => $item['expiry_date'],

                    ]);

                        // Delete from MySellerPackage
                        MyBuyerPackage::where('id', $item['id'])->delete();
                    }
                }
                DB::commit();

                // Log the operation  
            
                if (!empty($data)){
                $websiteLog =new WebsiteLogs();
                $websiteLog->emp_id = NULL;
                $websiteLog->logs_type ="Buyer package expiry";
                $websiteLog->table_name ="my_buyer_package && old_buyer_package";
                $websiteLog->response =json_encode($data);
                // dd('json');
                $websiteLog->save();
                }
            }
            catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
                // $websiteLog =new WebsiteLogs();
                // $websiteLog->emp_id = NULL;
                // $websiteLog->logs_type ="Seller package mothly debit & credit";
                // $websiteLog->table_name ="mysellerpackage && mysellerwallet";
                // $websiteLog->response =json_encode($exception->getMessage());
                // $websiteLog->save();
        }
    }

}
