@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update Package</h3>
            <a href="{{route('admin.seller.package.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.seller.package.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-wrap mb-3">
                        <label for="">Package Name</label>
                            <select class="form-control" name="package_name" id="package_name">
                                <option selected hidden>--select--</option>
                                <option {{$data->package_name == 'Basic'?'selected':''}} value="Basic">Basic</option>
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
                                    <option selected hidden>--select--</option>
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
                                    <option selected hidden>--select--</option>
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
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Group Watchlist Addition</label>
                                <select class="form-control" name="group_watchlist_addition" id="group_watchlist_addition">
                                    <option selected hidden>--select--</option>
                                    <option {{$data->group_watchlist_addition == '0'?'selected':''}} value="0">Yes</option>
                                    <option {{$data->group_watchlist_addition == '1'?'selected':''}} value="1">No</option>
                                </select>
                                @error('group_watchlist_addition')<div class="text-danger">{{ $message }}</div>@enderror                       
                            </div>
                            <div class="col">
                                <label for="">Consultation</label>
                                <select class="form-control" name="consultation" id="consultation" value="{{old('consultation')}}">
                                    <option selected hidden>--select--</option>
                                    <option {{$data->consultation == '0'?'selected':''}} value="0">Yes</option>
                                    <option {{$data->consultation == '1'?'selected':''}} value="1">No</option>
                                </select>
                                @error('consultation')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>                       
                    </div>
                    <div class="form-wrap mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="">Credit</label>
                                <input type="number" class="form-control" name="credit" id="credit" value="{{$data->credit}}">
                                @error('credit')<div class="text-danger">{{ $message }}</div>@enderror  
                            </div>   
                            <div class="col">
                                <label for="">Bid</label>
                                <select class="form-control" name="bid" id="Bid">
                                    <option selected hidden>--select--</option>
                                    <option {{$data->bid == '0'?'selected':''}} value="0">Yes</option>
                                    <option {{$data->bid == '1'?'selected':''}} value="1">No</option>
                                </select>
                                @error('bid')<div class="text-danger">{{ $message }}</div>@enderror  
                            </div> 
                            <div class="col">
                                <label for="">Badge</label>
                                <select class="form-control" name="badge" id="badge">
                                    <option selected hidden>--select--</option>
                                    <option {{$data->badge == '0'?'selected':''}} value="0">No</option>
                                    <option {{$data->badge == '1'?'selected':''}} value="1">Basic</option>
                                    <option {{$data->badge == '2'?'selected':''}} value="2">Intermediate</option>
                                    <option {{$data->badge == '3'?'selected':''}} value="1">Advance</option>
                                </select>
                                @error('badge')<div class="text-danger">{{ $message }}</div>@enderror  
                            </div>      
                        </div>                  
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Package Description</label>
                        <textarea class="form-control" name="package_description" id="package_description">{{ $data->package_description}}</textarea>
                        @error('package_description')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
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