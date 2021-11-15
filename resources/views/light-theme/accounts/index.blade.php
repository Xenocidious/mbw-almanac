<body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Source Sans Pro','Sans Serif' !important;">
    @include('layouts.app')


    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>


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
