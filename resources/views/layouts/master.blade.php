<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iberian Database - @yield('title')</title>
    <!-- Bootstrap Paper CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Master Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    @yield('styles')
</head>
<body id="app-layout">

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">

            <!-- Collapsed Hamburger -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Homepage link -->
                <a class="navbar-brand" href="{{ url('/') }}">@lang('messages.brand')</a>
            </div>

            <!-- Menu Contents -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
               
                <ul class="nav navbar-nav">

                    <li id="about">
                        <a href="{{ url('about') }}">@lang('messages.about-menu')</a>
                    </li>

                </ul>

                @if (!Auth::guest())
                    {{-- Menu shown when logged in --}}                
                    @include('includes.menu')
                @endif

                <!-- Language button -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ App::getLocale() == 'en' ? 'ENGLISH' : 'ESPA&Ntilde;OL' }}
                            <span class="caret"></span>
                        </a>

                        <ul id="changeLocale" class="dropdown-menu" role="menu">
                            <li><i class="fa fa-btn"></i>
                                <span id="change-language">{{ App::isLocale('en') ? 'ESPA&Ntilde;OL' : 'ENGLISH' }}</span>
                            </li>
                        </ul>

                    </li>
                </ul>

            </div>            

        </div>
    </nav>

    <!-- Header text -->
    <div class="site-header">                
        <div class="header-text">

            @yield('header-text')

        </div>            
    </div>

    <!-- Page content -->
    @yield('content')

<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Language -->
<script src="{{ asset('js/locale.js') }}"></script>

@yield('scripts')

</body>
</html>
