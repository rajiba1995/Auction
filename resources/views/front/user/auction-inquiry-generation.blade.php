@extends('front.layout.app')
@section('section')
<style>
    .btn-green{
        line-height: 0 !important;
    }
    .message_li{
        list-style-type: none;
    }
</style>
<div class="main">
    <div class="inner-page">

        <section class="auction-requirement-section">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-1 col-12"></div>
                    <div class="col-xxl-10 col-12">
                        <div class="inner">
                            <h2>INQUIRY GENERATION FORM</h2>
                            <form action="{{route('front.auction_inquiry_generation_store')}}" class="auction-requirement-form" method="POST" enctype="multipart/form-data" id="auction_requirement_form">
                                @csrf
                                <input type="hidden" name="inquiry_id" value="{{$existing_inquiry?$existing_inquiry->inquiry_id:""}}">
                                <input type="hidden" name="created_by" value="{{$user->id}}">
                                @if($existing_inquiry)
                                <div class="inquiry-id-row">
                                    <span>Inquiry Id : {{$existing_inquiry->inquiry_id}}</span>
                                </div>
                                @endif
                                <ul>
                                    <li id="message_li"> 
                                        @if (session('success'))
                                            <div class="alert alert-success" id="successAlert">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if (session('warning'))
                                            <div class="alert alert-warning" id="successAlert">
                                                {{ session('warning') }}
                                            </div>
                                        @endif
                                    </li>
                                </ul>
                                <h4 class="color-red text-center">Title</h4>
                                <div class="row input-row">
                                    <div class="offset-lg-3 col-lg-6 col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-red" placeholder="Ex, transport Service" name="title" value="{{$existing_inquiry ? $existing_inquiry->title : old('title')}}">
                                            @error('title')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <h4 class="color-red">Date of Stating Inquiry</h4>
                                <div class="row input-row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Start Date*</label>
                                            <input type="date" class="form-control border-red" name="start_date" value="{{$existing_inquiry ? $existing_inquiry->start_date : old('start_date')}}">
                                            @error('start_date')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">End Date*</label>
                                            <input type="date" class="form-control border-red" name="end_date" value="{{$existing_inquiry ? $existing_inquiry->end_date : old('end_date')}}">
                                            @error('end_date')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <h4 class="color-red">Time of Starting Auction</h4>
                                <div class="row input-row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Start Time*</label>
                                            <input type="time" class="form-control border-red" name="start_time" value="{{$existing_inquiry ? $existing_inquiry->start_time : old('start_time')}}">
                                            @error('start_time')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">End Time*</label>
                                            <input type="time" class="form-control border-red" name="end_time" value="{{$existing_inquiry ? $existing_inquiry->end_time : old('end_time')}}">
                                            @error('end_time')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Select Category*</label>
                                            <select class="form-control border-red" name="category">
                                                <option value="" selected hidden>Ex, transport service, Parlour, etc </option>
                                                @foreach($all_category as $key=>$item)
                                                    <option value="{{ $item->title }}" {{ $existing_inquiry && $existing_inquiry->category == $item->title ? 'selected' : '' }}>{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Select Subcategory*</label>
                                            <select class="form-control border-red" name="sub_category" id="sub_category">
                                                <option value="" selected hidden>Ex, transport service, Parlour, etc </option>
                                                @if($existing_inquiry)
                                                <option value="{{$existing_inquiry->sub_category}}" selected>{{$existing_inquiry->sub_category}}</option>
                                                @endif
                                            </select>
                                            @error('sub_category')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Description of the Service*</label>
                                            <textarea class="form-control border-red" rows="9" placeholder="Ex, transport service, Parlour, etc " name="description">{{$existing_inquiry ? $existing_inquiry->description : old('description')}}</textarea>
                                            @error('description')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row input-row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Date of execution of the task*</label>
                                            <input type="date" class="form-control border-red" name="execution_date" value="{{$existing_inquiry ? $existing_inquiry->execution_date : old('execution_date')}}">
                                            @error('execution_date')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">No. of Quotes per Participants*</label>
                                            <input type="number" class="form-control border-red" placeholder="ex, 1, 2, 3 etc" name="quotes_per_participants" value="{{$existing_inquiry ? $existing_inquiry->quotes_per_participants : old('quotes_per_participants')}}">
                                            @error('quotes_per_participants')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row input-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Participants*</label>
                                            <div class="participants-block border-red">
                                                @if(count($watch_list_data)>0)
                                                    @foreach ($watch_list_data as $item)
                                                        <label class="participant" id="participant{{$item}}">
                                                            @if($item->SellerData)
                                                                <input type="hidden" name="participant[]" value="{{$item->SellerData->id}}">
                                                            @endif
                                                            {{$item->SellerData && $item->SellerData->business_name ?$item->SellerData->business_name:""}}
                                                            <span class="remove" data-id="{{$item->id}}">
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.3636 3.7738L4.66797 11.2932" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M4.66797 3.7738L13.3636 11.2932" stroke="#ee2737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </span>
                                                        </label>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="add-invite-row">
                                    <button type="button" class="btn btn-add-invite">
                                        <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_613_9373)">
                                            <path d="M15.332 17.5V15.8333C15.332 14.9493 14.9282 14.1014 14.2093 13.4763C13.4904 12.8512 12.5154 12.5 11.4987 12.5H4.79036C3.7737 12.5 2.79868 12.8512 2.07979 13.4763C1.3609 14.1014 0.957031 14.9493 0.957031 15.8333V17.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.14583 9.16667C10.2629 9.16667 11.9792 7.67428 11.9792 5.83333C11.9792 3.99238 10.2629 2.5 8.14583 2.5C6.02874 2.5 4.3125 3.99238 4.3125 5.83333C4.3125 7.67428 6.02874 9.16667 8.14583 9.16667Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M19.168 6.66666V11.6667" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22.043 9.16666H16.293" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_613_9373">
                                            <rect width="23" height="20" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>                                                
                                        Add Participants from Website
                                    </button>
                                    <button type="button" class="btn btn-add-invite">
                                        <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_613_9373)">
                                            <path d="M15.332 17.5V15.8333C15.332 14.9493 14.9282 14.1014 14.2093 13.4763C13.4904 12.8512 12.5154 12.5 11.4987 12.5H4.79036C3.7737 12.5 2.79868 12.8512 2.07979 13.4763C1.3609 14.1014 0.957031 14.9493 0.957031 15.8333V17.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.14583 9.16667C10.2629 9.16667 11.9792 7.67428 11.9792 5.83333C11.9792 3.99238 10.2629 2.5 8.14583 2.5C6.02874 2.5 4.3125 3.99238 4.3125 5.83333C4.3125 7.67428 6.02874 9.16667 8.14583 9.16667Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M19.168 6.66666V11.6667" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22.043 9.16666H16.293" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_613_9373">
                                            <rect width="23" height="20" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>                                                
                                        Invite Participants from Outside
                                    </button>
                                </div>

                                <div class="row input-row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Minimum Quote Amount*</label>
                                            <input type="text" class="form-control border-red" placeholder="Ex, bid start Rs 15,000" name="minimum_quote_amount" value="{{$existing_inquiry ? $existing_inquiry->minimum_quote_amount : old('minimum_quote_amount')}}">
                                            @error('minimum_quote_amount')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Maximum  Quote Amount*</label>
                                            <input type="text" class="form-control border-red" placeholder="Ex,  bid end Rs 30,000" name="maximum_quote_amount" value="{{$existing_inquiry ? $existing_inquiry->maximum_quote_amount : old('maximum_quote_amount')}}">
                                            @error('maximum_quote_amount')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row input-row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="openauction" class="modal-custom-radio">
                                                <input type="radio" name="auction_type" id="openauction" value="open-auction" {{ ($existing_inquiry && $existing_inquiry->inquiry_type == "open-auction") || (old('auction_type') == "open-auction") ? "checked" : "" }}>
                                                <span class="checkmark">
                                                    <span class="checkedmark"></span>
                                                </span>
                                                <div class="radio-text">
                                                    <label for="openauction">Open Inquiry</label>
                                                    <span>Auction where Inquiry can be sent to all businesses on the website</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="closedauction" class="modal-custom-radio">
                                                <input type="radio" name="auction_type" id="closedauction" value="close-dauction" {{ ($existing_inquiry && $existing_inquiry->inquiry_type == "close-dauction") || (old('auction_type') == "close-dauction") ? "checked" : "" }}>
                                                <span class="checkmark">
                                                    <span class="checkedmark"></span>
                                                </span>
                                                <div class="radio-text">
                                                    <label for="closedauction">Closed Inquiry</label>
                                                    <span>Auction where Inquiry is sent to selected participants</span>
                                                    <span class="credit_message text-danger font-weight-bold"></span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row input-row open-auction-options {{ ($existing_inquiry && $existing_inquiry->inquiry_type == "open-auction") || (old('auction_type') == "open-auction") ? "show" : "" }}" id="openAuctionOptions">
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="fromcountry" class="modal-custom-radio">
                                                <input type="radio" name="auctionfrom" id="fromcountry" value="country" {{ ($existing_inquiry && $existing_inquiry->location_type == "country") || (old('auctionfrom') == "country") ? "checked" : "" }}>
                                                <span class="checkmark">
                                                    <span class="checkedmark"></span>
                                                </span>
                                                <div class="radio-text">
                                                    <label for="fromcountry">Suppliers from PAN India</label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="fromcity" class="modal-custom-radio">
                                                <input type="radio" name="auctionfrom" id="fromcity" value="city" {{ ($existing_inquiry && $existing_inquiry->location_type == "city") || (old('auctionfrom') == "city") ? "checked" : "" }}>
                                                <span class="checkmark">
                                                    <span class="checkedmark"></span>
                                                </span>
                                                <div class="radio-text">
                                                    <label for="fromcity">Choose from my City</label>
                                                </div>
                                            </label>
                                            <input type="hidden" name="city" value="{{$user->city}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="fromregion" class="modal-custom-radio">
                                                <input type="radio" name="auctionfrom" id="fromregion" value="region" {{ ($existing_inquiry && $existing_inquiry->location_type == "region") || (old('auctionfrom') == "region") ? "checked" : "" }}>
                                                <span class="checkmark">
                                                    <span class="checkedmark"></span>
                                                </span>
                                                <div class="radio-text">
                                                    <label for="fromregion">Choose from Region</label>
                                                </div>
                                            </label>
                                            <select id="selectRegion" class="form-control border-red select-region {{ ($existing_inquiry && $existing_inquiry->location_type == "region") || (old('auctionfrom') == "region") ? "show" : "" }}" name="region">
                                                <option value="" selected hidden>Select Region</option>
                                                <option value="Delhi" {{ $existing_inquiry && $existing_inquiry->location == "Delhi" ? 'selected' : '' }}>Delhi</option>
                                                <option value="Mumbai" {{ $existing_inquiry && $existing_inquiry->location == "Mumbai" ? 'selected' : '' }}>Mumbai</option>
                                                <option value="Kolkata" {{ $existing_inquiry && $existing_inquiry->location == "Kolkata" ? 'selected' : '' }}>Kolkata</option>
                                                <option value="Pune" {{ $existing_inquiry && $existing_inquiry->location == "Pune" ? 'selected' : '' }}>Pune</option>
                                                <option value="Bangalore" {{ $existing_inquiry && $existing_inquiry->location == "Bangalore" ? 'selected' : '' }}>Bangalore</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-save-row">
                                    <button type="submit" class="btn btn-animated btn-green btn-save" data-value="save">Save Inquiry</button>
                                </div>
                                @if(empty($existing_inquiry))
                                    <div class="form-submit-row">
                                        <button type="submit" class="btn btn-animated btn-submit" data-value="generate">GENERATE INQUIRY</button>
                                    </div>
                                @endif
                                <input type="hidden" id="submit_type" name="submit_type">
                            </form>
                        </div>
                    </div>
                    <div class="col-xxl-1 col-12"></div>
                </div>
            </div>
        </section>
        
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#auction_requirement_form button[type="submit"]').click(function(event){
            event.preventDefault();
            var submitType = $(this).data('value');
            $('#submit_type').val(submitType); 
            // Set the value of the hidden input field based on the clicked button
            var closedauction = $('input[name="auction_type"]:checked').val();
            if (closedauction == "close-dauction") {
                Swal.fire({
                    title: "Warning!",
                    text: "Credit will be used!",
                    icon: "warning"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#auction_requirement_form').submit(); // Submit the form
                    }
                });
            } else{
                $('#auction_requirement_form').submit(); // Submit the form
            }
           
        });
    });
     $("input[name='auction_type']").click(function() {
            var inputval = $(this).val();
            if(inputval == "open-auction") {
                $("#openAuctionOptions").addClass('show');
               
            } else {
                $("#openAuctionOptions").removeClass('show');
            }
    });

    $(document).ready(function () {
    $('.remove').click(function () {
        var itemId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route("user.single_watchlist.delete") }}',
                    data: {
                        id:itemId
                    },
                    success: function(response) {
                        if(response.status==200){
                            Swal.fire({
                                title: "Success!",
                                text: "Participant has been deleted successfully!",
                                icon: "success"
                            });
                            setTimeout(function() {
                                // Reload the page
                                location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
});
$(document).ready(function() {
    $('select[name="category"]').change(function(){
        var selectedCategory = $(this).val();
        // Perform an AJAX request to fetch sub-categories based on the selected category
        $.ajax({
            url: "{{route('user.collection_wise_category_by_title')}}", // Replace this with your actual route
            type: 'GET',
            data: {category: selectedCategory},
            success: function(response) {
                if(response.status==200){
                    // Clear existing options before appending new ones
                    $('select[name="sub_category"]').empty();
                    var isFirst = true;
                    // Append new options based on the response data
                    response.data.forEach(function(element) {
                        var option = '<option value="' + element.title + '">' + element.title + '</option>';
                        // Check the first option
                        if (isFirst) {
                            option = '<option value="' + element.title + '" selected>' + element.title + '</option>';
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
});
</script>
@endsection