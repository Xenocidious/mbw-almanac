@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

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
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info background-green">
                                <div class="inner">
                                    <h3>yesterday, {{ round($yesterdayData[0]['tempmax'], 0) }}&deg;</h3>
                                    <p>{{ date('l', strtotime("-1 days")) }}</p>
                                </div>
                                <div class="icon">
                                    @switch(true)
                                        @case(stripos($yesterdayData[0]['description'], 'sun') !== false)
                                        <i class="fas fa-sun fa-5x"></i>
                                        @break
                                        @case(stripos($yesterdayData[0]['description'], 'rain') !== false)
                                        <i class="fas fa-cloud-rain fa-5x"></i>
                                        @break
                                        @case(stripos($yesterdayData[0]['description'], 'fog') !== false)
                                        <i class="fas fa-smog fa-5x"></i>
                                        @break
                                        @case(stripos($yesterdayData[0]['description'], 'cloud') !== false)
                                        <i class="fas fa-cloud fa-5x"></i>
                                        @break
                                        @case(stripos($yesterdayData[0]['description'], 'clear') !== false)
                                        <i class="fas fa-sun fa-5x"></i>
                                        @break
                                    @endswitch
                                </div>
                                <a href="#" class="small-box-footer">
                                    {{$yesterdayData[0]['conditions']}}, More info
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info background-green">
                                <div class="inner">
                                    <h3>today, {{ round($todayData[0]['tempmax'], 0) }}&deg;</h3>
                                    <p>{{ date('l') }}</p>
                                </div>

                                <div class="icon">
                                    @switch(true)
                                        @case(stripos($todayData[0]['conditions'], 'sun') !== false)
                                        <i class="fas fa-sun fa-5x"></i>
                                        @break
                                        @case(stripos($todayData[0]['conditions'], 'rain') !== false)
                                        <i class="fas fa-cloud-rain fa-5x"></i>
                                        @break
                                        @case(stripos($todayData[0]['conditions'], 'fog') !== false)
                                        <i class="fas fa-smog fa-5x"></i>
                                        @break
                                        @case(stripos($todayData[0]['conditions'], 'cloud') !== false)
                                        <i class="fas fa-cloud fa-5x"></i>
                                        @break
                                        @case(stripos($todayData[0]['conditions'], 'clear') !== false)
                                        <i class="fas fa-sun fa-5x"></i>
                                        @break
                                    @endswitch
                                </div>
                                <a href="#" class="small-box-footer">
                                    {{ $todayData[0]['conditions'] }}, More
                                    info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info background-green">
                                <div class="inner">
                                    <h3>tomorrow, {{ round($forecastData[1]['tempmax'], 0) }}&deg;</h3>
                                    <p>{{ date('l', strtotime("1 days")) }}</p>
                                </div>

                                <div class="icon">
                                    @switch(true)
                                        @case(stripos($forecastData[1]['conditions'], 'sun') !== false)
                                        <i class="fas fa-sun fa-5x"></i>
                                        @break
                                        @case(stripos($forecastData[1]['conditions'], 'rain') !== false)
                                        <i class="fas fa-cloud-rain fa-5x"></i>
                                        @break
                                        @case(stripos($forecastData[1]['conditions'], 'fog') !== false)
                                        <i class="fas fa-smog fa-5x"></i>
                                        @break
                                        @case(stripos($forecastData[1]['conditions'], 'cloud') !== false)
                                        <i class="fas fa-cloud fa-5x"></i>
                                        @break
                                        @case(stripos($forecastData[1]['conditions'], 'clear') !== false)
                                        <i class="fas fa-sun fa-5x"></i>
                                        @break
                                    @endswitch
                                </div>
                                <a href="#" class="small-box-footer"> More info
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!--Favorite cities foreach-->
                        @if(!empty($userCities))
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info background-green">
                                    <div class="inner">
                                        {{-- @todo implement juiste gegevens vanuit home controller --}}
                                        @foreach ($userCities as $city)
                                            <h4>
                                                {{ $city['address'] }}
                                                <small>{{ $city['days'][0]['temp'] }}&deg;</small>
                                            </h4>
                                        @endforeach
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-map-marked-alt fa-5x"></i>
                                    </div>
                                    <a href="{{ route('accounts.indexHighlighted') }}" class="small-box-footer">
                                        Add more favorite cities
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
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
                                        To Do List
                                    </h3>

                                    <div class="card-tools">
                                        <ul class="pagination pagination-sm">
                                            <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                                            <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <ul class="todo-list" data-widget="todo-list">
                                        <li>
                                            <!-- drag handle -->
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <!-- checkbox -->
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                                <label for="todoCheck1"></label>
                                            </div>
                                            <!-- todo text -->
                                            <span class="text">Design a nice theme</span>
                                            <!-- Emphasis label -->
                                            <small class="badge badge-danger">
                                                <i class="far fa-clock"></i>
                                                2 mins
                                            </small>
                                            <!-- General tools such as edit or delete-->
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                                                <label for="todoCheck2"></label>
                                            </div>
                                            <span class="text">Make the theme responsive</span>
                                            <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                                <label for="todoCheck3"></label>
                                            </div>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="badge badge-warning"><i class="far fa-clock"></i> 1
                                                day</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                                <label for="todoCheck4"></label>
                                            </div>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="badge badge-success"><i class="far fa-clock"></i> 3
                                                days</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                                <label for="todoCheck5"></label>
                                            </div>
                                            <span class="text">Check your messages and notifications</span>
                                            <small class="badge badge-primary"><i class="far fa-clock"></i> 1
                                                week</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                                <label for="todoCheck6"></label>
                                            </div>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="badge badge-secondary"><i class="far fa-clock"></i> 1
                                                month</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <button type="button" class="btn btn-primary float-right">
                                        <i class="fas fa-plus"></i> Add item
                                    </button>
                                </div>
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
@show
