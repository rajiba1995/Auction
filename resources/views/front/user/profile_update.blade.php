@extends('front.layout.app')
@section('section')
<div class="main">
    <div class="inner-page">
@php
     $prodserv = session('prodserv');
     $prodserv = $prodserv?$prodserv:"productdetails";
@endphp
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
                                <div class="tab-pane {{ (request()->is('my/profile*')) ? 'active' : '' }}" id="productsServices" role="tabpanel" aria-labelledby="productsServices-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar">
                                            <a href="{{route('user.profile')}}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i>                                              
                                               Back
                                            </a>
                                        </div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <p>UPDATE<strong>->FILL YOUR BASIC INFORMATIONS</strong> </p>
                                                <form action="{{route('user.profile.update')}}" class="input-form" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row input-row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">First Name*</label>
                                                                <input type="text" class="form-control border-red" name="first_name" value="{{$data->first_name}}">
                                                                @error('first_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Last Name*</label>
                                                                <input type="text" class="form-control border-red" name="last_name" value="{{$data->last_name}}">
                                                                @error('first_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-5 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Profile Image*</label>
                                                                <div class="profile-image-upload-box border-red">
                                                                    <div class="profile-img-box">
                                                                        <img src="{{$data->image?asset($data->image):asset('frontend/assets/images/person-2.png')}}" alt="">
                                                                    </div>
                                                                    <div class="cta-box">
                                                                        <label for="profileImgUpload" class="custom-upload">
                                                                            <input type="file" name="profile_image" id="profileImgUpload">
                                                                            <span class="btn btn-animated">Upload Image</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                @error('profile_image')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Short Bio</label>
                                                                <textarea class="form-control border-red short-bio" name="short_bio">{{ old('short_bio',$data->short_bio)  }}</textarea>
                                                                @error('short_bio')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Name of your business*</label>
                                                                <input type="text" class="form-control border-red" name="business_name" value="{{$data->business_name}}">
                                                                @error('business_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Address*</label>
                                                                <textarea class="form-control border-red address" name="address">{{ old('address', $data->address) }}</textarea>
                                                                @error('address')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">State*</label>
                                                                <select class="form-control border-red" id="inputState" name="state">
                                                                    <option value="" selected hidden>--Select State--</option>
                                                                   @foreach ( $states as $key => $item )
                                                                       <option value="{{$item->id}}" {{old('state',$data->state) == $item->id?"selected":""}}>{{ $item->name }}</option>
                                                                   @endforeach
                                                                  </select>
                                                                  @error('state')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">City*</label>
                                                                <select class="form-control all-cities" id="inputDistrict" name="city">
                                                                    <option value="">-- select city -- </option>
                                                                    @foreach ( $cities as $key => $item )
                                                                        <option value="{{$item->id}}" {{old('city',$data->city) == $item->id?"selected":""}}>{{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('city')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Pincode*</label>
                                                                <input type="number" class="form-control border-red" name="pincode" value="{{ old('pincode',$data->pincode) }}">
                                                                @error('pincode')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Email Id*</label>
                                                                <input type="email" class="form-control border-red" name="email" value="{{ old('email',$data->email) }}">
                                                                @error('email')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Phone Number*</label>
                                                                <input type="phone" class="form-control border-red" name="phone_number" value="{{ old('phone_number',$data->mobile) }}">
                                                                @error('phone_number')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Business Type</label>
                                                                <select class="form-control border-red" name="business_type">
                                                                    <option selected disabled>Select Business</option>
                                                                    @foreach ( $business_data as $item )
                                                                    <option value="{{ $item->name }}" {{ old('business_type',$data->business_type) == $item->name?"selected":""}}>{{ $item->name }}</option>
                                                                @endforeach
                                                                </select>
                                                                @error('business_type')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Total no, of Employee</label>
                                                                <input type="text" class="form-control border-red" name="employee" value="{{ old('employee',$data->employee) }}">
                                                                @error('employee')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row input-row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Year of Establishment</label>
                                                                <input type="text" class="form-control border-red" name="Establishment_year" value="{{ old('Establishment_year',$data->Establishment_year) }}">
                                                                @error('Establishment_year')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Legal Status of Firm</label>
                                                                <select class="form-control border-red" name="legal_status">
                                                                    <option selected hidden>Select Legal Status</option>
                                                                    @foreach ( $legal_status_data as $item )
                                                                    <option value="{{ $item->name }}" {{ old('legal_status', $data->legal_status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                                @endforeach
                                                                </select>
                                                                @error('legal_status')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <div class="form-submit-row">
                                                        <button type="submit" class="btn btn-animated btn-submit">Submit</button>
                                                    </div>
                                                </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('select[name="state"]').change(function(){
        var selectedState = $(this).val();
        // Perform an AJAX request to fetch sub-categories based on the selected category
        $.ajax({
            url: "{{route('user.state_wise_city')}}", // Replace this with your actual route
            type: 'GET',
            data: {state: selectedState},
            success: function(response) {
                if(response.status==200){
                    // Clear existing options before appending new ones
                    $('select[name="city"]').empty();
                    var isFirst = true;

                    // Append new options based on the response data
                    response.data.forEach(function(element) {
                        var option = '<option value="' + element.id + '">' + element.name + '</option>';
                        
                        // Check the first option
                        if (isFirst) {
                            option = '<option value="' + element.id + '" selected>' + element.name + '</option>';
                            isFirst = false; // Reset the flag after the first iteration
                        }

                        // Append the option to the select element
                        $('select[name="city"]').append(option);
                    });
                }
                
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Handle errors if any
            }
        });
    });
    });


    $(document).ready(function () {
  $(".all-cities").select2();
});
</script>
@endsection