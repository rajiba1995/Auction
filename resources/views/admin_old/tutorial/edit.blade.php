@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update Tutorial</h3>
            <a href="{{route('admin.tutorial.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.tutorial.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="">Upload Tutorial</label>
                    <div class="form-wrap mb-3">
                        <video autoplay muted loop src="{{asset($data->file_path)}}" class="img-thumbnail" height="180px" width="180px"></video>
                        <input type="file" class="form-control" name="video" id="video">
                        @error('video')<div class="text-danger">{{ $message }}</div>@enderror
                       
                    </div>
                </div>
                <div class="col-12">
                   <input type="hidden" name="id" value="{{$data->id}}">
                   <input type="hidden" name="old_tutorial_img" value="{{$data->file_path}}">
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