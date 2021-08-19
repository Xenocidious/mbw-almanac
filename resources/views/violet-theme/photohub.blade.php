@extends('layouts.app')

@section('content')
    <div class="container">
        <div id='spacefiller'></div>

        <div id="main_content_photohub">
            @foreach($images as $image)
                <div class='photohub_content_wrapper'>
                    <div class="photohub_content" id='photohub_content1'>
                        <a href='{{ route("open.image", ["id" => $image->id])}}'>
                            <img alt='image' src="../storage/app/public/image/{{$image->file_path}}">
                        </a>
                    </div>
                    <div class='photohub_stats'>
                        <div class="description">
                            <h1>{{$image->name}}</h1>
                            <hr style="width:100%;text-align:left;margin-left:0">
                        </div>
                        <div class="upvote_amount">
                            @if($image->votes()->where('user_id', auth()->user()->id)->count() === 0)
                                <a href='{{Route("image.upvote", ["id" => $image->id])}}'><i
                                        class="fas fa-arrow-circle-up"></i></a>
                            @else
                                <a href='{{Route("image.remove_upvote", ["id" => $image->id])}}'><i
                                        class="fas fa-arrow-circle-up upvoted"></i></a>
                            @endif
                            <p>{{ $image->upvotes->count() }}</p>
                        </div>
                        <div class="comment_amount">
                            <i class="far fa-comments"></i>
                            <p>{{ $image->comments->count() }}</p>
                        </div>
                        <div class="favourite">
                            <i class="far fa-heart"></i>
                            <!-- <i class="fas fa-heart"></i> -->
                        </div>
                        <div class="user">
                            <i class="fas fa-user"></i>
                            <p>{{$image->user_name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
