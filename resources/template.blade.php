{{-- this file represents a new blade file, just copy pasta this to your new blade file and place the requiered content in the content section --}}



@extends('layouts.app')

@section('content')
<body class="transition sidebar-mini layout-fixed">
<div class="wrapper">
  
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
    <img class="animation__shake" src="../public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <div class="container-fluid">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        
            {{-- content section
            //                 //
            //                 //
            //                 //
            //                 //
            //                 //
            //                 //
            //                 //
            8================--}}

    </section>
</div>
@show


</body>
</html>