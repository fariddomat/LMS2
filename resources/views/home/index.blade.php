@extends('home.layouts._app')
@section('styles')
    <style>
        .badge {

            background: #A8CDD1;
            font-size: 16px;
            padding: 5px 15px;

        }

        .sStyleShadow {
            box-shadow: 12px 12px 6px -6px #A8CDD1;
            -webkit-box-shadow: 12px 12px 6px -6px #A8CDD1;
            -moz-box-shadow: 12px 12px 6px -6px #A8CDD1;
        }

        .course-item .course-thumb .price {
            background: #A8CDD1;
        }


        /*===== call action one =====*/
        .call-action-one {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .call-action-one .call-action-content .call-action-text {
            margin-top: 0px;
        }

        .call-action-one .call-action-content .call-action-text .action-title {
            font-weight: 600;
            color: var(--black);
        }

        .call-action-one .call-action-content .call-action-text .text-lg {
            color: var(--dark-3);
            margin-top: 16px;
        }

        .call-action-one .call-action-content .call-action-btn {
            margin-top: 50px;
        }

        @media only screen and (max-width: 500px) {

            .pr-100 {
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .row,
            .col-lg-6 {
                padding-left: 0px !important;
                padding-right: 10px !important;
            }

            h3 {
                padding: 0 10px !important;
            }
        }

        .curved-div {
            background: #f2fffd;
        }
    </style>
@endsection
@section('content')
    <!-- Start main-content -->

    <div class="main-content-area">
        <!-- Section: home -->
        <div class="curved-div">

            <section id="home" class="">
                <div class="container" style="padding-bottom: 50px">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="container pt-80 pr-100 ">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="pb-50 pt-30">
                                                <h2 style="font-family: Candal, Sans-serif;
                                                    font-size: 45px;
                                                    font-weight: bold;"
                                                    class="wow bounceInUp">
                                                    Mellow Minds
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (setting('cta_text') != '')
                            <div class="col-md-12">
                                <!--====== CALL TO ACTION ONE PART START ======-->
                                <section class="call-action-area call-action-one">
                                    <div class="container" style="
                                    padding-top: 0px;">
                                        <div class="row align-items-center call-action-content">
                                            <div class="col-xl-8 col-lg-8">
                                                <div class="call-action-text">
                                                    <h2 class="action-title">
                                                        {{ setting('cta_title') }}
                                                    </h2>
                                                    <p class="text-lg">
                                                        {{setting('cta_text')}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="call-action-btn rounded-buttons text-lg-end">
                                                    <a href="{{ setting('cta') }}" class="btn btn-dark btn-theme-colored1 rounded-full">
                                                       {{ setting('cta_name') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row -->
                                    </div>
                                    <!-- container -->
                                </section>
                                <!--====== CALL TO ACTION ONE PART ENDS ======-->
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="pb-50 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <h3 class="">{!! setting('cover1_text') !!}</h3>
                                    <h1 class="">{!! setting('cover2_text') !!}</h1>
                                    <h4 class="">{!! setting('cover3_text') !!} </h4>

                                </div>
                            </div>
                            <div class="col-md-6" style="justify-content: center">
                                <div class="pb-50 pt-20 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s"
                                    style="text-align: center">
                                    <img class="hvr-grow"
                                        src="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}"
                                        alt=""
                                        style="border: 12px solid #cee1e3; border-radius: 15px;max-width: 75%;">

                                </div>
                            </div>

                        </div>
                    </div>
            </section>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#cee1e3" fill-opacity="1"
                    d="M0,192L34.3,208C68.6,224,137,256,206,250.7C274.3,245,343,203,411,192C480,181,549,203,617,192C685.7,181,754,139,823,138.7C891.4,139,960,181,1029,170.7C1097.1,160,1166,96,1234,74.7C1302.9,53,1371,75,1406,85.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>
        </div>
        <section id="welcome" class="divider parallax " style="background: #cee1e3">
            <div class="container pt-50 pb-50" style="  padding-left: 25px;
                 padding-right: 25px;">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-5  wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            <img class="hvr-grow" src="{{ asset('dr2.jpeg') }}" alt=""
                                style="border: 12px solid white;
                           ">
                        </div>
                        <div class="col-md-7 wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0.8s">
                            <p class="lead text-black">{!! $about->about_me !!}</p>
                            <a href="{{ route('whoiam') }}" target="_self"
                                class="btn btn-dark btn-theme-colored2 btn-sm btn-block mt-15 mb-20 hvr-grow"> قراءة
                                المزيد
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Section: welcome -->
        <div class="curved-div" style="background: #cee1e3">
            {{--
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff" fill-opacity="1"
                    d="M0,224L60,197.3C120,171,240,117,360,122.7C480,128,600,192,720,202.7C840,213,960,171,1080,149.3C1200,128,1320,128,1380,128L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg> --}}
            <!-- Section: Courses -->
            <section id="services" class="divider parallax layer-overlay overlay-white-8" data-parallax-ratio="0.1"
                data-tm-bg-img="{{ asset('home/images/courses.jpg') }}">
                <div class="container pt-150 pb-150  wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-uppercase title"> <span class="text-theme-colored font-weight-300">
                                        الدورات التدريبية</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="section-content pt-50">
                        <div class="row multi-row-clearfix" style="justify-content: center">
                            @foreach ($courses_count as $course)
                                <div class="col-sm-6 col-md-4 hvr-grow">
                                    <div class="course-item mb-30 bg-white border-1px">
                                        <div class="course-thumb"><a href="{{ route('courses.show', $course->title) }}">
                                                <img alt="featured project" src="{{ $course->thumbnail_url }}"
                                                    class="w-100">
                                            </a>
                                            @auth
                                                @if (Auth::user()->enrollments->count() == 0)
                                                    <h4 class="price mt-0 mb-0">{{ $course->price }}</h4>
                                                @endif
                                            @else
                                                <h4 class="price mt-0 mb-0">{{ $course->price }}</h4>
                                            @endauth
                                        </div>
                                        <div class="content text-left flip p-25 pt-0">
                                            <h4 class="line-bottom line-bottom-theme-colored1 mb-30 pb-0"
                                                style="  min-height: 55px;">
                                                <a href="{{ route('courses.show', $course->title) }}">
                                                    {{ $course->title }}
                                                </a>
                                            </h4>
                                            <p style="min-height: 130px;margin-bottom:0;">{{ $course->description }}</p>
                                            <div class="row" style="text-align: center"><a
                                                    class="btn btn-dark btn-theme-colored2 btn-xs text-uppercase mt-10"
                                                    href="{{ route('courses.show', $course->title) }}"
                                                    style="margin: 0 auto;
                                    max-width: 170px;">التفاصيل</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-4" style="text-align: center">
                                <a href="{{ route('courses.index') }}"
                                    class="btn btn-dark btn-theme-colored2 btn-lg btn-block mt-15 mb-20">شاهد كل
                                    الدورات</a>
                            </div>
                        </div>
                    </div>

                    <div class="section-title text-center pt-100">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-uppercase title"> <span class="text-theme-colored font-weight-300">
                                        يمكنك الاستفادة أيضاً من المواد التعليمية المجانية</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="section-content pt-50">
                        <div class="row multi-row-clearfix" style="justify-content: center">
                            @foreach ($materials as $material)
                                <div class="col-sm-6 col-md-3  hvr-grow">
                                    <div class="course-item mb-30 border-1px">
                                        <div class="course-thumb">
                                            @if ($material->price == 0)
                                                <a href="{{ asset('materials/' . $material->file) }}" download="">
                                                    <span class="badge badge-success"
                                                        style="background:#A8CDD1;position: absolute;">
                                                        مجاني
                                                    </span><img alt="featured project"
                                                        src="{{ asset('materials/' . $material->img) }}"
                                                        class="w-100"></a>
                                            @else
                                                <a
                                                    href="{{ route('materials.create', ['material_id' => $material->id]) }}">
                                                    <span class="badge badge-success"
                                                        style="background:#A8CDD1;position: absolute;">
                                                        {{ $material->price }} $
                                                    </span><img alt="featured project"
                                                        src="{{ asset('materials/' . $material->img) }}"
                                                        class="w-100"></a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="z-index-1">
            <div class="container">
                <div class="section-content">
                    {{-- 3 --}}
                    <div class="row" style="margin-bottom: 75px ;">
                        <div class="row">
                            <div class="col-lg-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                                <div class="col-md-12 academy3 m-3" style="background: #A8CDD1;padding-top: 50px;">

                                    <h2 style="height: 75px;
                                padding-top: 25px;">
                                        رسالتنا</h2>
                                    <h3 style="text-align: justify;padding: 0 45px;">
                                        {!! $about->massage !!}</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s"
                                style="display: flex;
                            align-items: center; justify-content: center">
                                <img src="{{ asset('home/images/message.jpg') }}" alt="" style="max-width: 75%;"
                                    class="sStyleShadow">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s"
                                style="display: flex;
                                 align-items: center; justify-content: center">
                                <img src="{{ asset('home/images/vision.jpg') }}" alt="" style="max-width: 65%;"
                                    class="sStyleShadow">
                            </div>
                            <div class="col-lg-6  wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                                <div class="col-md-12 academy3 m-3" style="background: #A8CDD1;padding-top: 50px;">
                                    <h2
                                        style="height: 75px;
                                            padding-top: 25px;">
                                        رؤيتنا</h2>
                                    <h3 style="text-align: justify;padding: 0 45px;">
                                        {!! $about->vision !!}</h3>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">

                            <div class="col-lg-6  wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                                <div class="col-md-12 academy3 m-3"
                                    style="background: #ffcbbd;min-height: 450px !important;padding-top: 50px;">
                                    <h2 style="height: 75px;
                                    padding-top: 25px;">
                                        قيمنا</h2>
                                    <h3 style="text-align: justify;padding: 0 45px;">
                                        {!! $about->ambition !!}
                                    </h3>
                                </div>
                            </div>

                            <div class="col-lg-6 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s"
                                style="display: flex;
                            align-items: center;">
                                <img src="{{ asset('home/images/values.jpg') }}" alt=""
                                    style="border-radius: 35%">
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>
        </section>



    </div>
@endsection
