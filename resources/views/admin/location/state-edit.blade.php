@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update State</h3>
            <a href="{{route('admin.location.states.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.location.state.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="">State Name</label>
                    <div class="form-wrap mb-3">
                        <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}"/>
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror       
                    </div>                  
                </div>
                <div class="col-12">
                   <input type="hidden" name="id" value="{{$data->id}}">
                   <input type="hidden" name="country_id" value="{{$countryId}}">
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