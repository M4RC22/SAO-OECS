<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="{{URL::asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/tracking.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/progressBarForms.css')}}">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    <!-- <div id="calendar"></div> -->

<style>
    .sidebar-light-pink .nav-sidebar > .nav-item > .nav-link.active {
    background-color: #e83e8c;
    color: #fff;
    }
    .hover-end{padding:0;margin:0;font-size:75%;text-align:center;position:absolute;bottom:0;width:100%;opacity:.8}
</style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Wrapper Start -->
    <div class="wrapper">

        <!-- Navbar Start -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="border-bottom: 5px solid #e7ae41">
            <!-- Left navbar Start -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>
            <!-- Left navbar End -->

            <!-- Right navbar Start -->
            <ul class="navbar-nav ml-auto"> 
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstName }}{{ " " }}{{ Auth::user()->lastName }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <!-- Right navbar End -->
        </nav>
        <!-- navbar End -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar Start -->
            <div class="sidebar">
                
                <!-- Sidebar Top -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/apc_logo.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">SAO - OECS</a>
                    </div>
                </div>

                <!-- Sidebar Menu Start -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- Display sidebar content according to user type Start -->
                        @if(Auth::user()->userType === "Professor")
                            @if(Auth::user()->studentOrg()->exists(Auth::user()->id))
                                @include('layouts.sidebar.studOrg');
                            @else
                                @include('layouts.sidebar.prof')
                            @endif
                        @endif
                        @if(Auth::user()->userType === "Student")
                            @include('layouts.sidebar.studOrg') 
                        @elseif(Auth::user()->userType === "NTP")
                            @include('layouts.sidebar.staff')
                        @endif
                        
                        <!-- changhe the last location depends on your POV EX: 'Adviser' ('layouts.sidebar.adviser')
                            addtl. file location can be found in layouts > sidebar -->

                        <!-- Display sidebar content according to user type End -->
                       

                    </ul>
                </nav>
                <!-- Sidebar Menu End -->

            </div>
            <!-- Sidebar End -->
        
        </aside>

        <!-- Page Content Start -->
        <div class="content-wrapper">

            <!-- Content Header Start -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="col-sm-12">

                        @yield('content')

                    </div>
                </div>
            </div>
            <!-- content-header End -->

        </div>
        <!-- Page Content End -->

        <footer class="main-footer d-flex justify-content-sm-center">
            <strong>Copyright &copy; 2021 <a href="https://www.facebook.com">Brewing Minds</a>.</strong> All rights reserved.
        </footer>
    </div>
<!-- Wrapper End -->

<!-- REQUIRED SCRIPTS -->
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="{{ asset('js/formTable.js')}}"></script>
    <script src="{{ asset('js/imageUploading.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

    @stack('js')
    <!-- <script type="text/javascript" src="{{ URL::asset('plugins/jquery/jquery.min.js') }} "></script> -->
    <script type="text/javascript" src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script type="text/javascript" src="{{ URL::asset('dist/js/adminlte.min.js') }} "></script>
</body>
</html>