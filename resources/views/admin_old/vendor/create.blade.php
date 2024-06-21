@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Vendor</h3>
            <a href="{{route('admin.vendor.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.vendor.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="">Vendor Name</label>
                    <div class="form-wrap mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}">
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                       
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <label for="">Contact Number</label>
                    <div class="form-wrap mb-3">
                        <input type="number" class="form-control" name="contact_number" placeholder="Number" value="{{old('contact_number')}}">
                        @error('contact_number')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <label for="">Email</label>
                    <div class="form-wrap mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <label for="">Address(Location)</label>
                <div class="col-md-12 col-12">
                    <textarea class="form-wrap mb-3 form-control" name="address" cols="30" rows="3">{{old('address')}}</textarea>
                    @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 col-12">
                    <label for="">State</label>
                    <div class="form-wrap mb-3">
                        <input type="text" class="form-control" name="state" placeholder="State" value="{{old('state')}}">
                        @error('state')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <label for="">Pin Code</label>
                    <div class="form-wrap mb-3">
                        <input type="number" class="form-control" name="pin_code" placeholder="Pin Code" value="{{old('pin_code')}}">
                        @error('pin_code')<div class="text-danger">{{ $message }}</div>@enderror
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
     $(document).ready(function () {
        $('.input_field').on('keyup', function () {
            // Get the input value
            var inputValue = $(this).val();

            var numberRegex = /^\d*\.?\d*$/;

            if (numberRegex.test(inputValue)) {
            } else {
                $(this).val("");
            }
        });
    });
</script>
@endpush