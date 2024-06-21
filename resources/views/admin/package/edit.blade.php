@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update Package</h3>
            <a href="{{route('admin.buyer.package.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.buyer.package.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-wrap mb-3">
                        <label for="">Package Name</label>
                        <select class="form-control" name="package_name" id="package_name">
                            <option value="" selected hidden>--select--</option>
                            @if($data->type == 'basic')
                                <option {{$data->package_name == 'Basic'?'selected':''}} value="Basic">Basic</option>
                            @endif
                            <option {{$data->package_name == 'Silver'?'selected':''}} value="Silver">Silver</option>
                            <option {{$data->package_name == 'Gold'?'selected':''}} value="Gold">Gold</option>
                            <option {{$data->package_name == 'Platinum'?'selected':''}} value="Platinum">Platinum</option>
                        </select>
                        @error('package_name')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Package Type</label>
                                <select class="form-control" name="package_type" id="package_type">
                                    <option value="" selected hidden>--select--</option>
                                    <option {{$data->package_type == 'Monthly'?'selected':''}} value="Monthly">Monthly</option>
                                    <option {{$data->package_type == 'Yearly'?'selected':''}} value="Yearly">Yearly</option>
                                </select>
                                @error('package_type')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                              <label for="">Package Duration</label>
                                <select class="form-control" name="package_duration" id="package_duration">
                                <option value="{{$data->package_duration}}" selected>{{$data->package_duration}} Month</option>
                                </select>
                                @error('package_duration')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                     
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Rupees Prefix</label>
                                <select class="form-control" name="rupees_prefix" id="rupees_prefix">
                                    <option value="" selected hidden>--select--</option>
                                    <option {{$data->rupees_prefix == 'INR'?'selected':''}} value="INR">INR</option>
                                    <option {{$data->rupees_prefix == '₹'?'selected':''}} value="₹">₹</option>
                                </select>
                                @error('rupees_prefix')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div>
                            <div class="col">
                                <label for="">Package Price</label>
                                <input type="number" class="form-control" name="package_price" id="package_price" value="{{$data->package_price}}">
                                @error('package_price')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <!-- Conditional input field -->
                            <div class="col" id="number_of_auction">
                                <label for="number_of_auction">Number Of credit</label>
                                <input type="number" class="form-control" name="total_number_of_auction" id="total_number_of_auction" value="{{ $data->total_number_of_auction }}">
                                @error('total_number_of_auction')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                            <label for="">Total Cost/credit</label>
                            <input type="number" class="form-control" name="total_cost_per_inquiry" id="total_cost_per_inquiry" value="{{ $data->total_cost_per_auction }}" readonly/>
                            @error('total_cost_per_inquiry')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                            <label for="">Application Cost/credit</label>
                            <input type="number" class="form-control" name="appication_cost_per_inquiry" value="{{$data->application_cost_per_auction}}" id="appication_cost_per_inquiry" {{ $data->type == 'basic' ? 'readonly' : '' }}/>
                            @error('appication_cost_per_inquiry')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                            <label for="">Sms Cost/credit</label>
                            <input type="number" class="form-control" name="sms_cost_per_inquiry" id="sms_cost_per_inquiry" value="{{$data->sms_cost_per_auction}}" readonly/>
                            @error('sms_cost_per_inquiry')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Save Inquiry</label>
                                <select class="form-control" name="save_inquiry" id="save_inquiry" value="{{old('save_inquiry')}}">
                                    <option selected hidden>--select--</option>
                                    <option {{$data->save_inquiry == '0'?'selected':''}} value="0">Yes</option>
                                    <option {{$data->save_inquiry == '1'?'selected':''}} value="1">No</option>
                                </select>
                                @error('save_inquiry')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div>
                            <div class="col">
                                <label for="">Supplier/Vendor Suggestion</label>
                                <select class="form-control" name="supplier_vendor_suggestion" id="supplier_vendor_suggestion">
                                    <option selected hidden>--select--</option>
                                    <option {{$data->supplier_vendor_suggestion == '0'?'selected':''}} value="0">Yes</option>
                                    <option {{$data->supplier_vendor_suggestion == '1'?'selected':''}} value="1">No</option>
                                </select>
                                @error('supplier_vendor_suggestion')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Consultation(only 1 meeting)</label>
                                <select class="form-control" name="consultation" id="consultation">
                                    <option selected hidden>--select--</option>
                                    <option {{$data->consultation == '0'?'selected':''}} value="0">Yes</option>
                                    <option {{$data->consultation == '1'?'selected':''}} value="1">No</option>
                                </select>
                                @error('consultation')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div>
                            <div class="col">
                                <label for="">Watchlist</label>
                                <select class="form-control" name="watchlist" id="watchlist">
                                    <option selected hidden>--select--</option>
                                    <option {{$data->watchlist == '0'?'selected':''}} value="0">Yes</option>
                                    <option {{$data->watchlist == '1'?'selected':''}} value="1">No</option>
                                </select>
                                @error('watchlist')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Package Description</label>
                        <textarea class="form-control" name="package_description" id="package_description">{{$data->package_description}}</textarea>
                        @error('package_description')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                </div>
                
                <div class="col-12">
                   <input type="hidden" name="id" value="{{$data->id}}">
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
        const additionalInputField = document.getElementById('number_of_auction');

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


    document.addEventListener('DOMContentLoaded', function() {
        const smsSelect = document.getElementById('sms');
        const smsQuantityField = document.getElementById('sms_quantity_field');

        smsSelect.addEventListener('change', function() {
            if (this.value == '0') {
                smsQuantityField.style.display = 'block';
            } else {
                smsQuantityField.style.display = 'none';
            }
        });

        // Trigger change event to set the initial state
        smsSelect.dispatchEvent(new Event('change'));
    });
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

document.getElementById('appication_cost_per_inquiry').addEventListener('keyup',function(){
    const totalCostPerInquiry = parseInt(document.getElementById('total_cost_per_inquiry').value);
    const applicationCostPerInquiry = parseInt(document.getElementById('appication_cost_per_inquiry').value);
        document.getElementById('sms_cost_per_inquiry').value =(totalCostPerInquiry-applicationCostPerInquiry);
          
});
</script>
@endpush