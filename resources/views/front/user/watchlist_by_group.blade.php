@extends('front.layout.app')
@section('section')
<div class="main">
    <div class="inner-page">

        <div class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="inner-wrap">
                            <ul>
                                <li><a href="{{route('user.watchlist')}}" class="text-primary">Home</a></li>
                                <li>&nbsp;>&nbsp;{{$GroupWatchList->group_name}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <section class="bidder-search-results-section watchlist-groups-view">
            <div class="container">
                <div class="row top-section">
                    <div class="col-12">
                        <div class="section-header">
                            <h2>{{$GroupWatchList->group_name}}</h2>
                        </div>
                    </div>
                </div>

                <div class="top-cta-row">
                    <button type="button" class="btn btn-animated">Add Participants from Website</button>
                    <a href="{{ route('user.watchlist', ['group' => $GroupWatchList->slug]) }}" class="btn btn-animated">Add Participants from Watchlist</a>
                    <button type="button" class="btn btn-animated" data-bs-toggle="modal" data-bs-target="#inviteModal">Invite Participants from Outside</button>
                    @if(count($WatchList)>0)
                        <button type="button" class="btn btn-animated btn-yellow btn-auction" data-bs-toggle="modal" data-bs-target="#sendToInquiryModal">Start Inquiry</button>
                    @endif
                </div>

                <div class="page-tabs-row">
                    <ul class="nav nav-tabs watchlist-tabs watchlistgroup-tabs" id="watchlistTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="watchlistgroup-all" data-bs-toggle="tab" data-bs-target="#watchlistgroupsall" type="button" role="tab" aria-controls="watchlistgroupsall" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="watchlistgroups-website" data-bs-toggle="tab" data-bs-target="#watchlistgroupswebsite" type="button" role="tab" aria-controls="watchlistgroupswebsite" aria-selected="false">Participants from website</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="watchlistgroups-outside" data-bs-toggle="tab" data-bs-target="#watchlistgroupsoutside" type="button" role="tab" aria-controls="watchlistgroupsoutside" aria-selected="false">Participants from Outside</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content watchlist-tab-content">
                    <div class="tab-pane fade show active" id="watchlistgroupsall" role="tabpanel" aria-labelledby="watchlistgroupsall-tab" tabindex="0">
                        <div class="row list-section">
                            @foreach($WatchList as $key=>$item)
                            <div class="col-lg-6 col-12 content-col">
                                <div class="bidder-box type-2">
                                    <div class="dots-cta">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="18" cy="18" r="18" fill="#ee2737"/>
                                                    <path d="M18 19C18.5523 19 19 18.5523 19 18C19 17.4477 18.5523 17 18 17C17.4477 17 17 17.4477 17 18C17 18.5523 17.4477 19 18 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M25 19C25.5523 19 26 18.5523 26 18C26 17.4477 25.5523 17 25 17C24.4477 17 24 17.4477 24 18C24 18.5523 24.4477 19 25 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11 19C11.5523 19 12 18.5523 12 18C12 17.4477 11.5523 17 11 17C10.4477 17 10 17.4477 10 18C10 18.5523 10.4477 19 11 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>                                                
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Report</a></li>
                                            </ul>
                                        </div>
                                        <button type="button" class="btn-remove remove_group_watchlist" data-id="{{ $item->id }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 6H5H21" stroke="#F70000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6" stroke="#F70000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10 11V17" stroke="#F70000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14 11V17" stroke="#F70000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="img-holder">
                                        <img src="{{ $item->SellerData && $item->SellerData->image ? asset($item->SellerData->image) : asset('frontend/assets/images/blurred-traffic-light-trails-road.png') }}" alt="">
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
                                        <div class="name">{{$item->SellerData && $item->SellerData->business_name?$item->SellerData->business_name:""}}</div>
                                        <div class="rating">
                                            <ul class="rating-stars">
                                                <li class="star three">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="star three">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="star three">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                            </ul>
                                            <span class="badge badge-rating bg-theme">4.0</span>
                                        </div>
                                        <div class="info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @if($item->SellerData->address)
                                                {{$item->SellerData->address}}, {{$item->SellerData->city}}, {{$item->SellerData->state}}
                                            @endif
                                        </div>
                                        <div class="info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M15.0499 5C16.0267 5.19057 16.9243 5.66826 17.628 6.37194C18.3317 7.07561 18.8094 7.97326 18.9999 8.95M15.0499 1C17.0792 1.22544 18.9715 2.13417 20.4162 3.57701C21.8608 5.01984 22.7719 6.91101 22.9999 8.94M21.9999 16.92V19.92C22.0011 20.1985 21.944 20.4742 21.8324 20.7293C21.7209 20.9845 21.5572 21.2136 21.352 21.4019C21.1468 21.5901 20.9045 21.7335 20.6407 21.8227C20.3769 21.9119 20.0973 21.9451 19.8199 21.92C16.7428 21.5856 13.7869 20.5341 11.1899 18.85C8.77376 17.3147 6.72527 15.2662 5.18993 12.85C3.49991 10.2412 2.44818 7.27099 2.11993 4.18C2.09494 3.90347 2.12781 3.62476 2.21643 3.36162C2.30506 3.09849 2.4475 2.85669 2.6347 2.65162C2.82189 2.44655 3.04974 2.28271 3.30372 2.17052C3.55771 2.05833 3.83227 2.00026 4.10993 2H7.10993C7.59524 1.99522 8.06572 2.16708 8.43369 2.48353C8.80166 2.79999 9.04201 3.23945 9.10993 3.72C9.23656 4.68007 9.47138 5.62273 9.80993 6.53C9.94448 6.88792 9.9736 7.27691 9.89384 7.65088C9.81408 8.02485 9.6288 8.36811 9.35993 8.64L8.08993 9.91C9.51349 12.4135 11.5864 14.4864 14.0899 15.91L15.3599 14.64C15.6318 14.3711 15.9751 14.1858 16.3491 14.1061C16.723 14.0263 17.112 14.0555 17.4699 14.19C18.3772 14.5286 19.3199 14.7634 20.2799 14.89C20.7657 14.9585 21.2093 15.2032 21.5265 15.5775C21.8436 15.9518 22.0121 16.4296 21.9999 16.92Z" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @php
                                            $mobile = $item->SellerData->mobile?$item->SellerData->mobile:"xxx";
                                            $maskedNumber = substr_replace($mobile, 'xxxxxxxx', 0, -3);
                                            @endphp
                                            +91-{{$maskedNumber}}
                                        </div>
                                    </div>
                                    <div class="cta">
                                        @php
                                                $business_name_slug = Str::slug($item->SellerData->business_name, '-');
                                                $seller_location = Str::slug($item->SellerData->city, '-');
                                        @endphp
                                      <a href="{{route('user.profile.fetch', [$seller_location,$business_name_slug])}}" class="btn btn-cta btn-normal">View Profile</a>
                                        <button type="button" class="btn btn-cta btn-animated btn-yellow">Previously Worked</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="watchlistgroupswebsite" role="tabpanel" aria-labelledby="watchlistgroupswebsite-tab" tabindex="0">
                        <div class="row list-section">
                            @foreach($WatchList as $key=>$item)
                            <div class="col-lg-6 col-12 content-col">
                                <div class="bidder-box type-2">
                                    <div class="dots-cta">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="18" cy="18" r="18" fill="#ee2737"/>
                                                    <path d="M18 19C18.5523 19 19 18.5523 19 18C19 17.4477 18.5523 17 18 17C17.4477 17 17 17.4477 17 18C17 18.5523 17.4477 19 18 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M25 19C25.5523 19 26 18.5523 26 18C26 17.4477 25.5523 17 25 17C24.4477 17 24 17.4477 24 18C24 18.5523 24.4477 19 25 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11 19C11.5523 19 12 18.5523 12 18C12 17.4477 11.5523 17 11 17C10.4477 17 10 17.4477 10 18C10 18.5523 10.4477 19 11 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>                                                
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Report</a></li>
                                            </ul>
                                        </div>
                                        <button type="button" class="btn-remove remove_group_watchlist" data-id="{{ $item->id }}">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 6H5H21" stroke="#F70000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6" stroke="#F70000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10 11V17" stroke="#F70000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14 11V17" stroke="#F70000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="img-holder">
                                        <img src="{{ $item->SellerData && $item->SellerData->image ? asset($item->SellerData->image) : asset('frontend/assets/images/blurred-traffic-light-trails-road.png') }}" alt="">
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
                                        <div class="name">{{$item->SellerData && $item->SellerData->business_name?$item->SellerData->business_name:""}}</div>
                                        <div class="rating">
                                            <ul class="rating-stars">
                                                <li class="star three">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="star three">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="star three">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="star">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                        <g>
                                                            <path d="m23.363 8.584-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 0 0-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 0 0 1.103.777L12 20.245l6.59 3.643a.75.75 0 0 0 1.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 0 0-.423-1.266z" opacity="1" data-original="#ffc107"></path>
                                                        </g>
                                                    </svg>
                                                </li>
                                            </ul>
                                            <span class="badge badge-rating bg-theme">4.0</span>
                                        </div>
                                        <div class="info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @if($item->SellerData->address)
                                                {{$item->SellerData->address}}, {{$item->SellerData->city}}, {{$item->SellerData->state}}
                                            @endif
                                        </div>
                                        <div class="info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M15.0499 5C16.0267 5.19057 16.9243 5.66826 17.628 6.37194C18.3317 7.07561 18.8094 7.97326 18.9999 8.95M15.0499 1C17.0792 1.22544 18.9715 2.13417 20.4162 3.57701C21.8608 5.01984 22.7719 6.91101 22.9999 8.94M21.9999 16.92V19.92C22.0011 20.1985 21.944 20.4742 21.8324 20.7293C21.7209 20.9845 21.5572 21.2136 21.352 21.4019C21.1468 21.5901 20.9045 21.7335 20.6407 21.8227C20.3769 21.9119 20.0973 21.9451 19.8199 21.92C16.7428 21.5856 13.7869 20.5341 11.1899 18.85C8.77376 17.3147 6.72527 15.2662 5.18993 12.85C3.49991 10.2412 2.44818 7.27099 2.11993 4.18C2.09494 3.90347 2.12781 3.62476 2.21643 3.36162C2.30506 3.09849 2.4475 2.85669 2.6347 2.65162C2.82189 2.44655 3.04974 2.28271 3.30372 2.17052C3.55771 2.05833 3.83227 2.00026 4.10993 2H7.10993C7.59524 1.99522 8.06572 2.16708 8.43369 2.48353C8.80166 2.79999 9.04201 3.23945 9.10993 3.72C9.23656 4.68007 9.47138 5.62273 9.80993 6.53C9.94448 6.88792 9.9736 7.27691 9.89384 7.65088C9.81408 8.02485 9.6288 8.36811 9.35993 8.64L8.08993 9.91C9.51349 12.4135 11.5864 14.4864 14.0899 15.91L15.3599 14.64C15.6318 14.3711 15.9751 14.1858 16.3491 14.1061C16.723 14.0263 17.112 14.0555 17.4699 14.19C18.3772 14.5286 19.3199 14.7634 20.2799 14.89C20.7657 14.9585 21.2093 15.2032 21.5265 15.5775C21.8436 15.9518 22.0121 16.4296 21.9999 16.92Z" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @php
                                            $mobile = $item->SellerData->mobile?$item->SellerData->mobile:"xxx";
                                            $maskedNumber = substr_replace($mobile, 'xxxxxxxx', 0, -3);
                                            @endphp
                                            +91-{{$maskedNumber}}
                                        </div>
                                    </div>
                                    <div class="cta">
                                        @php
                                                $business_name_slug = Str::slug($item->SellerData->business_name, '-');
                                                $seller_location = Str::slug($item->SellerData->city, '-');
                                        @endphp
                                      <a href="{{route('user.profile.fetch', [$seller_location,$business_name_slug])}}" class="btn btn-cta btn-normal">View Profile</a>
                                        <button type="button" class="btn btn-cta btn-animated btn-yellow">Previously Worked</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="watchlistgroupsoutside" role="tabpanel" aria-labelledby="watchlistgroupsoutside-tab" tabindex="0">
                        
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</div>

<div class="modal fade invite-modal" id="inviteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Invite Participants from Outside</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-row">
                    <div class="input-wrap">
                        <label>Name</label>
                        <input type="text" placeholder="Ex, John" class="border-red">
                    </div>
                    <div class="input-wrap">
                        <label>Phone Number *</label>
                        <input type="text" placeholder="Ex xx - xxx - xxxx" class="border-red">
                    </div>
                    <button type="button" class="btn-add">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 5V19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 12H19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button type="button" class="btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M3 6H5H21" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 11V17" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 11V17" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="input-row">
                    <div class="input-wrap">
                        <label>Name</label>
                        <input type="text" placeholder="Ex, John" class="border-red">
                    </div>
                    <div class="input-wrap">
                        <label>Phone Number *</label>
                        <input type="text" placeholder="Ex xx - xxx - xxxx" class="border-red">
                    </div>
                    <button type="button" class="btn-add">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 5V19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 12H19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button type="button" class="btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M3 6H5H21" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 11V17" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 11V17" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="input-row">
                    <div class="input-wrap">
                        <label>Name</label>
                        <input type="text" placeholder="Ex, John" class="border-red">
                    </div>
                    <div class="input-wrap">
                        <label>Phone Number *</label>
                        <input type="text" placeholder="Ex xx - xxx - xxxx" class="border-red">
                    </div>
                    <button type="button" class="btn-add">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 5V19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 12H19" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button type="button" class="btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M3 6H5H21" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 11V17" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 11V17" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <button type="button" class="btn btn-animated btn-submit">Invite Now</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade send-to-modal" id="sendToInquiryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" name="group" value="{{Crypt::encrypt($GroupWatchList->id)}}">
                        <button type="submit" class="btn btn-animated btn-submit w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade send-to-modal create-group-modal" id="createWatchlistGroupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Name of the Group</label>
                <input type="text" class="form-control border-red" placeholder="Write a Group name">
                <button type="button" class="btn btn-animated btn-submit w-100">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
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
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your group has been deleted.',
                                    icon: 'success',
                                    timer: 2000 // Adjust the timer as needed
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
            });
        });
    });
</script>
@endsection