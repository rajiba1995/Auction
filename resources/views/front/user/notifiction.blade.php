@extends('front.layout.app')
@section('section')
<style>
.total-row {
    background-color: #c8e9f5 !important;/* Blue background color */
}
</style>
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
                                        <h5 class="text-light">Notifications</h5>
                                        <a href="{{route('user.settings')}}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i>                                              
                                        Back
                                        </a>
                                    </div>

                                    <div class="content-box">
                                        <div class="container">
                                            <div class="all_notification">
                                                @if($notification)
                                                    @foreach($notification as $data)
                                                    <a href="{{$data->link}}">
                                                        <div class="notified">
                                                            <div class="notification_main">
                                                                <div class="notification-icon">
                                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M22.5 10C22.5 8.01088 21.7098 6.10322 20.3033 4.6967C18.8968 3.29018 16.9891 2.5 15 2.5C13.0109 2.5 11.1032 3.29018 9.6967 4.6967C8.29018 6.10322 7.5 8.01088 7.5 10C7.5 18.75 3.75 21.25 3.75 21.25H26.25C26.25 21.25 22.5 18.75 22.5 10Z"
                                                                            stroke="" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path
                                                                            d="M17.1629 26.25C16.9431 26.6288 16.6277 26.9433 16.2482 27.1619C15.8687 27.3805 15.4384 27.4956 15.0004 27.4956C14.5624 27.4956 14.1321 27.3805 13.7526 27.1619C13.3731 26.9433 13.0577 26.6288 12.8379 26.25"
                                                                            stroke="" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                                <div class="notification-content">
                                                                    <h4 class="notification-title">{{$data->title}}</h4>
                                                                        @if($data->description)
                                                                        <p class="notification-message">{{$data->description}}</p>
                                                                        @endif
                                                                    <span class="notified_time">{{date('h:i A' ,strtotime($data->created_at))}}</span><span class="notified_time notified_date ms-2">{{date('d-M-Y' ,strtotime($data->created_at))}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                @else
                                                <div class="notified">
                                                        <div class="notification-content">
                                                            <h4 class="notification-title">No Notification</h4>
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
        </div>
        
    </div>
</div>
@endsection
@section('script')
<script>
    // Set the max attribute of the end date input to today's date
    document.getElementById('end_date').setAttribute('max', new Date().toISOString().split('T')[0]);
</script>
@endsection