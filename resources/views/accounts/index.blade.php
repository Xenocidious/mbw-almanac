@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <main class="py-4 bg-light">
                    <div class="col">
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
                                    <input class="form-control" name="name" id="name" value="{{ $user->name }}"
                                           type="text"/>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="text-dark">{{ __('Settings') }}</legend>

                                <div class="form-group">
                                    <label class="form-label text-dark" for="theme">{{ __('Theme') }}</label>
                                    <select name="settings[theme]" id="theme" class="form-control">
                                        @foreach($themes as $theme)
                                            <option value="{{ $theme }}"
                                                    @if(isset($user->settings['theme']) && $user->settings['theme'] == $theme) selected @endif>
                                                {{ $theme }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="text-dark" for="cities">{{ __('Favorite cities') }}</label>
                                    <select name="cities[]" id="cities" class="form-control" multiple>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}"
                                                    @if(auth()->user()->cities->contains($city)) selected @endif>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @if($checkCityHighlight == true)
                                    <script>
                                        cities.style.transition = '5s';
                                        cities.style.cssText = '-webkit-box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);-moz-box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);';
                                        setTimeout(function () {
                                            cities.style.cssText = '-webkit-box-shadow: 0px 0px 65px 5px rgba(0,255,0,0.85);-moz-box-shadow: 0px 0px 65px 5px rgba(0,255,0,0.85);box-shadow: 0px 0px 65px 5px rgba(0,255,0,0.85);';
                                        }, 1000);
                                        setTimeout(function () {
                                            cities.style.cssText = '-webkit-box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);-moz-box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);box-shadow: 0px 0px 65px 5px rgba(255,255,255,.85);';
                                        }, 3000);
                                    </script>
                                @endif

                            </fieldset>

                            <fieldset>
                                <legend class="text-dark pt-5">{{ __('Edit password') }}</legend>

                                <div class="form-group">
                                    <label class="form-label text-dark"
                                           for="password_old">{{ __('Old password') }}</label>
                                    <input class="form-control" name="password_old" id="password_old" value=""
                                           type="password"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark" for="password">{{ __('Password') }}</label>
                                    <input class="form-control" name="password" id="password" value="" type="password"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark"
                                           for="password-confirmation">{{ __('Password confirmation') }}</label>
                                    <input class="form-control" name="password_confirmation" id="password-confirmation"
                                           value=""
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
                        <button class="btn btn-lg btn-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('favorite-images.index') }}">{{ __("Favorite Images") }}</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </section>
    </div>

@endsection
