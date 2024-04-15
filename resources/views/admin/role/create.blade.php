@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Role</h3>
            <a href="{{route('admin.role.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.role.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">

                    <div class="form-wrap mb-3">
                        <label for="">Role Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                           
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

@section('script')
  
@endsection