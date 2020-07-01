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
    <script type="text/javascript" src="{{ asset('js/all.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/Nunito-Regular.woff') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
</head>
<body>

    <body style="background: #f8f9fa;">
        <div class="container-fluid doctor-page-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-stats text-center">
                        <figure>
                            @if(!empty(Auth::user()->image))
                            <img src="{{ Auth::user()->image }}" class="img-fluid">
                            @endif
                        </figure>
                        <h5>{{ Auth::user()->name }}</h5>
                        <h6>Administrator</h6>
                    </div>
                    <div class="sidebar-nav">
                        <p>
                            <a href="{{ url('home') }}"><span class="fa fa-home sidebar-icon fa-sm"></span>Dashboard</a>
                        </p>
                        <p>
                            <a href="{{ url('activity') }}"><span class="fa fa-cogs sidebar-icon fa-sm"></span>Activity</a>
                        </p>
                        <p>
                            <a href="{{ url('update-records') }}"><span class="fa fa-calendar-alt sidebar-icon fa-sm"></span>Activity Report / History</a>
                        </p>
                        <p>
                           <a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           <span class="fa fa-power-off"></span>
                           {{ __('Logout') }}
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </p>
            </div>
        </div>
        @yield('content')
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
</body>
</html>
