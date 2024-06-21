@extends('front.layout.app')
@section('section')
<div class="main">
    <div class="inner-page">
        <div class="profile-page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @include('front.user.layout.sidebar')
                    <div class="col-xxl-9 col-xl-8 col-12 profile-right">
                        <div class="sidebar-toggler">
                            <span class="sidebar-opener" id="sidebarOpener">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M385.1 219.9 199.2 34c-20-20-52.3-20-72.3 0s-20 52.3 0 72.3L276.7 256 126.9 405.7c-20 20-20 52.3 0 72.3s52.3 20 72.3 0l185.9-185.9c19.9-19.9 19.9-52.3 0-72.2z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
                            </span>
                        </div>
                        <div class="tab-panes-wrapper">
                            <div class="tab-content">
                                <div class="tab-content-wrapper">
                                    <div class="top-content-bar">
                                        <h5 class="text-light">Change My Account Password</h5>
                                        <a href="{{route('user.settings')}}" class="btn btn-normal btn-cta"><i class="fa-solid fa-backward"></i>                                              
                                        Back
                                        </a>
                                    </div>
                                    <div class="content-box">
                                        <form method="POST" action="{{ route('user.change_password_update') }}">
                                            @csrf
                                            <div class="mb-3">
                                              <label class="form-label">Password</label>
                                              <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Enter a new Password" value="{{old('password')}}">
                                              <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                                              @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-label">Confirm Password</label>
                                              <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="{{old('confirm_password')}}">
                                              @error('confirm_password')<div class="text-danger">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="mb-3 form-check">
                                              <input type="checkbox" class="form-check-input" id="check">
                                              <label class="form-check-label" for="check">Show / Hide</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordField = document.getElementById("password");
        const confirmPasswordField = document.getElementById("confirm_password");
        const checkbox = document.getElementById("check");

        checkbox.addEventListener("change", function() {
            if (checkbox.checked) {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
            }
        });
    });
</script>   
@endsection