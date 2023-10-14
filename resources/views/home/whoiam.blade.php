@extends('home.layouts._app')
@section('styles')
    <!-- timeline-horizontal-vertical -->
    <link href="{{ asset('home/js/timeline-horizontal-vertical/css/timeline-horizontal-vertical-rtl.css') }}" rel="stylesheet"
        type="text/css">
    <script src="{{ asset('home/js/timeline-horizontal-vertical/js/timeline-horizontal-vertical.min.js') }}"></script>
    <script src="{{ asset('home/js/timeline-horizontal-vertical/js/custom.js') }}"></script>

    <style>
        #above {
            padding-top: 200px
        }

        #tintro {
            padding-right: 100px;
        }

        @media only screen and (max-width: 500px) {
            #above {
                padding-top: 125px
            }

            #tintro {
                padding-right: 10px;
            }

            #container {
                padding-top: 25px !important;
            }

            .col-md-5>img {
                margin-top: 0px !important;
            }

            #goal {
                padding: 15px;
            }
        }

        @media only screen and (max-width: 990px) {
            #tintro {
                padding-right: 35px;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Start main-content -->
    <div class="main-content-area">



        <!-- Section: welcome -->
        <section id="welcome" class="divider parallax " style="background: #cee1e3">
            <div class="container pt-150 pb-150" style="  padding-left: 25px;
            padding-right: 25px;">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('dr2.jpeg') }}" alt=""
                                style="border: 12px solid white;
                           ">
                        </div>
                        <div class="col-md-7">
                            <p class="lead text-black">{!! $about->about_me !!}</p>
                            <a href="{{ route('whoiam') }}" target="_self"
                                class="btn btn-dark btn-theme-colored2 btn-sm btn-block mt-15 mb-20"> قراءة المزيد </a>

                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="">
                                <div class="timeline__items">
                                    @foreach ($whoiams as $index => $whoiam)
                                        <div class="timeline__item" style="margin-top: 25px">
                                            <div class="timeline__content">
                                                @if ($whoiam->start_date)
                                                    <div
                                                        style="display: flex;
                                                            align-items: center;
                                                            justify-content: center;">
                                                        <h4
                                                            style="background: #ffa0a2;
                                                        padding: 22px;
                                                        border-radius: 50%;
                                                        width: 95px;
                                                        height: 95px;margin-bottom: 0;">
                                                            {{ date('Y', strtotime($whoiam->start_date)) }} -
                                                            {{ date('Y', strtotime($whoiam->end_date)) }}
                                                        </h4>


                                                    </div>
                                                    <div class="row" style="  justify-content: center;">

                                                        <img src="{{ asset('icon/tour/1.png') }}" alt=""
                                                            style="  width: 60px;">
                                                    </div>
                                                @endif
                                                @if ($whoiam->image == null)
                                                    <div class="col-md-12" style="background: #f2fffd;padding: 25px 50px;">
                                                        <h4>{{ $whoiam->title }}</h4>
                                                        <p>{!! $whoiam->content !!}</p>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        @if ($index % 2 == 0)
                                                            <div class="col-md-6" style="  align-self: center;">
                                                                <h4>{{ $whoiam->title }}</h4>
                                                                <p>{!! $whoiam->content !!}</p>
                                                            </div>
                                                            <div class="col-md-6" style="align-self: center;">
                                                                <div class="thumb"
                                                                    style="display: flex;
                                                                    align-items: center;
                                                                    justify-content: center;">
                                                                    <img src="{{ asset($whoiam->image) }}" alt=""
                                                                        style="border: 2px solid #eaeae2;
                                                                    padding: 2px;">
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-md-6" style="align-self: center;">
                                                                <div class="thumb"
                                                                    style="display: flex;
                                                                align-items: center;
                                                                justify-content: center;">

                                                                        <img src="{{ asset($whoiam->image) }}"
                                                                            alt=""
                                                                            style="height: 250px; border: 2px solid #eaeae2;
                                                                            padding: 2px;">

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" style="align-self: center;">

                                                                    <div class="row">
                                                                        <h4>
                                                                            {{ $whoiam->title }}
                                                                        </h4>
                                                                        <p>{!! $whoiam->content !!}</p>
                                                                    </div>

                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
    <!-- end main-content -->
@endsection
