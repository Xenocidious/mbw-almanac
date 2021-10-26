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
<body class="hold-transition sidebar-mini layout-fixed">
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
    <nav class="main-header navbar navbar-expand navbar-white navbar-light dark-background">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="index" class="nav-link text-light">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-light">Contact</a>
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








    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{ __('Forecast') }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="form" method="GET">
                    <div class="form-group">
                        <label for="start">{{ __('From') }}</label>
                        <input class="form-control" id="start" name="start" value="{{ $start }}" type="datetime-local"
                               step="1"/>
                    </div>
                    <div class="form-group">
                        <label for="end">{{ __('Until') }}</label>
                        <input class="form-control" id="end" name="end" value="{{ $end }}" type="datetime-local"
                               step="1"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Load information</button>
                </form>
            </div>
        </div>

        @if(!empty($error))
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger">
                        <p>{{ $error }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                {{-- for loop is beter dan foreach omdat we daarmee het maximaal aantal dagen beter kunnen controleren. --}}
                @for($i = 0; $i < count($forecast['days']); $i++)
                    @if ($i%4 === 0)
            </div>
            <div class="row">
                @endif
                <div class="col-md-3 my-3">
                    {{-- laat forecast zien van $forecast['days'][$i] --}}
                    <div class="card">
                        <div class="card-body text-dark">
                            <h5 class="card-title text-dark">
                                <strong class="my-2">
                                    @switch(true)
                                        @case(stripos($forecast['days'][$i]['description'], 'sun') !== false)
                                        <i class="fas fa-sun fa-5x"></i>
                                        @break
                                        @case(stripos($forecast['days'][$i]['description'], 'rain') !== false)
                                        <i class="fas fa-cloud-rain fa-5x"></i>
                                        @break
                                        @case(stripos($forecast['days'][$i]['description'], 'fog') !== false)
                                        <i class="fas fa-smog fa-5x"></i>
                                        @break
                                        @case(stripos($forecast['days'][$i]['description'], 'cloud') !== false)
                                        <i class="fas fa-cloud fa-5x"></i>
                                        @break
                                    @endswitch
                                </strong>
                                <br/><br/>
                                <strong>
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $forecast['days'][$i]['datetime'])->format('d-m-Y') }}
                                </strong>
                                <br/><br/>
                                {{ $forecast['days'][$i]['description'] }}
                            </h5>
                            <p class="card-text text-dark">{{ $forecast['days'][$i]['tempmin'] }}&#176;C
                                - {{ $forecast['days'][$i]['tempmax'] }}&#176;C</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#details-modal-{{$i}}">
                                Show details
                            </button>
                        </div>
                    </div>
                </div>

                {{-- modals toevoegen voor details --}}
                <div class="modal fade" id="details-modal-{{$i}}" tabindex="-1" role="dialog"
                     aria-labelledby="details-modal-label-{{$i}}"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="details-modal-label-{{$i}}">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-dark">
                                <dl class="row">
                                    @foreach ($forecast['days'][$i] as $key => $value)
                                        @if (!is_array($value))
                                            <dt class="col-sm-3">{{ ucfirst(Illuminate\Support\Str::of($key)->split('/(?=[A-Z])/')->join(' ')) }}</dt>
                                            <dd class="col-sm-9">{{ $value }}</dd>
                                        @endif
                                    @endforeach
                                </dl>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @endfor
            </div>
        @endif
    </div>

















    <footer class="main-footer dark-background">
        <strong>Copyright &copy; 2021 - <?= Date("Y"); ?> <a href="../resources/https://adminlte.io">Aya, Mert en Pieterjan</a>.</strong>
        Most rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
              
  </div>
  
  
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
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
  <!-- JQVMap -->
  <script src="../public/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
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
  <!-- AdminLTE for demo purposes -->
  <script src="../public/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../public/dist/js/pages/dashboard.js"></script>
  </body>
  </html>
  