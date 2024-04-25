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
                                    <div class="top-content-bar"></div>
                                    <div class="content-box">
                                        <div class="inner">
                                            <div class="settings-cta-box">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5>Account Settings</h5>
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>Change Password</span>
                                                                <img src="{{asset('frontend/assets/images/angle-right.png')}}" alt="">
                                                            </a>
                                                            
                                                        </div>
                                                        <div class="cta-row">
                                                            <a href="{{ route('user.transaction')}}">
                                                                <span>Transation Report</span>
                                                                <img src="{{asset('frontend/assets/images/angle-right.png')}}" alt="">
                                                            </a>               
                                                        </div>
                                                        
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>Notifications</span>
                                                                <label for="notifyCheck" class="toggler-custom-checkbox">
                                                                    <input type="checkbox" id="notifyCheck">
                                                                    <span class="toggler"></span>
                                                                </label>
                                                            </a>
                                                        </div>
                                                        <div class="cta-row">
                                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                <span>Logout</span>
                                                                <img src="{{asset('frontend/assets/images/log-out-blue.png')}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="settings-cta-box">
                                                        <h5>More</h5>
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>About us</span>
                                                                <img src="assets/images/angle-right.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>Privacy policy</span>
                                                                <img src="assets/images/angle-right.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>Terms and conditions</span>
                                                                <img src="assets/images/angle-right.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col">
                                                        <h5>Wallet Section</h5>
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>Current Package</span>
                                                                @if($package)
                                                                    @if($package->getPackageDetails)
                                                                 <h5>{{$package->getPackageDetails->package_name}}</h5> 
                                                                    @endif
                                                                 @else
                                                                 <h5>No Package Availabe Yet!</h5>   
                                                                @endif
                                                            </a>       
                                                        </div>
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>Expiry Date</span>
                                                                @if($package)
                                                                <h5>{{ date('d M, Y H:i:s A', strtotime($package->expiry_date)) }}</h5>
                                                                 @else
                                                                 <h5>###</h5>   
                                                                @endif
                                                            </a>       
                                                        </div>
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>Available Balance</span>
                                                                @if($walletBalance)
                                                                 
                                                                <h5>&#8377; {{$walletBalance->current_amount}}</h5>
                                                                  
                                                                @else
                                                                <h5>0.00</h5>   
                                                               @endif
                                                            </a>
                                                        </div>
                                                        <div class="cta-row">
                                                            <a href="#">
                                                                <span>Wallet History</span>
                                                                <img src="{{asset('frontend/assets/images/angle-right.png')}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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