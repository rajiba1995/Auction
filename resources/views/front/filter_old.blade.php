@extends('front.layout.app')
@section('location', $location)
@section('keyword', $keyword)
@section('section')
<div class="main">
    <div class="inner-page">

        <div class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="inner-wrap">
                            <ul>
                                <li>{{$location}}</li>
                                <li>&nbsp;>&nbsp;{{$keyword}} <span class="color-red">({{count($data)}} results)</span></li>
                                <li> 
                                    {{-- @if (session('success'))
                                        <div class="alert alert-success" id="successAlert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('warning'))
                                        <div class="alert alert-warning" id="successAlert">
                                            {{ session('warning') }}
                                        </div>
                                    @endif --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @if(count($data)>0)
        <section class="bidder-search-results-section search-list-after-login">
            <div class="container">
                <div class="row top-section">
                    <div class="col-12">
                        <div class="section-header">
                            <h2>Top {{$keyword}}</h2>
                           
                            <div class="filter-panel">
                                <select>
                                    <option value="" selected disabled>Sort By</option>
                                    <option value="">Relevance</option>
                                    <option value="">Rating</option>
                                    <option value="">Popular</option>
                                </select>
                                <label for="top_rated" class="custom-checkbox">
                                    <input type="checkbox" name="" id="top_rated">
                                    <span class="check-mark">
                                        Top Rated
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                            <path d="M12 2.24414L15.09 8.50414L22 9.51414L17 14.3841L18.18 21.2641L12 18.0141L5.82 21.2641L7 14.3841L2 9.51414L8.91 8.50414L12 2.24414Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </label>
                                <label for="verified" class="custom-checkbox">
                                    <input type="checkbox" name="" id="verified">
                                    <span class="check-mark">
                                        Verified
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 15C15.866 15 19 11.866 19 8C19 4.13401 15.866 1 12 1C8.13401 1 5 4.13401 5 8C5 11.866 8.13401 15 12 15Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.21 13.8899L7 22.9999L12 19.9999L17 22.9999L15.79 13.8799" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row list-section">
                        <div class="col-lg-8 col-12 left-col">
                            @foreach ($data as $item)
                            <div class="bidder-box">
                                <div class="dots-cta">
                                    @if(Auth::guard('web')->check())
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
                                        <li><button type="button" data-bs-toggle="modal" data-bs-target="#sendToWatchlistModalReport{{$item->id}}" class="dropdown-item" href="#">Report</button></li>
                                        {{-- report modal --}}
                                        
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="img-holder">
                                    <img src="{{$item->image?asset($item->image):asset('frontend/assets/images/building.png')}}" alt="">
                                </div>
                                <div class="content-holder">
                                    <div class="approvals">
                                        <ul>
                                            @if(count($item->MyBadgeData)>0)
                                                @foreach ($item->MyBadgeData as $item_badge)
                                                    @if($item_badge->getBadgeDetails)
                                                        <li>
                                                            <img src="{{asset($item_badge->getBadgeDetails->logo)}}" alt="" width="20px"> <span class="text-sm info" style="margin-bottom:0px;">{{ucwords($item_badge->getBadgeDetails->title)}}</span>
                                                            <div class="infotip"><span>{{ Str::limit($item_badge->getBadgeDetails->short_desc, 50) }}</span></div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                            <li>
                                                <img src="{{asset('frontend/assets/images/trusted.png')}}" alt="">
                                                <div class="infotip"><span>It is a long established fact</span></div>
                                            </li>
                                            <li>
                                                <img src="{{asset('frontend/assets/images/featured.png')}}" alt="">
                                                <div class="infotip"><span>It is a long established fact</span></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="name">{{$item->business_name}}</div>
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
                                        @if($item->address)
                                        {{$item->address}}, {{$item->StateData->name}}, {{$item->CityData->name}}
                                        @endif
                                    </div>
                                    <div class="info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M15.0499 5C16.0267 5.19057 16.9243 5.66826 17.628 6.37194C18.3317 7.07561 18.8094 7.97326 18.9999 8.95M15.0499 1C17.0792 1.22544 18.9715 2.13417 20.4162 3.57701C21.8608 5.01984 22.7719 6.91101 22.9999 8.94M21.9999 16.92V19.92C22.0011 20.1985 21.944 20.4742 21.8324 20.7293C21.7209 20.9845 21.5572 21.2136 21.352 21.4019C21.1468 21.5901 20.9045 21.7335 20.6407 21.8227C20.3769 21.9119 20.0973 21.9451 19.8199 21.92C16.7428 21.5856 13.7869 20.5341 11.1899 18.85C8.77376 17.3147 6.72527 15.2662 5.18993 12.85C3.49991 10.2412 2.44818 7.27099 2.11993 4.18C2.09494 3.90347 2.12781 3.62476 2.21643 3.36162C2.30506 3.09849 2.4475 2.85669 2.6347 2.65162C2.82189 2.44655 3.04974 2.28271 3.30372 2.17052C3.55771 2.05833 3.83227 2.00026 4.10993 2H7.10993C7.59524 1.99522 8.06572 2.16708 8.43369 2.48353C8.80166 2.79999 9.04201 3.23945 9.10993 3.72C9.23656 4.68007 9.47138 5.62273 9.80993 6.53C9.94448 6.88792 9.9736 7.27691 9.89384 7.65088C9.81408 8.02485 9.6288 8.36811 9.35993 8.64L8.08993 9.91C9.51349 12.4135 11.5864 14.4864 14.0899 15.91L15.3599 14.64C15.6318 14.3711 15.9751 14.1858 16.3491 14.1061C16.723 14.0263 17.112 14.0555 17.4699 14.19C18.3772 14.5286 19.3199 14.7634 20.2799 14.89C20.7657 14.9585 21.2093 15.2032 21.5265 15.5775C21.8436 15.9518 22.0121 16.4296 21.9999 16.92Z" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        @php
                                        $mobile = $item->mobile?$item->mobile:"xxx";
                                        $maskedNumber = substr_replace($mobile, 'xxxxxxxx', 0, -3);
                                        @endphp
                                        +91-{{$maskedNumber}}
                                    </div>
                                    
                                    <div class="cta">
                                        @if(Auth::guard('web')->check())
                                            <button type="button" class="btn btn-cta btn-animated" data-bs-toggle="modal" data-bs-target="#sendToWatchlistModal{{$item->id}}">Send to Watchlist</button>
                                        <div class="modal fade send-to-modal" id="sendToWatchlistModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-sm-6 col-12">
                                                                    <label for="sendWatchlist" class="modal-custom-radio">
                                                                        <input type="radio" name="sendwatchlist" id="sendWatchlist{{$item->id}}" value="sendwatchlist" checked>
                                                                        <span class="checkmark">
                                                                            <span class="checkedmark"></span>
                                                                        </span>
                                                                        <div class="radio-text">
                                                                            <label for="sendWatchlist{{$item->id}}">Send to Watchlist</label>
                                                                            <span>The shortlisted businesses are showcased here</span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6 col-12">
                                                                    <label for="sendWatchlistGroup" class="modal-custom-radio">
                                                                        <input type="radio" name="sendwatchlist" id="sendWatchlistGroup{{$item->id}}" value="sendwatchlistgroup">
                                                                        <span class="checkmark">
                                                                            <span class="checkedmark"></span>
                                                                        </span>
                                                                        <div class="radio-text">
                                                                            <label for="sendWatchlistGroup{{$item->id}}">Send to Watchlist Groups</label>
                                                                            <span>The shortlisted businesses are sent into different groups here</span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div id="watchlistoptions">
                                                                <h5>Select Groups</h5>
                                                                <form id="group_watchlist_div" action="{{ route('user.group.watchlist.store') }}" method="POST">
                                                                    @csrf
                                                                <div class="dropdown watchlistgroups">
                                                                    <select class="btn btn-secondary dropdown-toggle" name="group_id">
                                                                        {{-- <option selected hidden> Select </option> --}}
                                                                        @foreach($groupWatchList as $gropu_item)
                                                                            <option value="{{ $gropu_item->id }}"> {{ $gropu_item->group_name }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                    <input type="hidden" name="seller_id" value="{{$item->id}}">
                                                                    <input type="hidden" name="buyer_id" value="{{Auth::guard('web')->check()?Auth::guard('web')->user()->id:""}}">
                                                                    <button type="submit" class="btn btn-animated btn-submit w-100">Submit</button>
                                                                </form>
                                                            </div>
                                                            <div id="single_watchlist_div">
                                                                <form action="{{route('user.watchlist.store')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="seller_id" value="{{$item->id}}">
                                                                    <input type="hidden" name="buyer_id" value="{{Auth::guard('web')->check()?Auth::guard('web')->user()->id:""}}">
                                                                    <button type="submit" class="btn btn-animated btn-submit w-100">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <a class="btn btn-cta btn-animated" href="{{ route('login') }}">send to watchlist</a>
                                        @endif
                                        {{-- @php
                                             $business_name_slug = Str::slug($item->business_name, '-');
                                        @endphp --}}
                                        <a href="{{route('user.profile.fetch', [$old_location,$item->slug_business_name])}}" class="btn btn-cta btn-normal">View Profile</a>
                                    </div>
                                    <div class="cta logged-cta">
                                        @if(Auth::guard('web')->check())
                                            <button type="button" class="btn btn-cta btn-animated btn-yellow">Previously Worked</button>
                                            <button type="button" class="btn btn-cta btn-animated" data-bs-toggle="modal" data-bs-target="#sendToInquiryModal{{$item->id}}">Send to Inquiry</button>

                                            <div class="modal fade send-to-modal" id="sendToInquiryModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    
                                                                    <input type="hidden" name="seller" value="{{Crypt::encrypt($item->id)}}">
                                                                    <button type="submit" class="btn btn-animated btn-submit w-100">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div> 
                            {{-- dynamic Report modal call --}}
                            <div class="modal fade send-to-modal"  id="sendToWatchlistModalReport{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                
                                                <div>
                                                    <form action="{{ route('user.report.store') }}" method="POST">
                                                        @csrf
                                                        <label for="report messege">&nbsp;Report Messege</label><br>
                                                        <textarea class="form-control" name="report_message" rows="4" cols="30"></textarea>
                                                        @error('report_message')<span class="text-danger">{{ $message }}</span>@enderror
                                                        <input type="hidden" name="seller_id" value="{{$item->id}}">
                                                        <input type="hidden" name="user_id" value="{{Auth::guard('web')->check()?Auth::guard('web')->user()->id:""}}">
                                                        <button type="submit" class="btn btn-animated btn-submit w-100">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @if ($errors->any())
                            <script>
                                $(document).ready(function(){
                                    $('#sendToWatchlistModalReport{{$item->id}}').modal('show');
                                });
                            </script>
                            @endif
                       
                            @endforeach
                        </div>             

                    <div class="col-lg-4 col-12 right-col">
                        <div class="right-content-box">
                            <h3>Top Caregories</h3>
                            <ul class="category-list">
                                @if(count($categories)>0)
                                    @foreach ($categories as $item)
                                    @php
                                        $cat_keyword = Str::slug($item, '-');
                                    @endphp
                                        @if(strtolower($item)!=$keyword)
                                            <li><a href="{{route('user.global.filter', [$old_location,$cat_keyword])}}">{{$item}} </a></li>
                                        @endif
                                    @endforeach
                                @endif

                            </ul>
                            <a href="#" class="find-more color-red">
                                Find More
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M4.1665 10H15.8332" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 4.16699L15.8333 10.0003L10 15.8337" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    <div class="container mt-4">
        <div class="alert alert-danger" role="alert">
            No data available.
        </div>
    </div>
    @endif
        
    </div>
</div>
@endsection
@section('script')
@endsection
