@extends('layouts.app')


@section('content')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  
    <?php
      if(Auth::check()){
        $countSeenImages = 0;
        for($i=0; $i<count($UserImageSeen); $i++){
          if($UserImageSeen[$i]['user_id'] == Auth::user()->id && $UserImageSeen[$i]['seen'] == 0){
            echo '<script>console.log("yayyyyyy");</script>';
            $countSeenImages++;
          }
        }
      }
    ?>

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

                  <div class="col-sm-6">
                      <h1 class="m-0">Photohub</h1>
                  </div><!-- /.col -->

        </div>
        <!-- /.content-header -->

    <!-- Main content -->
            <div class="content">
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
                                            <img class="img-circle" src="{{asset('dist/img/avatar.png')}}" alt="User Image">
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
                                <img class="img-fluid pad" src="{{asset('uploads/image/'.$image->file_path)}}" alt="Photo">

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
                                                <img class="img-circle img-sm" src="{{asset('dist/img/avatar.png')}}" alt="User Image">
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
                                    <img class="img-circle img-sm" src="{{asset('dist/img/avatar.png')}}" alt="Alt Text">
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
    </section>

</body>
</html>
