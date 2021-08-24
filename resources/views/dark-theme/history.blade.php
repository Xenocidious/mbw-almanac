@extends('layouts.app')

@section('content')

    <div class="container">

        <div id='spacefiller'></div>
        <div id='spacefiller'></div>
        <div id='spacefiller'></div>

        <form action="{{Route('get.date')}}" autocomplete="off">
            {{  Form::text('date', '', array('id' => 'datepicker')) }}

            <input type="submit" value="Submit">
        </form>

        @if (isset($fetchedDate))
            @foreach ($fetchedDate as $item)
                <div id='index_cards_wrapper_card_1' class='index_cards'>
                    <div>
                        <h2>{{$weekDay}}</h2>
                        <h6>{{$fetchedDate[0]['datetime']}}</h6>
                        <h2>{{$fetchedDate[0]['tempmax']}}°</h2>
                        <h3>{{$fetchedDate[0]['conditions']}}</h3>
                        <h5>{{$fetchedDate[0]['description']}}</h5>
                    </div>
                    <button onclick="toggleExpandedData()"><i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div id="expandedData">
                        <h3>Max: {{$fetchedDate[0]['tempmax']}}°</h3>
                        <h3>Min: {{$fetchedDate[0]['tempmin']}}°</h3>
                        <h3>Feels like: {{$fetchedDate[0]['feelslikemax']}}°</h3>
                        <h3>Windspeed: {{$fetchedDate[0]['windspeed']}}km/h</h3>
                        <h3>Humidity: {{$fetchedDate[0]['humidity']}}</h3>
                        <h3>Sunrise: {{$fetchedDate[0]['sunrise']}}</h3>
                        <h3>Sunrise: {{$fetchedDate[0]['sunset']}}</h3>
                    </div>
                </div>
            @endforeach
        @else
        @endif

        <div id='spacefiller'></div>
        <div id='spacefiller'></div>
        <div id='spacefiller'></div>


    </div>
@endsection
