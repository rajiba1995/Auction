@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update Social-Media</h3>
            <a href="{{route('admin.social_media.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.social_media.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                <div class="form-wrap mb-3">
                        <label for="">Upload Logo</label>
                        <img src="{{asset($data->logo)}}" alt="no-image" height="100px" width="100px" class="img-thumbnail" srcset="">
                        <input type="file" class="form-control" name="logo" id="logo">
                        <p class="small text-muted">Size: less than 1 mb | Preferable Dimensions: 64 X 64 px</p>
                        @error('logo')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">

                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Link</label>
                        <input type="text" class="form-control" name="link" id="link" value="{{ $data->link }}">
                        @error('link')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-12">
                   <input type="hidden" name="id" value="{{$data->id}}">
                   <input type="hidden" name="old_logo_img" value="{{$data->logo}}">
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