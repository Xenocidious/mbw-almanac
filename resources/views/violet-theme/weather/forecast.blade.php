@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{ __('Forecast') }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="form" method="GET">
                    <div class="form-group">
                        <label for="days">{{ __('Show days') }}</label>
                        <input class="form-control" name="days" value="{{ $days }}" type="number" min="1"
                               max="{{ count($forecast['days']) }}"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Show amount of days</button>
                </form>
            </div>
        </div>

        <div class="row">
            {{-- for loop is beter dan foreach omdat we daarmee het maximaal aantal dagen beter kunnen controleren. --}}
            @for($i = 0; $i < $days; $i++)
                @if ($i%4 === 0)
        </div>
        <div class="row">
            @endif
            <div class="col-md-3 my-3">
                {{-- laat forecast zien van $forecast['days'][$i] --}}
                <div class="card">
                    <div class="card-body text-dark">
                        <h5 class="card-title text-dark">
                            <strong class="my-2">
                                @switch(true)
                                    @case(stripos($forecast['days'][$i]['description'], 'sun') !== false)
                                    <i class="fas fa-sun fa-5x"></i>
                                    @break
                                    @case(stripos($forecast['days'][$i]['description'], 'rain') !== false)
                                    <i class="fas fa-cloud-rain fa-5x"></i>
                                    @break
                                    @case(stripos($forecast['days'][$i]['description'], 'fog') !== false)
                                    <i class="fas fa-smog fa-5x"></i>
                                    @break
                                    @case(stripos($forecast['days'][$i]['description'], 'cloud') !== false)
                                    <i class="fas fa-cloud fa-5x"></i>
                                    @break
                                @endswitch
                            </strong>
                            <br/><br/>
                            <strong>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $forecast['days'][$i]['datetime'])->format('d-m-Y') }}
                            </strong>
                            <br/><br/>
                            {{ $forecast['days'][$i]['description'] }}
                        </h5>
                        <p class="card-text text-dark">{{ $forecast['days'][$i]['tempmin'] }}&#176;C
                            - {{ $forecast['days'][$i]['tempmax'] }}&#176;C</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#details-modal-{{$i}}">
                            Show details
                        </button>
                    </div>
                </div>
            </div>

            {{-- modals toevoegen voor details --}}
            <div class="modal fade" id="details-modal-{{$i}}" tabindex="-1" role="dialog"
                 aria-labelledby="details-modal-label-{{$i}}"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="details-modal-label-{{$i}}">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark">
                            <dl class="row">
                                @foreach ($forecast['days'][$i] as $key => $value)
                                    @if (!is_array($value))
                                        <dt class="col-sm-3">{{ $key }}</dt>
                                        <dd class="col-sm-9">{{ $value }}</dd>
                                    @endif
                                @endforeach
                            </dl>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            @endfor
        </div>
    </div>
@endsection
