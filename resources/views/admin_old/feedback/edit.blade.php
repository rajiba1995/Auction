@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update Feedback</h3>
            <a href="{{route('admin.feedback.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.feedback.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                <div class="form-wrap mb-3">
                        <label for="">Upload Logo</label>
                        <input type="file" class="form-control" name="logo" id="logo" value="{{old('logo')}}">
                        @error('logo')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ $data->customer_name }}">
                        @error('customer_name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Customer Designation</label>
                        <input type="text" class="form-control" name="customer_designation" id="customer_designation" value="{{ $data->customer_designation }}">
                        @error('customer_designation')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $data->company_name  }}">
                        @error('company_name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Message</label>
                        <textarea type="text" class="form-control" name="message" id="message">{{  $data->message }}</textarea>
                        @error('message')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-12">
                   <input type="hidden" name="id" value="{{$data->id}}">
                   <input type="hidden" name="old_feedback_img" value="{{$data->logo}}">
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
    CKEDITOR.replace( 'message' );
</script>
@endpush