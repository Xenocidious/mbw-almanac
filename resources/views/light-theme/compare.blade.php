@extends('layouts.app')

@section('content')
    <div class="wrapper" style="margin-top:80px;">
        <div class="container-fluid">
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('compare') }}" method="get">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Select first date') }}</label>
                                    <input type="datetime-local" name="first-date" value="{{ $first }}"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Select second date') }}</label>
                                    <input type="datetime-local" name="second-date" value="{{ $second }}"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('Compare') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @if ($first && $second)
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <x-weather :city="'gorinchem'"
                                           :start-date="strtotime($first)"
                                           :end-date="strtotime($first)"/>
                            </div>
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <x-weather :city="'gorinchem'"
                                           :start-date="strtotime($second)"
                                           :end-date="strtotime($second)"/>
                            </div>
                        @else
                            <p>
                                {{ __('Select dates to compare to continue') }}
                            </p>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
