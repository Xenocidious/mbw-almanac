@extends('layouts.app')

@section('content')
    <body class="transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        if (Auth::check()) {
            $countSeenImages = 0;
            for ($i = 0; $i < count($UserImageSeen); $i++) {
                if ($UserImageSeen[$i]['user_id'] == Auth::user()->id && $UserImageSeen[$i]['seen'] == 0) {
                    $countSeenImages++;
                }
            }
        }
        ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <x-weather :city="'gorinchem'"
                                   :start-date="strtotime('yesterday')"
                                   :end-date="strtotime('yesterday')"/>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <x-weather :city="'gorinchem'"
                                   :start-date="strtotime('now')"
                                   :end-date="strtotime('now')"/>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <x-weather :city="'gorinchem'"
                                   :start-date="strtotime('tomorrow')"
                                   :end-date="strtotime('tomorrow')"/>
                    </div>
                    <!-- ./col -->
                    <!--Favorite cities foreach-->
                    @if(!empty($userCities))
                </div>
                <div class="row">
                    @foreach ($userCities as $city)
                        <div class="col-lg-4 col-6">
                            <x-weather :city="$city['name']"/>
                        </div>
                    @endforeach

                <!-- ./col -->
                    @endif
                </div>

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-bar"></i>
                                    monthly Temperature
                                </h3>
                                <div class="card-tools">
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart"
                                         style="position: relative; height: 300px;">
                                        <canvas id="revenue-chart-canvas" height="300"
                                                style="height: 300px;"></canvas>
                                    </div>
                                    <div class="chart tab-pane" id="sales-chart"
                                         style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300"
                                                style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    Random Historical Weather
                                </h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    <li style="display:none" class="out-of-requests">
                                        <span class="text">
                                            You have exceeded the maximum amount of requests allowed
                                        </span>
                                    </li>
                                    {{--Foreach loops through the random historical dates to create a list item with temp and date --}}
                                    @foreach ($randomDates as $key => $randomDate)
                                        <li class="random-weather-{{ $key }}" style="display:none;">
                                            <!-- drag handle -->
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <span class="text datetime"></span>
                                            <span class="text tempmax"></span>
                                            <span class="text conditions"></span>
                                        </li>

                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $.ajax({
                                                    type: "POST",
                                                    url: "{{ route('weather.json') }}",
                                                    data: {
                                                        city: "Gorinchem Netherlands",
                                                        startDate: "{{ $randomDate }}",
                                                        endDate: "{{ $randomDate }}"
                                                    },
                                                    dataType: 'json',
                                                    success: function (data) {
                                                        let randomWeather = $(".random-weather-{{ $key }}");

                                                        if (!Array.isArray(data)) {
                                                            $(".out-of-requests").show();
                                                            $(randomWeather).remove();
                                                            return;
                                                        }

                                                        $(randomWeather).find('.datetime').html(data[0].datetime)
                                                        $(randomWeather).find(".tempmax").html(data[0].tempmax + "&deg;");
                                                        $(randomWeather).find(".conditions").html(data[0].conditions);
                                                        $(randomWeather).show();
                                                    }
                                                });
                                            });
                                        </script>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="button" class="btn btn-primary float-right">
                                    <i class="fas fa-plus"></i> Add item
                                </button>
                            </div> --}}
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">
                        <!-- Map card -->
                        <div class="card bg-gradient-primary" style='display: none'>
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Visitors
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange"
                                            title="Date range">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                            title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div>
                            <!-- /.card-body-->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-white">Visitors</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-white">Online</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-white">Sales</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card -->

                        <!-- solid sales graph -->
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-th mr-1"></i>
                                    Temperature Gorinchem
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas class="chart" id="line-chart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card -->

                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <div class="dropdown-menu" role="menu">
                                            <a href="#" class="dropdown-item">Add new event</a>
                                            <a href="#" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm"
                                            data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->

                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user shadow">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username">Alexander Pierce</h3>
                                <h5 class="widget-user-desc">Founder & CEO</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{ asset('dist/img/user1-128x128.jpg') }}"
                                     alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">3,200</h5>
                                            <span class="description-text">SALES</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">13,000</h5>
                                            <span class="description-text">FOLLOWERS</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">35</h5>
                                            <span class="description-text">PRODUCTS</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user shadow-lg">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white"
                                 style="background: url('{{ asset('dist/img/photo1.png') }}') center center;">
                                <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
                                <h5 class="widget-user-desc text-right">Web Designer</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="{{ asset('dist/img/user3-128x128.jpg') }}"
                                     alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">3,200</h5>
                                            <span class="description-text">SALES</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">13,000</h5>
                                            <span class="description-text">FOLLOWERS</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">35</h5>
                                            <span class="description-text">PRODUCTS</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <!-- /.col -->
                </div>
            </section>
        </div>
    </div>
    </div>
@endsection
