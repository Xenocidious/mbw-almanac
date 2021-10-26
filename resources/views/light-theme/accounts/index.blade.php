<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mbw - almanac</title>

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
<body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Source Sans Pro','Sans Serif' !important;">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../resources/index3.html" class="brand-link">
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
                <a  href="{{ route('accounts.index') }}" class="d-block">{{ Auth::user()->name }}</a>
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
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
              </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Statistics
                        </p>
                    </a>
                </li>
            </li>
                <li class="nav-item">
                    <a href="{{Route('photohub')}}" class="nav-link">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                            Photohub
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
            </li>
                <li class="nav-item">
                    <a href="{{Route('weather')}}" class="nav-link">
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

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="index" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                <!-- Message Start -->
                    <div class="media">
                        <img src="../public/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Mert Özdal
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">this is my favourite project s..</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="../public/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Pieterjan van Dijk
                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Kijk ik ben er ook!</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="../public/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Aya Mohammed
                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Kijk een gouden ster -></p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <main class="py-4 bg-light">
                @if(session()->has('success'))
                    <div class="col-md-3">
                        <div class="card bg-success">
                        <div class="card-header">
                            <h3 class="card-title">Good job!</h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ session()->get('success') }}
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="col-md-3">
                        <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Oops!</h3>
                        </div>
                        <div class="card-body">
                            {{ session()->get('error') }}
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                @endif

            <div class="col-md-8">
                <form class="form" method="post" action="{{ route('accounts.update', ['user' => $user]) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <fieldset>
                        <legend class="text-dark">{{ __('Profile picture') }}</legend>

                        <div class="row">
                            <div class="col">
                                @if (Auth::user()->photo)
                                    <img src="data:image/png;base64, {{ Auth::user()->photo }}"
                                         width="120"
                                         height="120"
                                         class="rounded-circle"
                                         alt="{{ __('Profile picture') }}" id="profile-picture"/>
                                @endif
                            </div>
                            <div class="col">
                                <input class="form-control-file text-dark" name="photo" id="photo" type="file"/>
                            </div>
                            <div class="col">

                                <button type="button" role="button"
                                        onclick="$('#photo').val(''); $('#profile-picture').hide();"
                                        class="btn btn-sm btn-danger text-dark">
                                    {{ __('Remove image') }}
                                </button>
                            </div>
                        </div>
                    </fieldset>

                    @if ($checkCityHighlight == true)

                    @endif


                    <hr class="text-light bg-dark border-color-dark"/>

                    <fieldset>
                        <legend class="text-dark">{{ __('Info') }}</legend>

                        <div class="form-group">
                            <label class="form-label text-dark" for="email">{{ __('E-mail address') }}</label>
                            <input class="form-control" name="email" id="email" value="{{ $user->email }}"
                                   type="email"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark" for="name">{{ __('Name') }}</label>
                            <input class="form-control" name="name" id="name" value="{{ $user->name }}" type="text"/>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="text-dark">{{ __('Settings') }}</legend>

                        <div class="form-group">
                            <label class="text-dark" for="theme">{{ __('Theme') }}</label>
                            <select name="settings[theme]" id="theme" class="form-control">
                                @foreach($themes as $theme)
                                    <option value="{{ $theme->id }}"
                                            @if(isset($user->settings['theme']) && $user->settings['theme'] == $theme->id) selected @endif>
                                        {{ $theme->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="text-dark" for="cities">{{ __('Favorite cities') }}</label>
                            <select name="selectedCities" id="cities" class="form-control">
                                <option disabled selected>select to add cities to homepage</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">
                                    {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                       <?php
                       $chosenCities = [];
                       foreach ($cities as $city) {
                           foreach ($userCities as $userCity) {
                               if($userCity->user_id == Auth::user()->id && $city->id == $userCity->city_id){
                                    echo $city->name;
                                    ?>
                                    <a href="{{ route('favoriteCity.delete', ['id' => $city->id])}}"><i class="fas fa-minus-circle"></i></a><br>
                                    <?php

                               }
                            }
                        array_push($chosenCities, $city);
                       }

                       ?>

                        @if($checkCityHighlight == true)
                            <script>
                                cities.style.transition = '5s';
                                cities.style.cssText = '-webkit-box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);-moz-box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);';
                                setTimeout(function(){ cities.style.cssText = '-webkit-box-shadow: 0px 0px 65px 5px rgba(0,255,0,0.85);-moz-box-shadow: 0px 0px 65px 5px rgba(0,255,0,0.85);box-shadow: 0px 0px 65px 5px rgba(0,255,0,0.85);'; }, 1000);
                                setTimeout(function(){ cities.style.cssText = '-webkit-box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);-moz-box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);'; }, 3000);
                            </script>
                        @endif

                    </fieldset>

                    <fieldset>
                        <legend class="text-dark pt-5">{{ __('Edit password') }}</legend>

                        <div class="form-group">
                            <label class="form-label text-dark" for="password_old">{{ __('Old password') }}</label>
                            <input class="form-control" name="password_old" id="password_old" value="" type="password"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark" for="password">{{ __('Password') }}</label>
                            <input class="form-control" name="password" id="password" value="" type="password"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark"
                                   for="password-confirmation">{{ __('Password confirmation') }}</label>
                            <input class="form-control" name="password_confirmation" id="password-confirmation" value=""
                                   type="password"/>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <button class="btn btn-lg btn-primary" type="submit">{{ __('Save') }}</button>
                    </div>
                </form>

                <form method="post" action="{{ route('accounts.delete', ['user' => $user]) }}" class="form"
                      onsubmit="return confirm('{{ __('Do you really want to submit the form?') }}');">
                    @csrf
                    @method('delete')
                    <div class="form-group">
                        <button class="btn btn-lg btn-danger" type="submit">{{ __('Delete account') }}</button>
                    </div>
                </form>
                <button class="btn btn-lg btn-danger"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('favorite-images.index') }}">{{ __("Favorite Images") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</section>












<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../public/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../public/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="../public/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../public/plugins/moment/moment.min.js"></script>
<script src="../public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../public/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/dist/js/adminlte.js"></script>
</body>
</html>
