@extends('employee.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>New Seller</h3>
            <a href="{{route('employee.sellers.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('employee.sellers.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">First Name</label>
                                    <input type="text" class="form-control" name="fname" id="title" value="{{old('fname')}}">
                                    @error('fname')<div class="text-danger">{{ $message }}</div>@enderror                    
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label for="">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="title" value="{{old('lname')}}">
                                @error('lname')<div class="text-danger">{{ $message }}</div>@enderror   
                            </div>                 
                        </div>
                    </div>
                <div class="form-wrap mb-3">
                    <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" autocomplete="email">
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror           
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                        @error('phone')<div class="text-danger">{{ $message }}</div>@enderror                      
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Bussiness Name</label>
                        <input type="text" class="form-control" name="business_name" id="business_name" value="{{old('business_name')}}">
                        @error('business_name')<div class="text-danger">{{ $message }}</div>@enderror                      
                    </div>
                   
                    <div class="form-wrap mb-3">
                    <label for="">Password</label>
                        <input type="password" class="form-control" name="pass" id="pass">
                        @error('pass')<div class="text-danger">{{ $message }}</div>@enderror
                       
                    </div>
                </div>
                <input type="hidden" name="emp_id" value="{{$employeeId->id}}"/>
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