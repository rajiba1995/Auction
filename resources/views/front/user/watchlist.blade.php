@extends('front.layout.app')
@section('section')
@php
    $group = request()->has('group') ? request()->query('group') : '';
@endphp
<div class="main">
    <div class="inner-page">

        <div class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="inner-wrap">
                            <ul>
                                <li><a href="{{ asset('') }}">Home</a></li>
                                <li>&nbsp;>&nbsp;Watchlist</span></li>
                                <li> 
                                    @if (session('warning'))
                                        <div class="alert alert-warning" id="successAlert">
                                            {{ session('warning') }}
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <section class="bidder-search-results-section watchlist-page-section">
            <div class="container">
                <div class="page-tabs-row">
                    <ul class="nav nav-tabs watchlist-tabs" id="watchlistTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="watchlist-tab" data-bs-toggle="tab"
                                data-bs-target="#watchlist" type="button" role="tab" aria-controls="watchlist"
                                aria-selected="true">Watchlist</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="watchlistgroups-tab" data-bs-toggle="tab"
                                data-bs-target="#watchlistgroups" type="button" role="tab"
                                aria-controls="watchlistgroups" aria-selected="false">Watchlist Groups</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content watchlist-tab-content">
                    <div class="tab-pane fade show active" id="watchlist" role="tabpanel"
                        aria-labelledby="watchlist-tab" tabindex="0">
                        <div class="row list-section">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-12 left-col">
                                
                                @if(count($WatchList)>0)
                                    @foreach($WatchList as $key =>$item)

                                        <label for="bidder{{$key}}" class="bidder-check">
                                            @if($group)
                                            <input type="checkbox" name="seller_data[]" id="bidder{{$key}}" value="{{$item->SellerData->id}}">
                                            <span class="checkmark">
                                                <svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.5 1.75L4.625 8.625L1.5 5.5" stroke="#0076D7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>                                                
                                            </span>
                                            @endif
                                            <div class="bidder-box" id="singleList{{$item->id}}">
                                                <div class="dots-cta">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="18" cy="18" r="18" fill="#ee2737" />
                                                                <path
                                                                    d="M18 19C18.5523 19 19 18.5523 19 18C19 17.4477 18.5523 17 18 17C17.4477 17 17 17.4477 17 18C17 18.5523 17.4477 19 18 19Z"
                                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M25 19C25.5523 19 26 18.5523 26 18C26 17.4477 25.5523 17 25 17C24.4477 17 24 17.4477 24 18C24 18.5523 24.4477 19 25 19Z"
                                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M11 19C11.5523 19 12 18.5523 12 18C12 17.4477 11.5523 17 11 17C10.4477 17 10 17.4477 10 18C10 18.5523 10.4477 19 11 19Z"
                                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="#">Report</a></li>
                                                        </ul>
                                                    </div>
                                                    <button type="button" class="btn-remove remove_group_watchlist" data-id="{{ $item->id }}">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3 6H5H21" stroke="#F70000" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6"
                                                                stroke="#F70000" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M10 11V17" stroke="#F70000" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14 11V17" stroke="#F70000" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="img-holder">
                                                    <img src="{{ $item->SellerData && $item->SellerData->image?asset($item->SellerData->image):asset('frontend/assets/images/building.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="content-holder">
                                                    <div class="approvals">
                                                        <ul>
                                                            @php
                                                                $data = App\Models\User::findOrFail($item->seller_id);
                                                            @endphp
                                                            @if(count($data->MyBadgeData)>0)
                                                            @foreach ($data->MyBadgeData as $item_badge)
                                                                @if($item_badge->getBadgeDetails)
                                                                    <li>
                                                                        <img src="{{asset($item_badge->getBadgeDetails->logo)}}" alt="" width="20px"> <span class="text-sm info" style="margin-bottom:0px;">{{ucwords($item_badge->getBadgeDetails->title)}}</span>
                                                                        <div class="infotip"><span>{{ Str::limit($item_badge->getBadgeDetails->short_desc, 50) }}</span></div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        </ul>
                                                    </div>
                                                    <div class="name">
                                                        {{ $item->SellerData?$item->SellerData->business_name:"" }}
                                                    </div>
                                                    @php
                                                        $asSeller = App\Models\ReviewRating::where('rated_on', $item->seller_id)->where('type', 2)->count();
                                                        $asSellerOverAllRating = App\Models\ReviewRating::where('rated_on',$item->seller_id)->where('type',2)->sum('overall_rating');
                                                        
                                                        if ($asSeller > 0) {
                                                                $sellerOverAllRating = number_format(($asSellerOverAllRating / $asSeller), 1);
                                                            } else {
                                                                $sellerOverAllRating = 0;
                                                            }

                                                    @endphp
                                                    <div class="rating-value">
                                                        <div class="rating-star-values">
                                                            <ul class="rating-stars blank-stars">
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                            </ul>
                                                            <ul class="rating-stars solid-stars" data-rating="{{$sellerOverAllRating}}">
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m29.911 13.75-6.229 6.072 1.471 8.576a1 1 0 0 1-1.451 1.054L16 25.403l-7.701 4.048a1 1 0 0 1-1.451-1.054l1.471-8.576-6.23-6.071a1 1 0 0 1 .555-1.706l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25a1.002 1.002 0 0 1 .555 1.706z" fill="#000000" opacity="1" data-original="#000000" class="" style="
                                                                        "></path></g></svg>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <span class="badge badge-rating bg-theme">{{$sellerOverAllRating}}</span>
                                                </div>
                                                    <div class="info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z"
                                                                stroke="#ee2737" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                                                stroke="#ee2737" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        @if($item->SellerData && $item->SellerData->address)
                                                        {{$item->SellerData->address}}, {{getCity($item->SellerData?$item->SellerData->city:"")}}, {{getState($item->SellerData?$item->SellerData->state:"")}}
                                                        @endif
                                                    </div>
                                                    <div class="info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M15.0499 5C16.0267 5.19057 16.9243 5.66826 17.628 6.37194C18.3317 7.07561 18.8094 7.97326 18.9999 8.95M15.0499 1C17.0792 1.22544 18.9715 2.13417 20.4162 3.57701C21.8608 5.01984 22.7719 6.91101 22.9999 8.94M21.9999 16.92V19.92C22.0011 20.1985 21.944 20.4742 21.8324 20.7293C21.7209 20.9845 21.5572 21.2136 21.352 21.4019C21.1468 21.5901 20.9045 21.7335 20.6407 21.8227C20.3769 21.9119 20.0973 21.9451 19.8199 21.92C16.7428 21.5856 13.7869 20.5341 11.1899 18.85C8.77376 17.3147 6.72527 15.2662 5.18993 12.85C3.49991 10.2412 2.44818 7.27099 2.11993 4.18C2.09494 3.90347 2.12781 3.62476 2.21643 3.36162C2.30506 3.09849 2.4475 2.85669 2.6347 2.65162C2.82189 2.44655 3.04974 2.28271 3.30372 2.17052C3.55771 2.05833 3.83227 2.00026 4.10993 2H7.10993C7.59524 1.99522 8.06572 2.16708 8.43369 2.48353C8.80166 2.79999 9.04201 3.23945 9.10993 3.72C9.23656 4.68007 9.47138 5.62273 9.80993 6.53C9.94448 6.88792 9.9736 7.27691 9.89384 7.65088C9.81408 8.02485 9.6288 8.36811 9.35993 8.64L8.08993 9.91C9.51349 12.4135 11.5864 14.4864 14.0899 15.91L15.3599 14.64C15.6318 14.3711 15.9751 14.1858 16.3491 14.1061C16.723 14.0263 17.112 14.0555 17.4699 14.19C18.3772 14.5286 19.3199 14.7634 20.2799 14.89C20.7657 14.9585 21.2093 15.2032 21.5265 15.5775C21.8436 15.9518 22.0121 16.4296 21.9999 16.92Z"
                                                                stroke="#ee2737" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        @php
                                                            $mobile =
                                                            $item->SellerData && $item->SellerData->mobile?$item->SellerData->mobile:"xxx";
                                                            $maskedNumber = substr_replace($mobile, 'xxxxxxxx', 0, -3);
                                                            // $business_name_slug = optional($item->SellerData)->business_name
                                                            // ? Str::slug($item->SellerData->business_name, '-') : '';
                                                           
                                                            if($item->SellerData){
                                                                $seller_city = getCitySlug($item->SellerData->city?$item->SellerData->city:"");
                                                            }
                                                        @endphp
                                                        +91-{{ $maskedNumber }}
                                                        
                                                    </div>
                                                    <div class="cta">
                                                        <a href="{{ route('user.profile.fetch', [$seller_city,$item->SellerData->slug_business_name]) }}"
                                                            class="btn btn-cta btn-normal">View Profile</a>
                                                    </div>
                                                    <div class="cta logged-cta">
                                                    @if(previously_worked($item->seller_id, Auth::guard('web')->user()->id))
                                                        <button type="button"
                                                            class="btn btn-cta btn-animated btn-yellow">Previously
                                                            Worked</button>
                                                    @endif        

                                                        <button type="button" class="btn btn-cta btn-animated"
                                                            data-bs-toggle="modal" data-bs-target="#sendToInquiryModal{{$item->id}}">Send to Inquiry</button>
                                                    </div>
                                                    <div class="modal fade send-to-modal" id="sendToInquiryModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('front.auction_inquiry_generation') }}" method="GET">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-xl-6 col-12">
                                                                                <label for="sendInquiry" class="modal-custom-radio">
                                                                                    <input type="radio" name="inquiry_type" id="sendInquiry" value="new-inquiry" checked>
                                                                                    <span class="checkmark">
                                                                                        <span class="checkedmark"></span>
                                                                                    </span>
                                                                                    <div class="radio-text">
                                                                                        <label for="sendInquiry">New Inquiry</label>
                                                                                        <span>Generate a new auction inquiry</span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-xl-6 col-12">
                                                                                <label for="sendInquiryExisting" class="modal-custom-radio">
                                                                                    <input type="radio" name="inquiry_type" id="sendInquiryExisting" value="existing-inquiry">
                                                                                    <span class="checkmark">
                                                                                        <span class="checkedmark"></span>
                                                                                    </span>
                                                                                    <div class="radio-text">
                                                                                        <label for="sendInquiryExisting">Existing Inquiry</label>
                                                                                        <span>Send to previously generated auction inquiry</span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        <div id="inquiryoptions">
                                                                            <h5>Select Inquiry</h5>
                                                                            <div class="dropdown watchlistgroups">
                                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    Select
                                                                                    <img src="{{asset('frontend/assets/images/chevron-down.png')}}" alt="">
                                                                                    <select name="inquiry_id" class="form-control">
                                                                                        @if(count($existing_inquiries)>0)
                                                                                            <option value="" selected hidden>select inquiry..</option>
                                                                                            @foreach ($existing_inquiries as $eitem)
                                                                                            <option value="{{$eitem->inquiry_id}}">{{$eitem->inquiry_id}}</option>
                                                                                            @endforeach
                                                                                        @else
                                                                                        <option value="" selected hidden>No inquiry found.</option>
                                                                                        @endif
                                                                                    </select>
                                                                                </button>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="seller" value="{{Crypt::encrypt($item->SellerData->id)}}">
                                                                        <button type="submit" class="btn btn-animated btn-submit w-100">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        No data available.
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if($group)
                            <div class="text-end mt-2">
                                <button type="button" class="btn btn-animated btn-create" id="Add_participants">Add Participants</button>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="watchlistgroups" role="tabpanel"
                        aria-labelledby="watchlistgroups-tab" tabindex="0">
                        <div class="create-watchlist-group top-cta-bar">
                            <button type="button" class="btn btn-animated btn-create" data-bs-toggle="modal"
                                data-bs-target="#createWatchlistGroupModal">Create Group</button>
                        </div>
                        <ul class="watchlist-group-list">
                            @foreach( $groupWatchList as $item)
                                @php
                                    $SellerList = GetSellerByGroupId($item->id);
                                @endphp
                                <li id="watchLIst{{$item->id}}">
                                    <label>{{ $item->group_name }}{{$SellerList?"(".count($SellerList).")":""}}</label>
                                    <button type="button" class="btn btn-cta btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#updateWatchlistGroupModal{{$item->id}}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13"
                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M18.5 2.49998C18.8978 2.10216 19.4374 1.87866 20 1.87866C20.5626 1.87866 21.1022 2.10216 21.5 2.49998C21.8978 2.89781 22.1213 3.43737 22.1213 3.99998C22.1213 4.56259 21.8978 5.10216 21.5 5.49998L12 15L8 16L9 12L18.5 2.49998Z"
                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    {{-- update modal --}}
                                        <div class="modal fade send-to-modal create-group-modal"
                                        id="updateWatchlistGroupModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form id="updateGroupForm{{ $item->id }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label class="form-label">Update Group Watch List Name:</label>
                                                        <input type="text" name="group_watchlist_name"
                                                            class="form-control border-red"
                                                            value="{{ $item->group_name }}">
                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                        <button type="button"
                                                            class="btn btn-animated btn-submit w-100"  onclick="submitUpdateGroupForm({{ $item->id }})" >Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-cta btn-remove itemremove" data-id="{{$item->id}}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6H5H21" stroke="#F70000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6"
                                                stroke="#F70000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M10 11V17" stroke="#F70000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M14 11V17" stroke="#F70000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                    <a href="{{route('user.watchlist.my_watchlist_by_group', $item->slug)}}" class="btn btn-animated btn-view bg-green">Open</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>


<div class="modal fade send-to-modal create-group-modal" id="createWatchlistGroupModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createGroupForm" >
                @csrf
                <div class="modal-body">
                    <label class="form-label">Name of the Group</label>
                    <input type="text" name="group_watchlist_name" id="group_watchlist_name" class="form-control border-red"
                        placeholder="Write a Group name" required>
                        <p class="error_insert_group text-danger"></p>
                    <button type="button" class="btn btn-animated btn-submit w-100" onclick="submitCreateGroupForm()">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#Add_participants').click(function () {
            var seller = $('input[name="seller_data[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            var group_slug = "{{ $group }}";
            $.ajax({
                url: "{{route('user.seller_buk_upload_on_group_watchlist')}}", // Specify the URL to which the request will be sent
                type: 'GET',
                data: {
                    seller:seller,
                    group_slug:group_slug,
                },
                success: function (response) {
                    if(response.status==200){
                        window.location.href = response.route;
                    }else{
                        location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    // Handle errors that occur during the AJAX request
                    console.error('AJAX request error:', error);
                }
            });
        });
    });
    $(document).ready(function () {
        $('.itemremove').click(function () {
            var itemId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route("user.delete.group.watchlist") }}',
                        data: {
                            id:itemId
                        },
                        success: function(response) {
                            if(response.status==200){
                                $('#watchLIst'+itemId).remove();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    });
    $(document).ready(function () {
        $('.remove_group_watchlist').click(function () {
            var itemId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route("user.single_watchlist.delete") }}',
                        data: {
                            id:itemId
                        },
                        success: function(response) {
                            if(response.status==200){
                                $('#singleList'+itemId).remove();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    function submitCreateGroupForm(){
        event.preventDefault();
        var group_name = $('#group_watchlist_name').val();
        if (group_name.length == 0) {
            // Display the error message immediately
            $('.error_insert_group').text('Please enter group name');
            // Set a timeout to remove the error message after 3 seconds
            setTimeout(function() {
                $('.error_insert_group').text('');
            }, 3000); // 3000 milliseconds = 3 seconds
            return false;
        }
        var formData = new FormData(document.getElementById('createGroupForm'));
        $.ajax({
            type: 'POST',
            url: '{{ route("user.create.group.watchlist") }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response,status) {
                if (response.status==400) {
                    Swal.fire({
                        title: "Warning!",
                        text: "Group name already exists!",
                        icon: "warning"
                    });
                } 
                if(response.status==200){
                    Swal.fire({
                        title: "Success!",
                        text: "Your group watchlist has been created successfully!",
                        icon: "success"
                    });
                    setTimeout(function() {
                        // Reload the page
                        location.reload();
                    }, 1000);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

</script>
<script>
     function submitUpdateGroupForm(groupId) {
    event.preventDefault();

    var formData = new FormData(document.getElementById('updateGroupForm' + groupId));
    $.ajax({
        type: 'POST',
        url: "{{ route('user.update.group.watchlist') }}",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response, status) {
            console.log(response);
            console.log(status);
            if (response.status === 400) {
                Swal.fire({
                    title: "Warning!",
                    text: "Group name already exists!",
                    icon: "warning"
                });
            } else if (response.status === 200) {
                Swal.fire({
                    title: "Success!",
                    text: "Your group watchlist has been updated successfully!",
                    icon: "success"
                });
                setTimeout(function() {
                    // Reload the page
                    location.reload();
                }, 1000);
            }
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        }
    });
}
    </script>
@endsection