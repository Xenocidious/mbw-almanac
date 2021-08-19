@extends('layouts.app')

@section('content')

    <div class="container">
        <div id='content_statistics'>

            <div id="curve_chart" style="width: 900px; height: 500px"></div>

        </div>
    </div>
@endsection

@section('body-scripts')
    @parent()
    {{--    @TODO javascript verplaatsen van public naar resources folder en compilen met NPM in app.js in plaats van in public map handmatig zetten --}}
    <script src='../resources/js/animations_index.js'></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src='../resources/js/chart_test.js'></script>
@endsection
