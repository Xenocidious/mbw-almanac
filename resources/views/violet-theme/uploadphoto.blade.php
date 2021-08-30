@extends('layouts.app')
@section('content')
    <div class="container">
        <div id='spacefiller'></div>
        <div id='spacefiller'></div>

        <div class="main_content_uploadphoto">
            <h1>Upload a photo</h1>

            @if (Route::has('login'))
                @auth
                    <i class="fas fa-user"></i>
                    <p>{{Auth::user()->name}}<p>

                    <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>title</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" required>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                @elseauth
                    An account is necessary to upload a photo. please <a href='/'>login</a>, or if you don't have an
                    account yet: <a href='/'>register</a>, its free!
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
@endsection
