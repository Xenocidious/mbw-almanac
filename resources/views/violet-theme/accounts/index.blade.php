@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="form" method="post" action="{{ route('accounts.update', ['user' => $user]) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <fieldset>
                        <legend class="text-white">{{ __('Profile picture') }}</legend>

                        <div class="row">
                            <div class="col">
                                @if ($user->photo)
                                    <img src="data:image/png;base64, {{ $user->photo }}"
                                         width="120"
                                         height="120"
                                         class="rounded-circle"
                                         alt="{{ __('Profile picture') }}" id="profile-picture"/>
                                @endif
                            </div>
                            <div class="col">
                                <input class="form-control-file text-white" name="photo" id="photo" type="file"/>
                            </div>
                            <div class="col">

                                <button type="button" role="button"
                                        onclick="$('#photo').val(''); $('#profile-picture').hide();"
                                        class="btn btn-sm btn-danger text-white">
                                    {{ __('Remove image') }}
                                </button>
                            </div>
                        </div>
                    </fieldset>

                    <hr class="text-white bg-dark border-color-dark"/>

                    <fieldset>
                        <legend class="text-white">{{ __('Info') }}</legend>

                        <div class="form-group">
                            <label class="form-label text-white" for="email">{{ __('E-mail address') }}</label>
                            <input class="form-control" name="email" id="email" value="{{ $user->email }}"
                                   type="email"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="name">{{ __('Name') }}</label>
                            <input class="form-control" name="name" id="name" value="{{ $user->name }}" type="text"/>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="text-white">{{ __('Settings') }}</legend>

                        <div class="form-group">
                            <label class="text-white" for="theme">{{ __('Theme') }}</label>
                            <select name="settings[theme]" id="theme" class="form-control">
                                @foreach($themes as $theme)
                                    <option value="{{ $theme->id }}"
                                            @if(isset($user->settings['theme']) && $user->settings['theme'] == $theme->id) selected @endif>
                                        {{ $theme->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="text-white pt-5">{{ __('Edit password') }}</legend>

                        <div class="form-group">
                            <label class="form-label text-white" for="password_old">{{ __('Old password') }}</label>
                            <input class="form-control" name="password_old" id="password_old" value="" type="password"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="password">{{ __('Password') }}</label>
                            <input class="form-control" name="password" id="password" value="" type="password"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white"
                                   for="password-confirmation">{{ __('Password confirmation') }}</label>
                            <input class="form-control" name="password_confirmation" id="password-confirmation" value=""
                                   type="password"/>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <button class="btn btn-lg btn-primary text-white" type="submit">{{ __('Save') }}</button>
                    </div>
                </form>

                <form method="post" action="{{ route('accounts.delete', ['user' => $user]) }}" class="form"
                      onsubmit="return confirm('{{ __('Do you really want to submit the form?') }}');">
                    @csrf
                    @method('delete')
                    <div class="form-group">
                        <button class="btn btn-lg btn-danger text-white"
                                type="submit">{{ __('Delete account') }}</button>
                    </div>
                </form>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('favorite-images.index') }}">{{ __("Favorite Images") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

