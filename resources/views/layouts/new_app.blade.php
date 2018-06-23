<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--// Meta tag Keywords -->

    @include('layouts.new_links')

</head>
<body>
<div class="header">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a href="/">ELMAW2AF</a></h1>
        </div>
        <div class="top-nav-text">
            <div class="nav-contact-w3ls"><i class="fa fa-phone" aria-hidden="true"></i><p>+0(15) 501 124 17</p></div>
            
        </div>
        <!-- navbar-header -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li><a class="hvr-underline-from-center" href="/">Home</a></li>
                @if(!\Illuminate\Support\Facades\Auth::check())
                <li><a href="{{route('login')}}" class="hvr-underline-from-center scroll scroll">Login</a></li>
                <li><a href="{{route('register')}}" class="hvr-underline-from-center scroll scroll">Sign Up</a></li>
                @else
                    @if(\Illuminate\Support\Facades\Auth::user()->email=='admin@admin.com')
                        <li><a href="{{route('Admin.index')}}"  class="hvr-underline-from-center scroll scroll">Dashboard</a></li>
                    @endif
                    <li><a href="{{route('Goto')}}"  class="hvr-underline-from-center scroll scroll">My profile</a></li>
                    <li><a class="hvr-underline-from-center scroll scroll" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </ul>
        </div>

        <div class="clearfix"> </div>
    </nav>

</div>
