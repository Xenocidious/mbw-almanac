<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MBW-Almanac') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../public/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../public/plugins/summernote/summernote-bs4.min.css">
    <!-- customizations -->
    <link rel="stylesheet" href="css/app.css">
</head>
<body class='background-dark'>
<header>
  
    <?php
      if(Auth::check()){
        $countSeenImages = 0;
        for($i=0; $i<count($UserImageSeen); $i++){
          if($UserImageSeen[$i]['user_id'] == Auth::user()->id && $UserImageSeen[$i]['seen'] == 0){
            $countSeenImages++;
          }
        }
      }
    ?>

</header>

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->


        <!-- Navbar (side) left -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">mbw Almanac</span>
            </a>


            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              @if(auth::check())
                <div class="image">
                    @if(Auth::user()->photo == NULL)
                      <img src="../public/dist/img/avatar.png" class="img-circle elevation-2 userImage" alt="User Image">
                    @else
                      <img src="data:image/png;base64, {{ Auth::user()->photo }}" class="img-circle elevation-2 userImage" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a  href="{{route('accounts.index')}}" class="d-block">{{ Auth::user()->name }}</a>
                </div>
              @else
                <p><a href="{{ route('login') }}">{{ __('Login') }} </a> or <a href="{{ route('register') }}">{{ __('Register') }}</a></p>
              @endif
            </div>


          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-header">Navigate</li>
                    <li class="nav-item">
                        <a href="index" class="nav-link">
                            @if ($todayData[0]['tempmax'] > 0)
                            <i class="nav-icon fas fa-igloo"></i>
                            @else
                            <i class="nav-icon fas fa-home"></i>
                            @endif
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>
                                Statistics
                            </p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('photohub') }}" class="nav-link">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                            Photohub
                            
                            @if(Auth::check())
                              @if($countSeenImages > 9)
                                {{$countSeenImages = '9+'}}
                                <span class="badge badge-info right">{{$countSeenImages}}</span>
                              @elseif($countSeenImages <= 9 && $countSeenImages > 0)
                                <span class="badge badge-info right">{{$countSeenImages}}</span>
                              @endif
                            @endif
                        </p>
                    </a>
                </li>
            </li>
                <li class="nav-item">
                    <a href="{{ route("weather") }}" class="nav-link">
                        <i class="nav-icon fas fa-thermometer-half"></i>
                        <p>
                            Weather
                        </p>
                    </a>
                </li>
            </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            About us
                        </p>
                    </a>
                </li>
            </li>
        <ul>
    </aside>
