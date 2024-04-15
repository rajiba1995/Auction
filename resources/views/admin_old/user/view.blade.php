@extends('admin.app')

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
                                <h3>{{$data->name}}'s Details (user)</h3>

                                <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">
                                    <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                                    Back 
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="container-fluid">
                            <p>PERSONAL DETAILS</p>
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>User ID:</label>
                                    <p><strong>{{$data->id}}</strong></p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Name:</label>
                                    <p>{{$data->name}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Business Name:</label>
                                    <p>{{$data->business_name}}</p>
                                </div>                             
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Business Type:</label>
                                    <p>{{$data->business_type}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Email:</label>
                                    <p>{{$data->email}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Mobile:</label>
                                    <p>{{$data->mobile}}</p>
                                </div>
                            
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Address:</label>
                                    <p>{{$data->address}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>City:</label>
                                    <p>{{$data->city}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>State:</label>
                                    <p>{{$data->state}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Pincode:</label>
                                    <p>{{$data->pin}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Number of Employee:</label>
                                    <p>{{$data->employee_number}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Year of Established:</label>
                                    <p>{{$data->establish_year}}</p>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <label>Legal Status:</label>
                                    <p>{{$data->legal_status}}</p>
                                </div>
                            </div>
                            <p>IMAGES</p>
                            <div class="row">
                                @foreach($AllImages as $item)
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <p><img src="{{asset($item->image)}}" alt="No-image" width="100%" class="img-thumbnail" srcset=""></p>
                                </div>
                                @endforeach
                            </div>
                          
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('script')