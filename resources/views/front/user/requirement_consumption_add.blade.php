@extends('front.layout.app')
@section('section')
<style>
    .others_doc{
        margin: 6px;
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
                                        <a href="{{route('user.profile')}}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i>                                              
                                            Back
                                         </a>
                                    </div>
                                    @if (session('error'))
                                    <div class="alert alert-danger" id="message_div">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <div class="content-box">
                                        <div class="inner"> 
                                             <p>NEW ADD<strong>->YOUR REQUIREMENTS &amp; CONSUMPTIONS</strong> </p>
                                            <form action="{{route('user.requirements_and_consumption.store')}}" class="input-form" method="POST">
                                                @csrf
                                                <div class="row input-row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="" class="modal-custom-radio">
                                                                <input type="radio" name="consumption" id="daily" value="daily" checked>
                                                                <span class="checkmark">
                                                                    <span class="checkedmark"></span>
                                                                </span>
                                                                <div class="radio-text">
                                                                    <label for="daily">Daily Consumption</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label for="" class="modal-custom-radio">
                                                                <input type="radio" name="consumption" id="yearly" value="yearly">
                                                                <span class="checkmark">
                                                                    <span class="checkedmark"></span>
                                                                </span>
                                                                <div class="radio-text">
                                                                    <label for="yearly">Yearly Consumption</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="req-con-inputs show">
                                                    <div class="row input-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Product / Service Name*</label>
                                                                <input type="text" class="form-control border-red" name="product_name" value="{{old('product_name')}}">
                                                                @error('product_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="" class="modal-custom-radio">
                                                            <input type="checkbox" class="others_doc" name="others_doc" id="others_doc" value="others_doc" onchange="toggleDiv(this)" @if ($errors->has('other_sub_category') || $errors->has('other_category'))
                                                            checked
                                                        @endif>
                                                            <div class="radio-text">
                                                                <label for="others_doc">Others Category & Sub Category</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div id="main_category_div" style="@if ($errors->has('other_sub_category') || $errors->has('other_category'))
                                                        display:none;
                                                     @endif">
                                                        <div class="row input-row">
                                                            <div class="col-lg-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Select Category*</label>
                                                                    <select class="form-control border-red" name="category" id="category">
                                                                        <option value="" selected hidden>Select</option>
                                                                        @foreach ($AllCollection as $item)
                                                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('category')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Select Sub Category*</label>
                                                                    <select class="form-control border-red" name="sub_category" id="sub_cat">
                                                                        <option value="" selected disabled>Select</option>
                                                                    </select>
                                                                    @error('sub_category')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="others_doc_div" style="display:none; @if ($errors->has('other_sub_category') || $errors->has('other_category'))
                                                        display:block;
                                                        @endif">
                                                        <div class="row input-row">
                                                            <div class="col-lg-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Select Category*</label>
                                                                    <input type="text" class="form-control border-red" name="other_category" value="{{old('other_category')}}">
                                                                    @error('other_category')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Select Sub Category*</label>
                                                                    <input type="text" class="form-control border-red" name="other_sub_category" value="{{old('other_sub_category')}}">
                                                                    @error('other_sub_category')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                                </div>
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
@endsection
@section('script')
<script>
    function toggleDiv(radio) {
        if (radio.checked) {
            document.getElementById("main_category_div").style.display = "none";
            document.getElementById("others_doc_div").style.display = "block";
        } else {
            document.getElementById("main_category_div").style.display = "block";
            document.getElementById("others_doc_div").style.display = "none";
        }
    }
    $(document).ready(function() {
        $('#category').change(function(){
            var selectedCategory = $(this).val();
            // Perform an AJAX request to fetch sub-categories based on the selected category
            $.ajax({
                url: "{{route('user.collection_wise_category')}}", // Replace this with your actual route
                type: 'GET',
                data: {category: selectedCategory},
                success: function(response) {
                    if(response.status==200){
                        // Clear existing options before appending new ones
                        $('#sub_cat').empty();
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
                            $('#sub_cat').append(option);
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