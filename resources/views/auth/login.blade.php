<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Activity Tracker') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
</head>
<body>
    <div class="auth-body">
        <div class="form-container">
            <div class="user singinBx">
                <div class="imgBx">
                    <img src="{{ asset('img/banner.png') }}">
                </div>
                <div class="formBx">
                   <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf
                        <h2>{{ __('Login') }}</h2>
                        <input type="text" name="email"  id="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" autofocus required value="{{ old('email') }}">
                        @error('email')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                        <input type="password" name="password" placeholder="Password" id="password" required autofocus class="@error('password') is-invalid @enderror">
                        <small>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </small>
                        {{-- <input type="submit" name="" value="Login"> --}}
                        <button class="btn btn-custom login-btn" type="submit">{{ __('Login') }}</button>
                        <p class="signup">Don't have an account? <a href="#" onclick="return toggleForm();">Sign Up</a></p>
                    </form>
                </div>
            </div>
            <div class="user singupBx">

                <div class="formBx">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2>{{ __('Sign Up') }}</h2>
                        <input type="text" name="name" placeholder="Username" class="@error('name') is-invalid @enderror">
                        @error('name')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                        <input type="email" name="email" placeholder="Email Address" class="@error('email') is-invalid @enderror">
                        @error('email')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                        <input type="password" name="password" placeholder="Create Password" class="@error('password') is-invalid @enderror">
                        @error('password')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="@error('password') is-invalid @enderror">
                        @error('password_confirmation')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                        <button class="btn btn-custom signup-btn" type="submit">{{ __('Sign Up') }}</button>
                        <p class="signup">Already have an account? <a href="#" onclick="return toggleForm();">Sign In</a></p>
                    </form>
                </div>
                <div class="imgBx">
                    <img src="{{ asset('img/banner.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function toggleForm(){
                var container = document.querySelector('.form-container');
                container.classList.toggle('active');
            }
        </script>
    </div>
</body>
</html>