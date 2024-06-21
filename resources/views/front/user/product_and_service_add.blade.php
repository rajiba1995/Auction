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
                                <div class="tab-pane {{ (request()->is('my/product-and-service*')) ? 'active' : '' }}" id="productsServices" role="tabpanel" aria-labelledby="productsServices-tab" tabindex="0">
                                    <div class="tab-content-wrapper">
                                        <div class="top-content-bar">
                                            <a href="{{route('user.product_and_service')}}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i>                                              
                                               Back
                                            </a>
                                        </div>
                                        <div class="content-box">
                                            <div class="inner">
                                                <h2>UPLOAD YOUR PRODUCTS &amp; SERVICES INFORMATIONS</h2>
                                                <form action="{{route('user.product_and_service.store')}}" class="input-form" enctype="multipart/form-data" id="ProductServiceForm" method="POST">
                                                    @csrf
                                                    <div class="row input-row">
                                                        <div class="col-lg-4 col-6">
                                                            <div class="form-group">
                                                                <label for="productdetails" class="modal-custom-radio">
                                                                    <input type="radio" name="prodserv" id="productdetails" value="productdetails" onchange="toggleDiv(this)"  checked {{$prodserv=="productdetails"?"checked":""}}>
                                                                    <span class="checkmark">
                                                                        <span class="checkedmark"></span>
                                                                    </span>
                                                                    <div class="radio-text">
                                                                        <label for="productdetails">Product Details</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-6">
                                                            <div class="form-group">
                                                                <label for="servicedetails" class="modal-custom-radio">
                                                                    <input type="radio" name="prodserv" id="servicedetails" value="servicedetails" onchange="toggleDiv(this)" {{$prodserv=="servicedetails"?"checked":""}} >
                                                                    <span class="checkmark">
                                                                        <span class="checkedmark"></span>
                                                                    </span>
                                                                    <div class="radio-text">
                                                                        <label for="servicedetails">Service Details</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="prod-serv-inputs {{$prodserv=="productdetails"?"show":""}}" id="productInputs">
                                                        <div class="row input-row">
                                                            <div class="col-lg-5 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Product Image*</label>
                                                                    <div class="profile-image-upload-box border-red">
                                                                        <div class="profile-img-box">
                                                                            <img src="{{asset('frontend/assets/images/person-2.png')}}" alt="">
                                                                        </div>
                                                                        <div class="cta-box">
                                                                            <label for="profileImgUpload" class="custom-upload">
                                                                                <input type="file" name="product_image" id="profileImgUpload">
                                                                                <span class="btn btn-animated">Upload Product</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    @error('product_image')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Product Name*</label>
                                                                    <input type="text" class="form-control border-red @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}">
                                                                    <!-- Display error message for product_name -->
                                                                    @error('product_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="" class="modal-custom-radio">
                                                                <input type="checkbox" class="others_doc_product" name="others_doc_product" id="others_doc_product" value="others_doc_product" onchange="toggleDivSelectProduct(this)" @if ($errors->has('other_sub_category') || $errors->has('other_category'))
                                                                checked
                                                            @endif>
                                                                <div class="radio-text">
                                                                    <label for="others_doc_product">Others Category & Sub Category</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div id="main_category_div_product" style="@if ($errors->has('other_sub_category') || $errors->has('other_category'))
                                                            display:none;
                                                         @endif">
                                                                <div class="row input-row">
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Select Category*</label>
                                                                            <select class="form-control border-red @error('category') is-invalid @enderror" name="category" id="category">
                                                                                <option value="" selected hidden>Select</option>
                                                                                @foreach ($AllCollection as $item)
                                                                                    <option value="{{$item->id}}">{{ucwords($item->title)}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <!-- Display error message for category -->
                                                                            @error('category')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Select Sub Category*</label>
                                                                            <select class="form-control border-red @error('sub_category') is-invalid @enderror" name="sub_category">
                                                                                <option value="" selected hidden>Select</option>
                                                                            </select>
                                                                            <!-- Display error message for sub_category -->
                                                                            @error('sub_category')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div id="others_doc_div_product" style="display:none; @if ($errors->has('other_sub_category') || $errors->has('other_category'))
                                                            display:block;
                                                            @endif">
                                                            <div class="row input-row">
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Select Category*</label>
                                                                        <input type="text" class="form-control border-red" name="other_category_product" value="{{old('other_category_product')}}">
                                                                        @error('other_category_product')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Select Sub Category*</label>
                                                                        <input type="text" class="form-control border-red" name="other_sub_category_product" value="{{old('other_sub_category_product')}}">
                                                                        @error('other_sub_category_product')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            
                                                        <div class="row input-row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Describe the Products*</label>
                                                                    <textarea class="form-control border-red describe @error('product_description') is-invalid @enderror" name="product_description">{{ old('product_description') }}</textarea>
                                                                    <!-- Display error message for product_description -->
                                                                    @error('product_description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row input-row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Price Per Unit</label>
                                                                    <input type="text" class="form-control border-red @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                                                                    <!-- Display error message for price -->
                                                                    @error('price')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row input-row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Products Specifications</label>
                                                                    <textarea rows="6" class="form-control border-red specifaction @error('specifications') is-invalid @enderror" name="specifications">{{ old('specifications') }}</textarea>
                                                                    <!-- Display error message for specifications -->
                                                                    @error('specifications')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="prod-serv-inputs {{$prodserv=="servicedetails"?"show":""}}" id="serviceInputs">
                                                        <div class="row input-row">
                                                            <div class="col-lg-5 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Service Image*</label>
                                                                    <div class="profile-image-upload-box border-red">
                                                                        <div class="profile-img-box">
                                                                            <img src="{{asset('frontend/assets/images/person-2.png')}}" alt="">
                                                                        </div>
                                                                        <div class="cta-box">
                                                                            <label for="serviceImgUpload" class="custom-upload">
                                                                                <input type="file" name="service_image" id="serviceImgUpload">
                                                                                <span class="btn btn-animated">Upload Service</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    @error('service_image')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Service Name*</label>
                                                                    <input type="text" class="form-control border-red @error('service_name') is-invalid @enderror" name="service_name" value="{{ old('service_name') }}">
                                                                    <!-- Display error message for service_name -->
                                                                    @error('service_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <label for="" class="modal-custom-radio">
                                                                <input type="checkbox" class="others_doc_service" name="others_doc_service" id="others_doc_service" value="others_doc_service" onchange="toggleDivSelectService(this)" @if ($errors->has('other_sub_category') || $errors->has('other_category'))
                                                                checked
                                                            @endif>
                                                                <div class="radio-text">
                                                                    <label for="others_doc_service">Others Category & Sub Category</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div id="main_category_div_service" style="@if ($errors->has('other_sub_category') || $errors->has('other_category'))
                                                            display:none;
                                                         @endif">
                                                            <div class="row input-row">
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Select Category*</label>
                                                                        <select class="form-control border-red @error('service_category') is-invalid @enderror" name="service_category">
                                                                            <option value="" selected hidden>Select</option>
                                                                            @foreach ($AllCollection as $item)
                                                                                <option value="{{$item->id}}">{{ucwords($item->title)}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <!-- Display error message for service_category -->
                                                                        @error('service_category')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Select Sub Category*</label>
                                                                        <select class="form-control border-red @error('service_sub_category') is-invalid @enderror" name="service_sub_category">
                                                                            <option value="" selected hidden>Select</option>
                                                                        </select>
                                                                        <!-- Display error message for service_sub_category -->
                                                                        @error('service_sub_category')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="others_doc_div_service" style="display:none; @if ($errors->has('other_sub_category_service') || $errors->has('other_category_service'))
                                                            display:block;
                                                            @endif">
                                                            <div class="row input-row">
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Select Category*</label>
                                                                        <input type="text" class="form-control border-red" name="other_category_service" value="{{old('other_category_service')}}">
                                                                        @error('other_category_service')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Select Sub Category*</label>
                                                                        <input type="text" class="form-control border-red" name="other_sub_category_service" value="{{old('other_sub_category_service')}}">
                                                                        @error('other_sub_category_service')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row input-row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Describe the Service*</label>
                                                                    <textarea rows="6" class="form-control border-red @error('service_description') is-invalid @enderror" name="service_description">{{ old('service_description') }}</textarea>
                                                                    <!-- Display error message for service_description -->
                                                                    @error('service_description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row input-row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Price</label>
                                                                    <input type="text" class="form-control border-red @error('service_price') is-invalid @enderror" name="service_price" value="{{ old('service_price') }}">
                                                                    <!-- Display error message for service_price -->
                                                                    @error('service_price')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                                                                         
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
<script>
    function toggleDiv(radio) {
        if (radio.value === "productdetails") {
            document.getElementById("productDetails").style.display = "block";
            document.getElementById("serviceDetails").style.display = "none";
            toggleDivSelectProduct();
        } else if (radio.value === "servicedetails") {
            document.getElementById("productDetails").style.display = "none";
            document.getElementById("serviceDetails").style.display = "block";
            toggleDivSelectService();
        }
    }
    function toggleDivSelectProduct(radio) {
        if (radio.checked) {
            document.getElementById("main_category_div_product").style.display = "none";
            document.getElementById("others_doc_div_product").style.display = "block";
        } else {
            document.getElementById("main_category_div_product").style.display = "block";
            document.getElementById("others_doc_div_product").style.display = "none";
        }
    }
    function toggleDivSelectService(radio) {
        if (radio.checked) {
            document.getElementById("main_category_div_service").style.display = "none";
            document.getElementById("others_doc_div_service").style.display = "block";
        } else {
            document.getElementById("main_category_div_service").style.display = "block";
            document.getElementById("others_doc_div_service").style.display = "none";
        }
    }
   

   $(document).ready(function() {
        $('select[name="category"]').change(function(){
            var selectedCategory = $(this).val();
            // Perform an AJAX request to fetch sub-categories based on the selected category
            $.ajax({
                url: "{{route('user.collection_wise_category')}}", // Replace this with your actual route
                type: 'GET',
                data: {category: selectedCategory},
                success: function(response) {
                    if(response.status==200){
                        // Clear existing options before appending new ones
                        $('select[name="sub_category"]').empty();
                        var isFirst = true;

                        // Append new options based on the response data
                        response.data.forEach(function(element) {
                            var option = '<option value="' + element.id + '">' + element.title + '</option>';
                            
                            // Check the first option
                            if (isFirst) {
                                option = '<option value="' + element.id + '" selected>' + element.title + '</option>';
                                isFirst = false; // Reset the flag after the first iteration
                            }

                            // Append the option to the select element
                            $('select[name="sub_category"]').append(option);
                        });
                    }
                    
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle errors if any
                }
            });
        });
        $('select[name="service_category"]').change(function(){
            var selectedCategory = $(this).val();
            // Perform an AJAX request to fetch sub-categories based on the selected category
            $.ajax({
                url: "{{route('user.collection_wise_category')}}", // Replace this with your actual route
                type: 'GET',
                data: {category: selectedCategory},
                success: function(response) {
                    if(response.status==200){
                        // Clear existing options before appending new ones
                        $('select[name="service_sub_category"]').empty();
                        var isFirst = true;

                        // Append new options based on the response data
                        response.data.forEach(function(element) {
                            var option = '<option value="' + element.id + '">' + element.title + '</option>';
                            
                            // Check the first option
                            if (isFirst) {
                                option = '<option value="' + element.id + '" selected>' + element.title + '</option>';
                                isFirst = false; // Reset the flag after the first iteration
                            }

                            // Append the option to the select element
                            $('select[name="service_sub_category"]').append(option);
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


    </script>
    
@endsection