@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update Client</h3>
            <a href="{{route('admin.client.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.client.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="">Title</label>
                    <div class="form-wrap mb-3">                       
                        <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">
                        @error('title')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                    <label for="">Upload Client</label>
                    <div class="form-wrap mb-3">
                        <img src="{{asset($data->image)}}" class="img-thumbnail" height="180px" width="180px"/>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')<div class="text-danger">{{ $message }}</div>@enderror                       
                    </div>
                </div>
                <div class="col-12">
                   <input type="hidden" name="id" value="{{$data->id}}">
                   <input type="hidden" name="old_client_img" value="{{$data->image}}">
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