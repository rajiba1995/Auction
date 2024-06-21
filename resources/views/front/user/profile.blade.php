@extends('front.layout.app')
@section('location', $location)
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
                                <div class="tab-pane active basic-info-tab-pane " id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar">
                                            @if (Auth::guard('web')->check() && Auth::guard('web')->user()->id==$data->id)
                                            <a href="{{route('user.profile.edit')}}" class="btn btn-normal btn-cta">Edit Basic Information</a>
                                            @endif
                                        </div>
                                        <div class="m-2">
                                            {{-- @if (session('success'))
                                                <div class="alert alert-success" id="message_div">
                                                    {{ session('success') }}
                                                </div>
                                            @endif --}}
                                        </div>
                                        <div class="content-box">
                                            <!-- <div class="basic-info-banner">
                                                <img src="{{asset('frontend/assets/images/basic-info-banner.png')}}" alt="">
                                            </div> -->
                                            <div class="basic-info-desc">
                                                <div class="top-info-row">
                                                    <div class="person-img">
                                                        <img src="{{$data->image?asset($data->image):asset('frontend/assets/images/person.png')}}" alt="User">
                                                    </div>
                                                    <div class="person-info">
                                                        <h2>{{$data->name}}</h2>
                                                        <h6>{{$data->business_name}}</h6>
                                                        <div class="about-place">
                                                            <h3>About Me</h3>
                                                            <p class="person-desc">{{Str::limit($data->short_bio, 1000)}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <h3>About Me</h3>
                                                <p class="person-desc">{{Str::limit($data->short_bio, 1000)}}</p> -->
                                            </div>
                                        </div>
                                        <div class="content-box">
                                            <div class="other-info-box">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Name of the Business: </label>
                                                            <p>{{$data->business_name}}</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Address:</label>
                                                            <p>{{$data->address}}</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Pin Code:</label>
                                                            <p>{{$data->pincode}}</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Nature of Business(type):</label>
                                                            <p>{{$data->business_type}}</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Email:</label>
                                                            <p>{{$data->email}}</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Phone Number:</label>
                                                            <p>+91 {{$data->mobile}}</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Number of Employee:</label>
                                                            <p>{{$data->employee}}</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Year of Establishment:</label>
                                                            <p>{{$data->Establishment_year}}</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-12 info-box">
                                                            <label>Legal Status of Firm:</label>
                                                            <p>{{$data->legal_status}}</p>
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