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
    <a href="#" class="small-box-footer"
       data-toggle="modal"
       data-target="#details-modal-{{ $id }}">
        More info
        <i class="fas fa-arrow-circle-right"></i>
    </a>
</div>

{{-- modals toevoegen voor details --}}
<div class="modal fade"
     id="details-modal-{{ $id }}"
     tabindex="-1"
     role="dialog"
     aria-labelledby="details-modal-label-{{ $id }}"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="details-modal-label-{{ $id }}">
                    {{ __('Details') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
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
                    let classname = '', info = '';
                    $("#{{ $id }}").find(".degrees").html(data[0].tempmax);

                    if (!Array.isArray(data)) {
                        return;
                    }

                    switch (true) {
                        case (data[0].conditions.toLowerCase().indexOf('sun') !== -1):
                        default:
                            classname = 'fa-sun'
                            break;
                        case (data[0].conditions.toLowerCase().indexOf('rain') !== -1):
                            classname = 'fa-cloud-rain'
                            break;
                        case (data[0].conditions.toLowerCase().indexOf('fog') !== -1):
                            classname = 'fa-fog'
                            break;
                        case (data[0].conditions.toLowerCase().indexOf('cloud') !== -1):
                            classname = 'fa-cloud'
                            break;
                    }

                    $("#{{ $id }}").find(".icon i").addClass(classname);

                    $.each(data[0], function (key, value) {
                        if (typeof value === 'undefined'
                            || typeof value === 'object'
                            || value === null
                            || typeof key === 'undefined'
                            || typeof key === 'object'
                            || key === null
                        ) {
                            return;
                        }

                        if (Array.isArray(value)) {
                            value = value.join(', ');
                        }

                        info += `<dl class="row"><dt class="col-sm-3">${key}</dt><dd class="col-sm-9">${value}</dd></dl>`
                    });

                    if (info !== '') {
                        $("#details-modal-{{ $id }}").find('.modal-body').html(info);
                    }
                }
            });
        });
    </script>
@endsection
