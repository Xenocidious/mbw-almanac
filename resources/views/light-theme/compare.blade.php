@extends('layouts.app')

@section('content')
    <div class="wrapper" style="margin-top:80px;">
        <div class="container-fluid">
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-4 col-4">
                            <x-weather
                                :start-date="strtotime('yesterday')"
                                :end-date="strtotime('yesterday')"
                            />
                        </div>
                        <div class="col-lg-4 col-4">
                            <x-weather
                                :start-date="strtotime('now')"
                                :end-date="strtotime('now')"/>
                        </div>
                        <div class="col-lg-4 col-4">
                            <x-weather
                                :start-date="strtotime('tomorrow')"
                                :end-date="strtotime('tomorrow')"/>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
