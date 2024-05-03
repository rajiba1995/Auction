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
                        <input type="text" class="form-control" name="package_name" id="package_name" value="{{old('package_name')}}">
                        @error('package_name')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Package Type</label>
                        <select class="form-control" name="package_type" id="package_type">
                            <option selected hidden>--select--</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Yearly">Yearly</option>
                        </select>
                        @error('package_name')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Package Price</label>
                        <input type="number" class="form-control" name="package_price" id="package_price" value="{{old('package_price')}}">
                        @error('package_price')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Package Prefix</label>
                        <input type="text" class="form-control" name="package_prefix" id="package_prefix" value="{{old('package_prefix')}}">
                        @error('package_prefix')<div class="text-danger">{{ $message }}</div>@enderror                       
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

</script>
@endpush