@extends('home.layouts._app')
@section('styles')
    <!-- timeline-horizontal-vertical -->
    <link href="{{ asset('home/js/timeline-horizontal-vertical/css/timeline-horizontal-vertical-rtl.css') }}" rel="stylesheet"
        type="text/css">
    <script src="{{ asset('home/js/timeline-horizontal-vertical/js/timeline-horizontal-vertical.min.js') }}"></script>
    <script src="{{ asset('home/js/timeline-horizontal-vertical/js/custom.js') }}"></script>
@endsection
@section('content')
    <!-- Start main-content -->
    <div class="main-content-area">

        <!-- Section: page title -->
        <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
            data-tm-bg-img="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}" style="margin-top: 95px; background-size: cover;">
            <div class="container pt-50 pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">ما هو الطب الشمولي؟</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="section-content">

                    @foreach ($integrativeMedicines as $index => $integrativeMedicine)
                        @if (!$integrativeMedicine->header)
                            @if ($index % 2 == 0)
                                <div class="row" style="margin-top: 50px">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <p>{!! $integrativeMedicine->content !!}</p>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                    @if ($integrativeMedicine->image)
                                        <div class="">
                                            <div class="effect-wrapper">
                                                <div class="thumb">
                                                    <img class="w-100" src="{{ asset($integrativeMedicine->image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            @else
                                <div class="row" style="margin-top: 50px">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        @if ($integrativeMedicine->image)
                                        <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-button-over-image">
                                            <div class="effect-wrapper">
                                                <div class="thumb">
                                                    <img class="w-100" src="{{ asset($integrativeMedicine->image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <p>{!! $integrativeMedicine->content !!}</p>
                                    </div>
                                </div>
                            @endif
                        @else
                        <div class="row" style="margin-top: 50px">
                            <div class="col-md-12 col-lg-12 col-xl-12"  style="
                            /* border: #4a5a73 3px solid;
                            border-radius: 25px; */
                            padding: 15px 25px; margin-bottom: 35px">
                                <p>{!! $integrativeMedicine->content !!}</p>
                            </div>
                            @if ($integrativeMedicine->image)
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-button-over-image">
                                    <div class="effect-wrapper">
                                        <div class="thumb">
                                            <img class="w-100" src="{{ $integrativeMedicine->image }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif
                        </div>
                        @endif
                    @endforeach
                    <div class="row" style="margin-top: 50px">
                        <div class="col-md-12">
                          <div class="accordion tm-accordion accordion-classic" id="accordion200">

                            <div class="accordion-item">
                              <h2 class="accordion-header" id="heading201">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse201" aria-expanded=" true" aria-controls="collapse201">
                                  <strong style="  width: 100%;
                                  text-align: right;">المبادئ الشائعة في العلاج الشمولي</strong>
                                </button>
                              </h2>
                              <div id="collapse201" class="accordion-collapse collapse " aria-labelledby="heading201" data-bs-parent="#accordion200">
                                <div class="accordion-body">
                                    ·	اليقين بأن جميع الناس وُلدوا بقدرات علاجية فطريّة.<br>
                                    ·	الإيمان بأن الطبيب والمريض يعملان معاً لمعالجة جميع أقسام الحياة التي تؤثر على الصحة البدنية والعافية الروحية.<br>
                                    ·	العمل وفق فلسفة معالجة المريض باعتباره إنساناً، لا مَرَضاً.<br>
                                    ·	التركيز على شفاء سبب العلة، لا تخفيف الأعراض وحسب.<br>
                                    ·	التركيز على العلاقة بين العقل والجسد لمعالجة الشخص بالكامل.<br>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="row" style="margin-top: 25px">
                        <div class="col-md-12 col-lg-6 col-xl-6">

                            <a class="btn btn-dark btn-theme-colored1 text-uppercase mt-30"
                            href="{{ route('faqs') }}">الاسئلة الشائعة</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tm-timeline-horizontal-vertical" data-tm-mode="vertical"
                            data-tm-vertical-start-position="right" data-tm-vertical-trigger="250px">
                            <div class="timeline__wrap">

                                <div class="timeline__items">
                                    @foreach ($integrativeMedicines as $integrativeMedicine)
                                        <div class="timeline__item">
                                            <div class="timeline__content">

                                                <div class="thumb"
                                                    style="display: flex;
                                            align-items: center;
                                            justify-content: center;">
                                                    <img src="{{ asset($integrativeMedicine->image) }}" alt="">
                                                </div>
                                                <p>{!! $integrativeMedicine->content !!}</p>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


    </div>
    <!-- end main-content -->
@endsection
