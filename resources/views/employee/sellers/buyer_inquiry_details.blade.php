@extends('employee.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<style>
    .user-images {
        display: flex;
        flex-wrap: wrap;
        list-style-type: none;
        padding: 20px 0;
        margin: 0 -4px;
    }
    .user-images li {
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc((100% - 40px) / 5);
        height: 140px;
        overflow: hidden;
        border-radius: 6px;
        margin: 0 4px 8px;
    }
    .user-images li img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    @media only screen and (max-width: 1599px) {
        .user-images li {
            height: 120px;
        }
    }
    @media only screen and (max-width: 1399px) {
        .user-images li {
            height: 100px;
        }
    }
    @media only screen and (max-width: 1299px) {
        .user-images li {
            height: 80px;
        }
    }
    @media only screen and (max-width: 1199px) {
        .user-images li {
            height: 100px;
        }
    }
    @media only screen and (max-width: 991px) {
        .user-images li {
            height: 140px;
        }
    }
    @media only screen and (max-width: 799px) {
        .user-images li {
            height: 120px;
        }
    }
    @media only screen and (max-width: 699px) {
        .user-images li {
            height: 100px;
        }
    }
    @media only screen and (max-width: 575px) {
        .user-images li {
            height: 80px;
        }
    }
    @media only screen and (max-width: 499px) {
        .user-images li {
            width: calc((100% - 32px) / 4);
        }
    }
    @media only screen and (max-width: 399px) {
        .user-images li {
            width: calc((100% - 24px) / 3);
        }
    }
    @media only screen and (max-width: 359px) {
        .user-images li {
            height: 70px;
        }
    }
</style>
    <div class="inner-content">
        <div class="report-table-box">
            <div class="col-12">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right d-flex justify-content-between">
                                <a href="{{route('show.user.buyer.activity',$userId)}}" class="btn btn-primary btn-sm">
                                    <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                                    Back 
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="container-fluid">
                            <p><strong>Inquiry Details</strong></p>
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Inquiry ID:</label>
                                    <p><strong>{{$data->inquiry_id}}</strong></p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Buyer Name:</label>
                                    <p><strong>{{$data->BuyerData->name}}</strong></p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Seller Name:</label>
                                    <p><strong>{{isset($data->SellerData->name)?$data->SellerData->name:"Not-Allot"}}</strong></p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Final Quote Amout:</label>
                                    <p><strong>{{number_format($data->inquiry_amount,2, '.', ',')}}</strong></p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Inquiry Type:</label>
                                    <p>{{$data->inquiry_type}}</p>
                                </div>                             
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Title:</label>
                                    <p>{{$data->title}}</p>
                                </div>                             
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Category Name:</label>
                                    <p>{{$data->category}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Sub-Category Name:</label>
                                    <p>{{$data->sub_category}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Participants Number:</label>
                                    <p>{{$data->quotes_per_participants}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Location:</label>
                                    <p>{{$data->location}}</p>
                                </div>
                                   <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Maximun Quote Amount:</label>
                                    <p>{{number_format($data->maximum_quote_amount,2, '.', ',')}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Maximum Quote Amount:</label>
                                    <p>{{number_format($data->minimum_quote_amount,2, '.', ',')}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Start Date & Time:</label>
                                    <p>{{ date('d M, Y', strtotime($data->start_date)) }} {{ date('g:i A', strtotime($data->start_time)) }}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>End Data & Time:</label>
                                    <p>{{ date('d M, Y', strtotime($data->end_date)) }} {{ date('g:i A', strtotime($data->end_time)) }}</p>
                                </div>
                                <div class="col-12">
                                    <label>Description:</label>
                                    <p>{{ $data->description }}</p>
                                </div>
                         
                            </div>
                           
                        
                    </div>
         

            </div>
        </div>
    </div>
@endsection
@section('script')