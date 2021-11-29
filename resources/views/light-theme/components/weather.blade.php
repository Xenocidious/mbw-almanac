<div id="{{ $id }}" class="small-box bg-info background-green">
    <div class="inner">
        <h3>{{ $city }}</h3>
        <h3>
            @if (\Carbon\Carbon::createFromTimestamp($startDate)->isToday())
                Today,
            @elseif(\Carbon\Carbon::createFromTimestamp($startDate)->isYesterday())
                Yesterday,
            @elseif(\Carbon\Carbon::createFromTimestamp($startDate)->isTomorrow())
                Tomorrow,
            @endif
            <span class="degrees"></span>&deg;
        </h3>
        <p>{{ \Carbon\Carbon::createFromTimestamp($startDate)->format('l') }}</p>
    </div>
    <div class="icon">
        <i class="fas fa-5x"></i>
    </div>
    <a href="#" class="small-box-footer"> More info
        <i class="fas fa-arrow-circle-right"></i>
    </a>
</div>

@section('javascripts')
    @parent

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "{{ route('weather.json') }}",
                data: {
                    city: "{{ $city }}",
                    startDate: "{{ $startDate }}",
                    endDate: "{{ $endDate }}"
                },
                dataType: 'json',
                success: function (data) {
                    let classname = '';
                    $("#{{ $id }}").find(".degrees").html(data.days[0].tempmax);

                    switch (true) {
                        default:
                        case (data.days[0].conditions.toLowerCase().indexOf('sun')):
                            classname = 'fa-sun'
                            break;
                        case (data.days[0].conditions.toLowerCase().indexOf('rain')):
                            classname = 'fa-cloud-rain'
                            break;
                        case (data.days[0].conditions.toLowerCase().indexOf('fog')):
                            classname = 'fa-fog'
                            break;
                        case (data.days[0].conditions.toLowerCase().indexOf('cloud')):
                            classname = 'fa-cloud'
                            break;
                    }

                    $("#{{ $id }}").find(".icon i").addClass(classname);
                }
            });
        });
    </script>
@endsection
