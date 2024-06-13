<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MySellerPackage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CheckActiveSellerPackage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $currentDateTime = Carbon::now();
        $MySellerPackage =MySellerPackage::latest()->where('user_id', $user->id)->where('expiry_date','>', $currentDateTime)->first();
        if (!$MySellerPackage) {
            Session::put('url.intended', $request->fullUrl());
            return redirect()->route('user.payment_management', ['package'=>'seller'])->with('error', 'You do not have an active seller package.');
        }

        return $next($request);
    }
}
