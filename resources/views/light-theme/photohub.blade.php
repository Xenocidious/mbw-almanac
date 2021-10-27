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
                    <a href="photohub" class="nav-link">
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
        <li class="nav-item d-none d-sm-inline-block">
        <a href="uploadphoto" class="nav-link">upload photo</a>
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



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="div-center">
                    <div class="row">
                        @foreach($images as $image)
                        <?php
                            $commentAmount = 0;
                            foreach($comments as $comment){
                                if($comment->image_id == $image->id){
                                    $commentAmount++;
                                }
                            }
                            $upvotesAmount=0;
                            foreach($upvotes as $upvote){
                                if($upvote->image_id == $image->id){
                                    $upvotesAmount++;
                                }
                            }
                        ?>
                        <div class="col-md-4">
                            <!-- Box Comment -->
                            <div class="card card-widget">
                              <div class="card-header">
                                <div class="user-block">
                                  @foreach($users as $u)
                                    @if($u->id == $image->user_id)
                                        @if($u->photo == NULL)
                                            <img class="img-circle" src="../public/dist/img/avatar.png" alt="User Image">
                                        @else
                                            <img class="img-circle" src="data:image/png;base64, {{ $u->photo }}" alt="User Image">
                                        @endif
                                    @endif
                                  @endforeach
                                  <span class="username"><a href="#">{{$image->user_name}}</a></span>
                                  <span class="description">Shared publicly - {{$image->created_at}}</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    @if($image->user_id == $user->id)
                                    <a href='{{ route('post.delete', ['id' => $image->id]) }}' onclick='return confirm("Are you sure that you want to delete this post?")'>
                                      <button type="button" class="btn btn-tool" title="delete post">
                                        <i class="fas fa-trash"></i>
                                      </button>
                                    </a>
                                  @endif
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                                <!-- /.card-tools -->
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body shadow">
                                <img class="img-fluid pad" src="../storage/app/public/image/{{$image->file_path}}" alt="Photo">

                                <p>{{$image->description}}</p>
                                <button type="button" class="btn btn-default btn-sm" onclick="copyImageUrl({{$image->id}})"><i class="fas fa-share"></i> Share</button>
                                <input type="text" id="hidden{{$image->id}}" class='hidden' name='IMGurl' value='http://localhost/jaar%202+3/groepsprojecten/mbw-almanac/public/openImage/{{$image->id}}'>
                                <script>
                                    function copyImageUrl(id){
                                        var copyText = document.getElementById("hidden"+id);
                                        console.log(copyText);
                                        copyText.select();
                                        copyText.setSelectionRange(0, 99999); /* For mobile devices */
                                        navigator.clipboard.writeText(copyText.value);
                                        alert("Copied the text: " + copyText.value);
                                    }
                                </script>

                                <?php
                                    $voted = 'false';
                                    foreach($upvotes as $vote){
                                        if($vote->image_id == $image->id){
                                            if($vote->user_id == $user->id){
                                                $voted = 'true';
                                            }
                                        }
                                    }
                                ?>
                                @if($voted == 'true')
                                    <a href='{{ route('image.remove_upvote', ['id' => $image->id]) }}'>
                                        <button type="button" class="btn btn-default btn-sm active_button">
                                            <i class="far fa-arrow-alt-circle-up active_icon"></i>
                                            Vote
                                        </button>
                                    </a>
                                @else
                                    <a href='{{ route('image.upvote', ['id' => $image->id]) }}'>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="far fa-arrow-alt-circle-up"></i>
                                            Vote
                                        </button>
                                    </a>
                                @endif

                                <?php
                                $imageUpvotes = 0;
                                foreach($upvotes as $upvote){
                                    if($upvote->image_id == $image->id){
                                        $imageUpvotes++;
                                    }
                                }
                                ?>
                                <span class="float-right text-muted">{{$imageUpvotes}} upvotes | {{$commentAmount}} comments</span>

                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer card-comments">
                                <div class="card-comment">
                                <?php $commentAmount = 0;
                                $maxComments = 3?>
                                  @foreach($comments as $comment)
                                    @if($comment->image_id == $image->id && $commentAmount < $maxComments)
                                    <? $commentAmount++; ?>
                                    <!-- User image -->
                                    @foreach($users as $u)
                                        @if($u->id == $comment->user_id)
                                            @if($u->photo == NULL)
                                                <img class="img-circle img-sm" src="../public/dist/img/avatar.png" alt="User Image">
                                            @else
                                                <img class="img-circle img-sm" src="data:image/png;base64, {{ $u->photo }}" alt="User Image">
                                            @endif
                                        @endif
                                    @endforeach
                                        <div class="comment-text">
                                            <span class="username">
                                            {{$comment->user_name}}
                                            <span class="text-muted float-right">{{date('H:i', strtotime($comment->created_at))}}
                                                @if($comment->user_id == $user->id)
                                                    <a onclick='return confirm("are you sure that you want to delete this comment?")' href="{{ route('comment.delete', ['id' => $comment->id]) }}"><i class="fas fa-trash"></i></a>
                                                @endif
                                            </span>
                                            </span><!-- /.username -->
                                            {{$comment->comment}}
                                        </div>
                                    <!-- /.comment-text -->
                                    @endif

                                  @endforeach
                                  @if($commentAmount == 0)
                                     Be the first to comment under <a href='#'>{{$image->user_name}}</a>'s post!
                                  @endif


                                </div>
                              </div>
                              <!-- /.card-footer -->
                              <div class="card-footer">
                                <form action="{{ route('comment.store') }}" method="post" enctype="multipart/form-data" name="comment">
                                    @csrf
                                  <input type="hidden" name='image_id' value='{{$image->id}}'>
                                  @if(Auth::user()->photo == NULL)
                                    <img class="img-circle img-sm" src="../public/dist/img/avatar.png" alt="Alt Text">
                                  @else
                                    <img class="img-circle img-sm" src="data:image/png;base64, {{ Auth::user()->photo }}" alt="Alt Text">
                                  @endif
                                  <!-- .img-push is used to add margin to elements next to floating images -->
                                  <div class="img-push">
                                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment" name="comment">
                                  </div>
                                </form>
                                <script>
                                    document.onkeydown=function(evt){
                                        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
                                        if(keyCode == 13)
                                        {
                                            document.comment.submit();
                                        }
                                    }
                                </script>

                              </div>
                              <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="main-footer">
        <strong>Copyright &copy; 2021 - <?= Date("Y"); ?> <a href="../resources/https://adminlte.io">Aya, Mert en Pieterjan</a>.</strong>
        Most rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>

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
<script src="../public/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../public/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
