@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row mb-2">
            <h3>Update Employee</h3>
            <a href="{{route('admin.employee.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>
        </div>
        <form action="{{route('admin.employee.update')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$data->id}}" name="id"/>
            <div class="row">
                <div class="col-md-6 col-12">
                <div class="form-wrap mb-3">
                    <label for="">Employee Name</label>
                        <input type="text" class="form-control" name="name" id="title" value="{{$data->name}}">
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                       
                    </div>
                <div class="form-wrap mb-3">
                    <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" autocomplete="off">
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                       
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" value="{{ $data->phone }}">
                        @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                       
                    </div>
                    <div class="form-wrap mb-3">
                    <label for="">Role</label>
                        <select name="role" id="" class="form-control">
                            <option selected hidden>--select--</option>
                            @foreach ($role as $item )
                                <option value="{{$item->id}}" {{$item->id == $data->role?'selected':"this role is not available"}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('role')<div class="text-danger">{{ $message }}</div>@enderror
                       
                    </div>
                    <div class="form-wrap mb-3">
                        <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" id="pass">
                            @error('pass')<div class="text-danger">{{ $message }}</div>@enderror
                           
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