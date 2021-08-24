@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{ __('Forecast') }}</h2>
            </div>
        </div>

        <div class="row">
            {{-- for loop is sneller omdat we daarmee het maximaal aantal dagen beter kunnen controleren. --}}
            @for($i = 0; $i < $days; $i++)
                @if ($i%4 === 0)
        </div>
        <div class="row">
            @endif
            <div class="col-md-3 my-3">
                {{-- laat forecast zien van $forecast['days'][$i] --}}
                <div class="card">
                    {{--            <img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body text-dark">
                        <h5 class="card-title text-dark">
                            <strong>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $forecast['days'][$i]['datetime'])->format('d-m-Y') }}
                            </strong>
                            <br/>
                            {{ $forecast['days'][$i]['description'] }}
                        </h5>
                        <p class="card-text text-dark">{{ $forecast['days'][$i]['tempmin'] }}&#176;C
                            - {{ $forecast['days'][$i]['tempmax'] }}&#176;C</p>
                        <a href="#" class="btn btn-primary" onclick="alert('Nog maken, doet het nog niet');">Show
                            details</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>

    </div>
@endsection
