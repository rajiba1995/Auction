@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Inspector</h3>
            <a href="{{route('admin.inspector.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.inspector.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="">Inspector Name</label>
                    <div class="form-wrap mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}">
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                       
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <label for="">Email</label>
                    <div class="form-wrap mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="col-md-3 col-12">
                    <label for="">Stencil Number</label>
                    <div class="form-wrap mb-3">
                        <input type="text" class="form-control" name="stencil_number" placeholder="Stencil Number" value="{{old('stencil_number')}}">
                        @error('stencil_number')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <label for="">Address</label>
                <div class="col-md-12 col-12">
                    <textarea class="form-wrap mb-3 form-control" name="address" cols="30" rows="3">{{old('address')}}</textarea>
                    @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 col-12">
                    <label for="">City</label>
                    <div class="form-wrap mb-3">
                        <input type="text" class="form-control" name="city" placeholder="City" value="{{old('city')}}">
                        @error('city')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <label for="">State</label>
                    <div class="form-wrap mb-3">
                        <input type="text" class="form-control" name="state" placeholder="State" value="{{old('state')}}">
                        @error('state')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <label for="">Pin Code</label>
                    <div class="form-wrap mb-3">
                        <input type="number" class="form-control" name="pin_code" placeholder="Pin Code" value="{{old('pin_code')}}">
                        @error('pin_code')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="col-md-6 col-12">
                    <label for="">Mobile Number</label>
                    <div class="form-wrap mb-3">
                        <input type="number" class="form-control" name="mobile_number" placeholder="Number" value="{{old('mobile_number')}}">
                        @error('mobile_number')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <label for="">Password</label>
                    <div class="form-wrap mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
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