@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Package</h3>
            <a href="{{route('admin.seller.package.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.seller.package.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">   
                    <div class="form-wrap mb-3">
                    <label for="">Package Name</label>
                        <select class="form-control" name="package_name" id="package_name" value="{{old('package_name')}}">
                            <option selected hidden>--select--</option>
                            <option value="Basic">Basic</option>
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
                                    <option selected hidden>--select--</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Yearly">Yearly</option>
                                </select>
                                @error('package_type')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                              <label for="">Package Duration</label>
                                <select class="form-control" name="package_duration" id="package_duration">
                                    <option selected hidden>--select--</option>
                                </select>
                                @error('package_duration')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                     
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Rupees Prefix</label>
                                <select class="form-control" name="rupees_prefix" id="rupees_prefix" value="{{old('rupees_prefix')}}">
                                    <option selected hidden>--select--</option>
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
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Group Watchlist Addition</label>
                                <select class="form-control" name="group_watchlist_addition" id="group_watchlist_addition" value="{{old('group_watchlist_addition')}}">
                                    <option selected hidden>--select--</option>
                                    <option value="0">YES</option>
                                    <option value="1">No</option>
                                </select>
                                @error('group_watchlist_addition')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div>
                            <div class="col">
                                <label for="">Consultation</label>
                                <select class="form-control" name="consultation" id="consultation" value="{{old('consultation')}}">
                                    <option selected hidden>--select--</option>
                                    <option value="0">YES</option>
                                    <option value="1">No</option>
                                </select>
                                @error('consultation')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Credit</label>
                                <input type="number" class="form-control" name="credit" id="credit" value="{{old('credit')}}">
                                @error('credit')<div class="text-danger">{{ $message }}</div>@enderror  
                            </div>   
                            <div class="col">
                                <label for="">Bid</label>
                                <select class="form-control" name="bid" id="Bid" value="{{old('bid')}}">
                                    <option selected hidden>--select--</option>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                                @error('bid')<div class="text-danger">{{ $message }}</div>@enderror  
                            </div> 
                            <div class="col">
                                <label for="">Badge</label>
                                <select class="form-control" name="badge" id="badge" value="{{old('badge')}}">
                                    <option selected hidden>--select--</option>
                                    <option value="0">No</option>
                                    <option value="1">Basic</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Advance</option>
                                </select>
                                @error('badge')<div class="text-danger">{{ $message }}</div>@enderror  
                            </div>      
                        </div>                  
                    </div>
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


</script>
@endpush