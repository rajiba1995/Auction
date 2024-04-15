@extends('front.layout.app')
@section('section')
<div class="main">
    <div class="inner-page">

        <div class="profile-page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @include('front.user.layout.sidebar')
                    <div class="col-xxl-9 col-xl-8 col-12 profile-right">
                        <div class="sidebar-toggler">
                            <span class="sidebar-opener" id="sidebarOpener">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M385.1 219.9 199.2 34c-20-20-52.3-20-72.3 0s-20 52.3 0 72.3L276.7 256 126.9 405.7c-20 20-20 52.3 0 72.3s52.3 20 72.3 0l185.9-185.9c19.9-19.9 19.9-52.3 0-72.2z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
                            </span>
                        </div>
                        <div class="tab-panes-wrapper">
                            <div class="tab-content">
                                <div class="tab-content-wrapper">
                                    <div class="top-content-bar">
                                        @if (Auth::guard('web')->check() && Auth::guard('web')->user()->id==$data->id)
                                        <a href="{{ route('user.photos_and_documents_edit') }}" class="btn btn-normal btn-cta">Upload Photos and Documents</a>
                                        @endif
                                    </div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <h3>Photos</h3>
                                            <div class="photos">
                                                @foreach($AllImages as $key =>$item)
                                                <div class="photo-box"><img src="{{asset($item->image)}}" alt=""></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if (Auth::guard('web')->check() && Auth::guard('web')->user()->id==$data->id)
                                    <div class="content-box">
                                        <div class="inner">
                                            <h3>Documents</h3>
                                            <div class="docs">
                                                <!-- <div class="container-fluid"> -->
                                                    <div class="row">
                                                        @if($user_document && $user_document->gst_file)
                                                        <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                            <div class="inner-wrap">
                                                                <div class="left-col">
                                                                    <div class="img-box">
                                                                        <img src="{{asset('frontend/assets/images/tax.png')}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="right-col">
                                                                    <label>
                                                                        GSTIN
                                                                        <span>
                                                                            @if($user_document->gst_status==2)
                                                                                <img src="{{asset('frontend/assets/images/failed.png')}}" alt="">
                                                                            @elseif($user_document->gst_status==1)
                                                                                <img src="{{asset('frontend/assets/images/authorized.png')}}" alt=""></span>
                                                                            @else
                                                                             
                                                                            @endif
                                                                    </label>
                                                                    <p>{{$user_document->gst_number}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if($user_document && $user_document->pan_file)
                                                            <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                                <div class="inner-wrap">
                                                                    <div class="left-col">
                                                                        <div class="img-box">
                                                                            <img src="{{asset('frontend/assets/images/pancard.png')}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-col">
                                                                        <label>
                                                                            Pan Card
                                                                            <span>
                                                                                @if($user_document->pan_status==2)
                                                                                    <img src="{{asset('frontend/assets/images/failed.png')}}" alt="">
                                                                                @elseif($user_document->pan_status==1)
                                                                                    <img src="{{asset('frontend/assets/images/authorized.png')}}" alt="">
                                                                                @else
                                                                                 
                                                                                @endif
                                                                            </span>
                                                                        </label>
                                                                        <p>{{$user_document->pan_number}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if($user_document && $user_document->adhar_file)
                                                        <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                            <div class="inner-wrap">
                                                                <div class="left-col">
                                                                    <div class="img-box">
                                                                        <img src="{{asset('frontend/assets/images/card.png')}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="right-col">
                                                                    <label>
                                                                        Adhar Card
                                                                        <span>
                                                                            @if($user_document->adhar_status==2)
                                                                                <img src="{{asset('frontend/assets/images/failed.png')}}" alt="">
                                                                            @elseif($user_document->adhar_status==1)
                                                                                <img src="{{asset('frontend/assets/images/authorized.png')}}" alt="">
                                                                            @else
                                                                             
                                                                            @endif
                                                                        </span>
                                                                    </label>
                                                                    <p>{{$user_document->adhar_number}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if($user_document && $user_document->trade_license_file)
                                                        <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                            <div class="inner-wrap">
                                                                <div class="left-col">
                                                                    <div class="img-box">
                                                                        <img src="{{asset('frontend/assets/images/card.png')}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="right-col">
                                                                    <label>
                                                                        Trading License
                                                                        <span>
                                                                            @if($user_document->trade_license_status==2)
                                                                                <img src="{{asset('frontend/assets/images/failed.png')}}" alt="">
                                                                            @elseif($user_document->trade_license_status==1)
                                                                                <img src="{{asset('frontend/assets/images/authorized.png')}}" alt="">
                                                                            @else
                                                                             
                                                                            @endif
                                                                        </span>
                                                                    </label>
                                                                    <p>{{$user_document->trade_license_number}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if($user_document && $user_document->cancelled_cheque_file)
                                                        <div class="col-xxl-4 col-md-6 col-12 doc-box">
                                                            <div class="inner-wrap">
                                                                <div class="left-col">
                                                                    <div class="img-box">
                                                                        <img src="{{asset('frontend/assets/images/card.png')}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="right-col">
                                                                    <label>
                                                                        Cheque
                                                                        <span>
                                                                            @if($user_document->cancelled_cheque_status==2)
                                                                                <img src="{{asset('frontend/assets/images/failed.png')}}" alt="">
                                                                            @elseif($user_document->cancelled_cheque_status==1)
                                                                                <img src="{{asset('frontend/assets/images/authorized.png')}}" alt="">
                                                                            @else
                                                                             
                                                                            @endif
                                                                        </span>
                                                                    </label>
                                                                    <p>Account Number: {{$user_document->account_number}}</p>
                                                                    <p>IFSC Code: {{$user_document->ifsc_code}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('script')
@endsection