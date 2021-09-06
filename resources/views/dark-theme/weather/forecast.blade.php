@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-light">{{ __('Forecast') }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="form" method="GET">
                    <div class="form-group">
                        <label for="start" class="text-light">{{ __('From') }}</label>
                        <input class="form-control" id="start" name="start" value="{{ $start }}" type="datetime-local"
                               step="1"/>
                    </div>
                    <div class="form-group">
                        <label for="end" class="text-light">{{ __('Until') }}</label>
                        <input class="form-control" id="end" name="end" value="{{ $end }}" type="datetime-local"
                               step="1"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Load information</button>
                </form>
            </div>
        </div>

        @if(!empty($error))
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger">
                        <p>{{ $error }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                {{-- for loop is beter dan foreach omdat we daarmee het maximaal aantal dagen beter kunnen controleren. --}}
                @for($i = 0; $i < count($forecast['days']); $i++)
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
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h5 class="modal-title text-light" id="details-modal-label-{{$i}}">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-light">
                                <dl class="row">
                                    @foreach ($forecast['days'][$i] as $key => $value)
                                        @if (!is_array($value))
                                            <dt class="col-sm-4">{{ ucfirst(Illuminate\Support\Str::of($key)->split('/(?=[A-Z])/')->join(' ')) }}</dt>
                                            <dd class="col-sm-8">{{ $value }}</dd>
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
        @endif
    </div>
@endsection
