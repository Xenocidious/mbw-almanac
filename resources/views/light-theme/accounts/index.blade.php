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
                        <legend class="text-dark">{{ __('Profile picture') }}</legend>

                        <div class="row">
                            <div class="col">
                                @if ($user->photo)
                                    <img src="{{ asset('storage/profile-pictures/'.$user->photo) }}"
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
                            <input class="form-control" name="name" id="name" value="{{ $user->name }}" type="text"/>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="text-dark">{{ __('Settings') }}</legend>

                        <div class="form-group">
                            <input class="form-check-control" name="settings[dark-mode]" id="dark-mode"
                                   type="checkbox"
                                   @if (isset($user->settings['dark-mode']) && $user->settings['dark-mode'] === "on") checked @endif/>
                            <label class="form-check-label text-dark"
                                   for="password-confirmation">{{ __('Enable dark mode') }}</label>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="text-dark pt-5">{{ __('Edit password') }}</legend>

                        <div class="form-group">
                            <label class="form-label text-dark" for="password_old">{{ __('Old password') }}</label>
                            <input class="form-control" name="password_old" id="password_old" value="" type="password"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark" for="password">{{ __('Password') }}</label>
                            <input class="form-control" name="password" id="password" value="" type="password"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-dark"
                                   for="password-confirmation">{{ __('Password confirmation') }}</label>
                            <input class="form-control" name="password_confirmation" id="password-confirmation" value=""
                                   type="password"/>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <button class="btn btn-lg btn-primary" type="submit">{{ __('Save') }}</button>
                    </div>
                </form>

                <form method="post" action="{{ route('accounts.delete', ['user' => $user]) }}" class="form">
                    @csrf
                    @method('delete')
                    {{-- @todo confirmatie toevoegen als je hier op klikt dat je moet klikken op " weet je zeker dat je account wilt verwijderen? " --}}
                    <div class="form-group">
                        <button class="btn btn-lg btn-danger" type="submit">{{ __('Delete account') }}</button>
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

