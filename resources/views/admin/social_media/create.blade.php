@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Social-Media</h3>
            <a href="{{route('admin.social_media.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back
            </a>
        </div>
        <form action="{{route('admin.social_media.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">

                    <div class="form-wrap mb-3">
                        <label for="">Upload Logo</label>
                        <input type="file" class="form-control" name="logo" id="logo" value="{{old('logo')}}">
                        <p class="small text-muted">Size: less than 1 mb | Preferable Dimensions: 64 X 64 px</p>
                        @error('logo')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">

                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Link</label>
                        <input type="text" class="form-control" name="link" id="link" value="{{old('link')}}">
                        @error('link')<div class="text-danger">{{ $message }}</div>@enderror
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
@endpush