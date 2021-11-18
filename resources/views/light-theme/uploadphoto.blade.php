@extends('layouts.app')

@section('content')
<body class="hold-transition sidebar-mini layout-fixed">
<section class="content">
<div class="wrapper">
    <div class="container-fluid">
        
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 911.953px;">
  

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

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <br>
    <div class="container">
        <div id='spacefiller'></div>
        <div id='spacefiller'></div>
        @if (\Session::has('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Oops!</h5>
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="main_content_uploadphoto">
            <h1>Upload a photo</h1>

            @if (Route::has('login'))
                @auth
                    <i class="fas fa-user"></i>
                    <p>{{Auth::user()->name}}<p>

                    <form action="{{ route('upload.image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>description</label>
                            <input type="text" class="form-control" name="description" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" required>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                @elseauth
                    An account is necessary to upload a photo. please <a href='{{ route('login') }}'>login</a>, or if you don't have an
                    account yet: <a href='{{ route('register') }}'>register</a>, its free!
                    <a class='header_dropdown_button' href="{{ route('login') }}"
                       class="dropdown-item w3-bar-item w3-button">login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="header_dropdown_button dropdown-item w3-bar-item w3-button">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>