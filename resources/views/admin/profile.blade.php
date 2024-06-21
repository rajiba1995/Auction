
@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
    <div class="inner-content">
        <div class="report-table-box">
            <div class="heading-row">
                <h3>Admin Profile</h3>
            </div>

            <p>Name : {{$admin->name}}</p>
            <p>Phone : {{$admin->phone}}</p>
            <p>Email : {{$admin->email}}</p>
           <a  href="{{ route('admin.edit') }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection
