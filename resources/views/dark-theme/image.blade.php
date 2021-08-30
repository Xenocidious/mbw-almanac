@extends('layouts.app')

@section('content')
    <div class="container">
        <div id='spacefiller'></div>
        <div id='spacefiller'></div>

        <?php

        $upvotes = 0;
        $disable_upvote = false;
        for ($i = 0; $i < count($votes); $i++) {
            if ($votes[$i]->image_id == $image[0]->id && $votes[$i]->user_id == Auth::user()->id) {
                $disable_upvote = true;
            }
            if ($votes[$i]->image_id == $image[0]->id) {
                $upvotes++;
            }
        }

        ?>


        <div id="image_container_wrapper">
            <div id="image_overlay">
                <h1>{{$image[0]->name}}</h1>
            </div>
            <img src="../../storage/app/public/image/{{$image[0]->file_path}}" alt="image">

            <div id="commentsection_top_bar">
                <div id="image_like_section">
                    <div>

                        <?
                        if($disable_upvote == false){
                        ?>
                        <a href='{{ route("image.upvote", ["id" => $image[0]->id])}}'><i
                                class="fas fa-arrow-circle-up"></i></a>
                        <?php }else{ ?>
                        <a href='{{Route("image.remove_upvote", ["id" => $image[0]->id])}}'><i
                                class="fas fa-arrow-circle-up upvoted"></i></a>
                        <?php } ?>
                    </div>
                    <p>{{$upvotes}}</p>
                </div>
                <div id="image_comment_section">
                    <i class="far fa-comments"></i>

                    <?php
                    $commentCount = 0;
                    foreach ($comments as $comment) {
                        if ($comment->image_id == $image[0]->id) {
                            $commentCount++;
                        }
                    }
                    ?>

                    <p>{{$commentCount}}</p>
                </div>
                <div id="image_favourite_section">
                    <i class="far fa-heart"></i>
                    <!-- <i class="fas fa-heart"></i> -->
                </div>
                <div class="image_OP_section">
                    <i class="fas fa-user"></i>
                    <p>{{$image[0]->user_name}}</p>
                </div>
                <?php
                if($image[0]->user_id == Auth::user()->id){?>
                <div class="image_delete_section">
                    <a href="{{ route('post.delete', ['id' => $image[0]->id]) }}"
                       onclick='return confirm("are you sure that you want to delete this post?")'><i
                            class="fas fa-minus-circle comment_delete"></i></a>
                </div>
                <?php } ?>

                @auth @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator')
                    <div class="image_delete_section">
                        <a href="{{ route('post.delete', ['id' => $image[0]->id]) }}"
                           onclick='return confirm("are you sure that you want to delete post `{{$image[0]->name}}` from user `{{$image[0]->user_name}}`?")'><i
                                class="fas fa-minus-circle comment_delete"></i></a>
                    </div>
                @endif @endif
            </div>
            <div id="comment_section">

                <?php
                foreach($comments as $comment){
                if($comment->image_id == $image[0]->id){ ?>
                <div class="comment user" id='comment{{$comment->id}}'>
                    <div class="commenter_profile">
                        <i class="fas fa-user"></i>
                        <h3>{{$comment->user_name}}</h3>
                    </div>
                    <div class="commenter_comment">
                        <p>{{$comment->comment}}</p>
                        <?php
                        if($comment->user_id == Auth::user()->id){ ?>
                        <a href="{{ route('comment.delete', ['id' => $comment->id]) }}"
                           onclick="return confirm('Are you sure that you want to delete your comment?')"><i
                                class="fas fa-minus-circle comment_delete"></i></a>
                        <?php } ?>
                        @auth @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator')
                            <a href="{{ route('comment.delete', ['id' => $comment->id]) }}"
                               onclick="return confirm('Are you sure that you want to delete your comment?')"><i
                                    class="fas fa-minus-circle comment_delete"></i></a>
                        @endif @endif
                    </div>
                    @auth @if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator')
                        <a href="{{ route('comment.delete', ['id' => $comment->id]) }}"
                           onclick="return confirm('Are you sure that you want to delete your comment?')"><i
                                class="fas fa-minus-circle comment_delete"></i></a>
                    @endif @endif
                </div><?php
                }
                }
                ?>
                <form action="{{ route('comment.store') }}" method="post" enctype="multipart/form-data"
                      id='commenting_form'>
                    <input type="hidden" name='image_id' value='{{$image[0]->id}}'>
                    @csrf
                    <input type="body" name="comment" id='body_comment' required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
