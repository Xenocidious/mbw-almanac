@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($images as $image)
                    <img src="data:image/png;base64, {{ $image->image }}" alt=""/>
                    <form method="post" action="{{ route('favorite-images.destroy', ['favorite_image' => $image]) }}"
                          onsubmit="return confirm('{{ __('Do you really want to submit the form?') }}');">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                    </form>
                @endforeach
            </div>
            <div class="col-md-4">
                <form class="form" method="post" action="{{ route('favorite-images.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <label class="form-label" for="image">{{ __('Add a favorite image') }}</label>
                    <input class="form-control-file" name="image" id="image" type="file"/>

                    <button type="submit" class="btn btn-primary btn-large">{{ __('Save image') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
