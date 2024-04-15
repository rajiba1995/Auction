
@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
    <div class="inner-content">
        <div class="report-table-box">
            <div class="heading-row">
                <h3>Admimn Update</h3>
            </div>
            <form method="POST" action="{{ route('admin.update') }}">
                @csrf
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" value="{{$admin->name}}">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" aria-describedby="emailHelp" name="phone" value="{{$admin->phone}}">
                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror

                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{$admin->email}}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror

                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" autocomplete="new-password">
                @error('pass') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <input type="hidden" name="id" value="{{$admin->id}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
