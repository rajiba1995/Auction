<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="main">
        <div class="login-page">
            <div class="background">
                {{-- <img src="{{ asset('admin/assets/images/login_bg.png') }}" alt="Background"> --}}
            </div>
            <div class="inner-content text-center">
                <div class="logo">
                    {{-- <img src="{{ asset('admin/assets/images/is_logo.png') }}" alt="Logo"> --}}
                </div>
                <div class="login-form">
                    <h4 class="text-center">Admin Login</h4>
                    @if (session('loginError'))
                        <div class="alert alert-danger">
                            {{ session('loginError') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.login.check') }}">
                        @csrf
                        <div class="form-wrap">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-wrap">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" required autocomplete="current-password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-text text-end forgot-password">
                                <a href="javascript:void(0)" class="d-inline-block">Forgot password?</a>
                            </div>
                        </div>
                       
                        <div class="form-wrap">
                            <input type="submit" value="Sign In" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
