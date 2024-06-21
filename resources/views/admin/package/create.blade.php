@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Package</h3>
            <a href="{{route('admin.buyer.package.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.buyer.package.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-12">                   
                    <div class="form-wrap mb-3">
                        <label for="">Package Name</label>
                        <select class="form-control" name="package_name" id="package_name" value="{{old('package_name')}}">
                            <option value="" selected hidden>--select--</option>
                            <!-- <option value="Basic">Basic</option> -->
                            <option value="Silver">Silver</option>
                            <option value="Gold">Gold</option>
                            <option value="Platinum">Platinum</option>
                        </select>
                        @error('package_name')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Package Type</label>
                                <select class="form-control" name="package_type" id="package_type">
                                    <option value="" selected hidden>--select--</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Yearly">Yearly</option>
                                </select>
                                @error('package_type')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                              <label for="">Package Duration</label>
                                <select class="form-control" name="package_duration" id="package_duration">
                                    <option value="" selected hidden>--select--</option>
                                </select>
                                @error('package_duration')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                     
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            {{-- <div class="col">
                                <label for="">Inquiry/Auction</label>
                                <select class="form-control" name="inquiry_auction" id="inquiry_auction" value="{{old('inquiry_auction')}}">
                                    <option selected hidden>--select--</option>
                                    <option value="0" selected>YES</option>
                                    <option value="1">No</option>
                                </select>
                                @error('inquiry_auction')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div> --}}
                            
                            <div class="col">
                                <label for="">Rupees Prefix</label>
                                <select class="form-control" name="rupees_prefix" id="rupees_prefix" value="{{old('rupees_prefix')}}">
                                    {{-- <option selected hidden>--select--</option> --}}
                                    <option value="INR">INR</option>
                                    <option value="₹">₹</option>
                                </select>
                                @error('rupees_prefix')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div>
                            <div class="col">
                                <label for="">Package Price</label>
                                <input type="number" class="form-control" name="package_price" id="package_price" value="{{old('package_price')}}">
                                @error('package_price')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <!-- Conditional input field -->
                            <div class="col" id="additional_input_field">
                                <label for="additional_input_field">Total number of credit</label>
                                <input type="number" class="form-control" name="total_number_of_auction" id="total_number_of_auction" value="{{ old('total_number_of_auction') }}">
                                @error('total_number_of_auction')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                            <label for="">Total Cost/credit</label>
                            <input type="number" class="form-control" name="total_cost_per_inquiry" id="total_cost_per_inquiry" readonly/>
                            @error('total_cost_per_inquiry')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                            <label for="">Application Cost/credit</label>
                            <input type="number" class="form-control" name="appication_cost_per_inquiry" id="appication_cost_per_inquiry"/>
                            @error('appication_cost_per_inquiry')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                            <label for="">Sms Cost/credit</label>
                            <input type="number" class="form-control" name="sms_cost_per_inquiry" id="sms_cost_per_inquiry" readonly/>
                            @error('sms_cost_per_inquiry')<div class="text-danger">{{ $message }}</div>@enderror
                            <p id="sms_error" style="color: red;"></p>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Save Inquiry</label>
                                <select class="form-control" name="save_inquiry" id="save_inquiry" value="{{old('save_inquiry')}}">
                                    {{-- <option selected hidden>--select--</option> --}}
                                    <option value="0">YES</option>
                                    <option value="1">No</option>
                                </select>
                                @error('save_inquiry')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div>
                            <div class="col">
                                <label for="">Supplier/Vendor Suggestion</label>
                                <select class="form-control" name="supplier_vendor_suggestion" id="supplier_vendor_suggestion" value="{{old('supplier_vendor_suggestion')}}">
                                    {{-- <option selected hidden>--select--</option> --}}
                                    <option value="0">YES</option>
                                    <option value="1">No</option>
                                </select>
                                @error('supplier_vendor_suggestion')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Consultation(only 1 meeting)</label>
                                <select class="form-control" name="consultation" id="consultation" value="{{old('consultation')}}">
                                    {{-- <option value="" selected hidden>--select--</option> --}}
                                    <option value="0">YES</option>
                                    <option value="1">No</option>
                                </select>
                                @error('consultation')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div>
                            <div class="col">
                                <label for="">Watchlist</label>
                                <select class="form-control" name="watchlist" id="watchlist" value="{{old('watchlist')}}">
                                    {{-- <option selected hidden>--select--</option> --}}
                                    <option value="0">YES</option>
                                    <option value="1">No</option>
                                </select>
                                @error('watchlist')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                       
                    </div>
                    <!-- <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Sms</label>
                                <select class="form-control" name="sms" id="sms" value="{{old('sms')}}">
                                    <option selected hidden>--select--</option>
                                    <option value="0">YES</option>
                                    <option value="1">No</option>
                                </select>
                                @error('sms')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col" id="sms_quantity_field" style="display: none;">
                                <label for="sms_quantity">Sms Quantity</label>
                                <input type="number" class="form-control" name="sms_quantity" id="sms_quantity" value="{{ old('sms_quantity') }}">
                                @error('sms_quantity')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div> -->
                    <div class="form-wrap mb-3">
                    <label for="">Package Description</label>
                        <textarea class="form-control" name="package_description" id="package_description">{{old('package_description')}}</textarea>
                        @error('package_description')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-wrap">
                        <input type="submit" value="Save" class="btn btn-save ms-auto">
                    </div>
                </div>
            </div>
          </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    CKEDITOR.replace( 'package_description' );

    document.addEventListener('DOMContentLoaded', function() {
        const inquiryAuctionSelect = document.getElementById('inquiry_auction');
        const additionalInputField = document.getElementById('additional_input_field');

        inquiryAuctionSelect.addEventListener('change', function() {
            if (this.value == '0') {
                additionalInputField.style.display = 'block';
            } else {
                additionalInputField.style.display = 'none';
            }
        });

        // Trigger change event to set the initial state
        inquiryAuctionSelect.dispatchEvent(new Event('change'));
    });

    //sms
    // document.addEventListener('DOMContentLoaded', function() {
    //     const smsSelect = document.getElementById('sms');
    //     const smsQuantityField = document.getElementById('sms_quantity_field');

    //     smsSelect.addEventListener('change', function() {
    //         if (this.value == '0') {
    //             smsQuantityField.style.display = 'block';
    //         } else {
    //             smsQuantityField.style.display = 'none';
    //         }
    //     });

    //     // Trigger change event to set the initial state
    //     smsSelect.dispatchEvent(new Event('change'));
    // });
    document.getElementById('package_type').addEventListener('change', function () {
    const packageType = this.value;
    const packageDuration = document.getElementById('package_duration');

    // Clear previous options
    packageDuration.innerHTML = '<option selected hidden>--select--</option>';

    if (packageType === 'Monthly') {
        // Populate package_duration options from 1 to 11
        for (let i = 1; i <= 11; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.text = `${i} month${i > 1 ? 's' : ''}`;
            packageDuration.appendChild(option);
        }
    } else if (packageType === 'Yearly') {
        // Populate package_duration options with 12, 24, 36
        [12, 24, 36, 48].forEach(value => {
            const option = document.createElement('option');
            option.value = value;
            option.text = `${value} months`;
            packageDuration.appendChild(option);
        });
    }
});
document.getElementById('total_number_of_auction').addEventListener('keyup', function () {
    const packagePrice = parseInt(document.getElementById('package_price').value);
    const totalNumberOfInquiry = parseInt(document.getElementById('total_number_of_auction').value);
    const totalCostPerInquiry = document.getElementById('total_cost_per_inquiry');
    if(packagePrice>totalNumberOfInquiry && totalNumberOfInquiry > 0){
        const totalCost =packagePrice / totalNumberOfInquiry;
        totalCostPerInquiry.value =totalCost;
    } 
});

document.getElementById('appication_cost_per_inquiry').addEventListener('keyup', function() {
    const totalCostPerInquiry = parseInt(document.getElementById('total_cost_per_inquiry').value);
    const applicationCostPerInquiry = parseInt(document.getElementById('appication_cost_per_inquiry').value);
    const smsCostPerInquiry = totalCostPerInquiry - applicationCostPerInquiry;
    
    if (isNaN(totalCostPerInquiry) || isNaN(applicationCostPerInquiry)) {
        // Handle the case where inputs are not valid numbers
        document.getElementById('sms_error').innerText = "Please enter valid numbers.";
    } else if (smsCostPerInquiry < 0) {
        // Display error message if the result is negative
        document.getElementById('sms_error').innerText = "The SMS cost per inquiry cannot be negative.";
        document.getElementById('sms_cost_per_inquiry').value = ''; // Clear the input value
    } else {
        // Clear any previous error message
        document.getElementById('sms_error').innerText = '';
        document.getElementById('sms_cost_per_inquiry').value = smsCostPerInquiry;
    }
});

</script>
@endpush