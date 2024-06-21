@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update Banner</h3>
            <a href="{{route('admin.banner.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.banner.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    @if ( $data->file_path)
                    <label for="">Upload Banner Image</label>
                    <div class="form-wrap mb-3">
                        <img src="{{asset($data->file_path)}}" class="img-thumbnail" height="180px" width="180px"/>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                   <input type="hidden" name="old_banner_img" value="{{$data->file_path}}">
                       
                    </div>
                         <div class="form-wrap mb-3">
                             <label for="">Image Link</label>
                            <input type="text" class="form-control" name="image_link" id="image_link" value="{{$data->image_link}}">
                        @error('image_link')<div class="text-danger">{{ $message }}</div>@enderror
                         </div>
                         <input type="hidden" name="type" value="0">
                    @else
                    <label for="">Upload Banner Video</label>
                    <div class="form-wrap mb-3">
                        <video autoplay muted loop  src="{{asset($data->video_path)}}" class="img-thumbnail" height="180px" width="180px"></video>
                        <input type="file" class="form-control" name="video" id="video">
                        @error('video')<div class="text-danger">{{ $message }}</div>@enderror
                   <input type="hidden" name="old_banner_video" value="{{$data->video_path}}">
                       
                    </div>
                      <div class="form-wrap mb-3">
                             <label for="">Video Link</label>
                            <input type="text" class="form-control" name="video_link" id="video_link" value="{{$data->video_link}}">
                        @error('video_link')<div class="text-danger">{{ $message }}</div>@enderror
                         </div>
                         <input type="hidden" name="type" value="1">
                    @endif
                    
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