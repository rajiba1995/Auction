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
                                        <h5 class="text-light">My Transaction History</h5>
                                        <a href="{{route('user.settings')}}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i>                                              
                                        Back
                                        </a>
                                    </div>
                                    <div class="content-box">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Unique Number</th>          
                                                    <th>Mode</th>
                                                    <th>Purpose</th>
                                                    <th>Price</th>
                                                    <th>Transaction Id</th>
                                                    <th>Transaction Source</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody class="align-middle">
                                                @forelse ($transactions as $key =>$item)
                                                <tr>
                                                    <td> {{ $key+1 }}</td>
                                                    <td> {{ $item->unique_id }}</td>
                                                    <td> {{ $item->transaction_type == 1?'Online':'Offline'}}</td>
                                                    <td> {{ $item->purpose }}</td>
                                                    <td> {{ $item->amount }}</td>
                                                    <td> {{ $item->transaction_id??"NULL" }}</td>
                                                    <td> {{ $item->transaction_source }}</td>
                                                    <td> {{ $item->created_at->format('d-M-Y') }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="100%" class="text-center">No transaction records found</td>
                                                </tr>
                                                @endforelse
                                        
                                            </tbody>
                                        </table>
                                        {{$transactions->appends($_GET)->links()}}
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