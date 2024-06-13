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
                                        <h5 class="text-light">My Buyer Wallet History</h5>
                                        <a href="{{route('user.wallet_management')}}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i>                                              
                                        Back
                                        </a>
                                    </div>
                                    <div class="content-box">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>SL.</th>        
                                                    <th>Inquiry Id</th>        
                                                    <th>Credit Unit</th>
                                                    <th>Debit Unit</th>                                               
                                                    <th>Current Unit</th>
                                                    <th>Purpose</th>        
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody class="align-middle">
                                                @forelse ($buyer_wallet_transactions as $key =>$item)
                                                <tr>
                                                    <td> {{ $key+1 }}</td>
                                                    <td> {{ $item->inquiry_id?$item->inquiry_id:"" }}</td>
                                                    <td>{{ number_format($item->credit_unit, 2) }}</td>
                                                    <td>{{ number_format($item->debit_unit, 2) }}</td>
                                                    <td>{{ number_format($item->current_unit, 2) }}</td>
                                                    <td> {{ $item->purpose }}</td>
                                                    <td> {{ $item->created_at->format('d-M-Y h:i A') }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="100%" class="text-center">No records found</td>
                                                </tr>
                                                @endforelse
                                        
                                            </tbody>
                                        </table>
                                        {{$buyer_wallet_transactions->appends($_GET)->links()}}
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