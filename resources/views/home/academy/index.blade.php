@extends('home.layouts._app')

@section('styles')
    <style>

strong {
  font-weight: bold !important;
}
        .academy3 {
            min-height: 525px !important
        }

        .dot {
            height: 15px;
            width: 15px;
            border: 2px #f4a3a5 solid;
            border-radius: 50%;
            display: inline-block;
        }

        .main-content-area table td {
            padding: 0px !important;
            border: unset !important;
        }

        @media only screen and (max-width: 550px) {
            .mmin {
                min-width: auto !important;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Start main-content -->
    <div class="main-content-area">
        <!-- Section: page title -->
        {{-- <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
            data-tm-bg-img="{{ asset('header.webp') }}?v={{ setting('cover_time') }}"
            style="margin-top: 95px; background-size: cover;">
            <div class="container pt-50 pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">أكاديمية مدربي العافية الشمولية</h2>

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Section: about -->
        <section id="academy">
            <div class="container" style="padding-top: 95px;">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="row" style="justify-content: center">
                            <img src="{{ asset('academylogo.png') }}" style="width: auto; padding: 0;" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h3 class=" mt-0 mt-sm-30 mb-2" style=" color: #375651 !important;"> الأكاديمية <img
                                src="{{ asset('academyheart.png') }}" alt=""></h3>
                        <h2 class="text-theme-colored2 mt-0">{!! $academy->ar_title !!} </h2>
                        <h2 class="text-theme-colored2 mt-0">{!! $academy->en_title !!}</h2>
                        <p class="font-weight-600">{!! $academy->header !!}</p>
                        <p class="mt-20">{!! $academy->about !!}
                        </p>
                        <div class="col-md-12 text-center">


                            @if (!Auth::user())
                                <table>
                                    <tr>

                                        <td></td>
                                        <td></td>
                                        <td class="Janna">
                                            إذا كان لديك حساب
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="btn btn-dark btn-theme-colored3 btn-sm text-uppercase mt-30 mmin Janna"
                                                href="{{ route('courses.index') }}"
                                                style="  min-width: 125px;
                                    ">الدورات</a>
                                        </td>
                                        <td><a class="btn btn-dark btn-block btn-sm btn-theme-colored3 text-uppercase  mt-30 mmin Janna"
                                                href="{{ route('profiles.create') }}"
                                                style="  min-width: 125px;
                                ">سجل الآن</a>
                                        </td>
                                        <td><a class="btn btn-dark btn-block btn-sm   btn-theme-colored2  text-uppercase mt-30 haveAccount2 mmin Janna"
                                                href="{{ route('login') }}"
                                                style="  min-width: 125px;
                                ">دخول</a></td>
                                    </tr>
                                </table>
                            @else
                                <a class="btn btn-dark btn-theme-colored3 btn-sm text-uppercase mt-30 mmin Janna"
                                    href="{{ route('courses.index') }}"
                                    style="  min-width: 125px;
                                    ">الدورات</a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- Section: About -->
        <section class="z-index-1" id="academy2">
            <div class="container">
                <div class="section-content">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title text-theme-colored1 mt-0 mb-0" style="font-size: 3.4rem;">أكاديميــة هوليستك
                            </h2>
                            <h2 class="title text-theme-colored2 mt-0 mb-20 Janna">لتدريب مدربين العافية
                                الشمولية
                            </h2>
                            <span
                                style="margin-top: 50px; float: right;
                                width: 100%;
                                text-align: right;"><span
                                    class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span></span>
                            <div class="row shadowBlock"
                                style="
                                background: #fff;
                                padding: 50px 0px;
                                box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                -webkit-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                -moz-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                              ">
                                <div class="col-md-12" style="padding: 0 75px">
                                    {!! $academy->content !!}
                                </div>
                            </div>
                            <span style="  float: left; margin-top: 25px"><span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span></span>




                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="z-index-1">
            <div class="container">
                <div class="section-content">
                    {{-- 3 --}}
                    <div class="row" style="margin-bottom: 75px ;background: #fff;">
                        <div class="col-lg-4">
                            <div class="col-md-12 academy3 m-3" style="background: #375651">
                                <img src="{{ asset('icon/x1.png') }}" alt="" style="  height: 150px;">
                                <h2>التأصيل والتجذير</h2>
                                <h4 class="Janna" style="text-align: justify;padding: 0 25px;">نتعهد بإرشاد الطلبة حتى
                                    يصيروا
                                    معالجين شموليين وليفهموا ثم يعالجوا العوامل التي توجّه فهم العملاء وجودة حياتهم
                                    من خلال تبيُن ذواتهم الباطنية والبدء بالعلاج من الجذور</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <div class="col-md-12 academy3 m-3" style="background: #f4a3a5">
                                <img src="{{ asset('icon/x2.png') }}" alt="" style="  height: 150px;">
                                <h2>التــــوازن</h2>
                                <h4 class="Janna" style="text-align: justify;padding: 0 25px;">يقدّر مدربونا ويؤمنون بأن
                                    ممالك
                                    الذات
                                    الثلاث ينبغي أن تتواجد وتندمج معاً بتناغم إذا ما أراد المرء تحقيق ذاته الأعلى
                                    والأصدق. يفهمون الجانب متعدد الأبعاد من العافية، والذي يتضمن: البدنية والعقلية
                                    والشعورية والاجتماعية والثقافية والروحية، ويشجعون الضيوف على أن يكونوا منتبهين
                                    إلى
                                    التصرفات الدقيقة التي تحمل أثراً مستمراً على صحتهم الكُلية.</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <div class="col-md-12 academy3 m-3" style="background: #f9bb76">
                                <img src="{{ asset('icon/x3.png') }}" alt="" style="  height: 150px;">
                                <h2>الإتســـاع</h2>
                                <h4 class="Janna" style="text-align: justify;padding: 0 25px;">سيرأس مدربونا رحلة العملاء
                                    نحو
                                    العودة
                                    من العوامل الخارجية التي شوّشت صورتهم الداخلية، وسيعملون على إعادة إطلاق الذات
                                    الداخلية الأصلية بتعبيرها الأصدق والأقوى لتكون فوانيس تضيء مسيرتهم الجديدة
                                    كلياً.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Section: Funfacts -->
        <section class="" style="background: #f4a3a5">
            <div class="container pt-100 pb-100">
                <div class="section-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 col-xl-3">
                                <div class="funfact-item text-center mb-md-60">
                                    <img src="{{ asset('icon/m1.png') }}" alt=""
                                        style="background: #fff;
                                    border-radius: 50%;
                                    max-height: 85px;">
                                    <h2 class="text-white title font-weight-600 mb-0">الطلاب<h2>
                                            <h2 data-animation-duration="2000" data-value="{{ $profiles }}"
                                                class="text-white counter animate-number mt-0 mb-10">0</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3">
                                <div class="funfact-item text-center mb-md-60">
                                    <img src="{{ asset('icon/m2.png') }}" alt=""
                                        style="background: #fff;
                                    border-radius: 50%;
                                    max-height: 85px;">
                                    <h2 class="text-white title font-weight-600 mb-0">الدورات<h2>
                                            <h2 data-animation-duration="2000" data-value="{{ $courses }}"
                                                class="text-white counter animate-number mt-0 mb-10">0</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3">
                                <div class="funfact-item text-center mb-sm-60">
                                    <img src="{{ asset('icon/m3.png') }}" alt=""
                                        style="background: #fff;
                                    border-radius: 50%;
                                    max-height: 85px;">
                                    <h2 class="text-white title font-weight-600 mb-0">الدروس<h2>
                                            <h2 data-animation-duration="2000" data-value="{{ $lessons }}"
                                                class="text-white counter animate-number mt-0 mb-10">0</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3">
                                <div class="funfact-item text-center">
                                    <img src="{{ asset('icon/m4.png') }}" alt=""
                                        style="background: #fff;
                                    border-radius: 50%;
                                    max-height: 85px;">
                                    <h2 class="text-white title font-weight-600 mb-0">الخدمات<h2>
                                            <h2 data-animation-duration="2000"
                                                data-value="{{ $services_count->count() }}"
                                                class="text-white counter animate-number mt-0 mb-10">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section: About -->
        <section class="z-index-1" id="about4">
            <div class="container">
                <div class="section-content">

                    <div class="row">
                        <div class="col-md-12 text-center">

                            <div class="row">
                                <div class="col-md-12">


                                    <span
                                        style="margin-top: 50px; float: right;
                                    width: 100%;
                                    text-align: right;"><span
                                            class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <h1 class="title text-left text-theme-colored2 mt-0"
                                            style="color: #375651 !important;
                                  display: inline-block;
                                  padding-right: 25px;
                                  position: relative;
                                  top: -25px;">
                                            من نحن ؟
                                        </h1>
                                    </span>
                                    <div class="row shadowBlock"
                                        style="
                                    background: #fff;
                                    padding: 50px 0px;
                                    box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                    -webkit-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                    -moz-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                  ">
                                        <div class="col-md-12" style="padding: 0 75px">
                                            {!! $academy->who_are_we !!}
                                        </div>
                                    </div>
                                    <span style="  float: left; margin-top: 10px"><span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span></span>

                                </div>
                                <section class="z-index-1">
                                    <div class="container">
                                        <div class="section-content">
                                            {{-- 3 --}}
                                            <div class="row" style="margin-bottom: 75px ;">
                                                <div class="col-lg-4">
                                                    <div class="col-md-12 academy3 m-3"
                                                        style="background: #375651;min-height: 450px !important;padding-top: 50px;">

                                                        <h2
                                                            style="background-image: url({{ asset('icon/N1.png') }}); background-size: contain;
                                                        background-repeat: no-repeat;
                                                        background-position: center;
                                                        height: 75px;
                                                        padding-top: 25px;">
                                                            فلســـفتنا</h2>
                                                        <h3 style="text-align: justify;padding: 0 45px;">
                                                            {!! $academy->phylosofy !!}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 ">
                                                    <div class="col-md-12 academy3 m-3"
                                                        style="background: #f4a3a5;min-height: 450px !important;padding-top: 50px;">
                                                        <h2
                                                            style="background-image: url({{ asset('icon/N2.png') }}); background-size: contain;
                                                        background-repeat: no-repeat;
                                                        background-position: center;
                                                        height: 75px;
                                                        padding-top: 25px;">
                                                            رسـالتنـا</h2>
                                                        <h3 style="text-align: justify;padding: 0 45px;">
                                                            {!! $academy->message !!}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 ">
                                                    <div class="col-md-12 academy3 m-3"
                                                        style="background: #f9bb76;min-height: 450px !important;padding-top: 50px;">
                                                        <h2
                                                            style="background-image: url({{ asset('icon/N3.png') }}); background-size: contain;
                                                        background-repeat: no-repeat;
                                                        background-position: center;
                                                        height: 75px;
                                                        padding-top: 25px;">
                                                            رؤيتنـــا</h2>
                                                        <h3 style="text-align: justify;padding: 0 45px;">
                                                            {!! $academy->vision !!}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            </div>

                            <div class="row mt-20">
                                <div class="col-md-12">
                                    <h1 class="title text-left text-theme-colored1 mt-0 ttitle"
                                        style="  margin-bottom: 0;">من هو
                                        مدرب العافية الشمولية</h1>
                                    <span
                                        style="margin-top: 0;
                                        float: left;
                                        width: 100%;
                                        text-align: left;"><span
                                            class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span></span>
                                    <div class="row shadowBlock"
                                        style="
                                background: #fff;
                                padding: 50px 0px;
                                box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                -webkit-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                -moz-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                              ">
                                        <div class="col-md-12" style="padding: 0 75px">
                                            {!! $academy->how_is !!}
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-md-12">
                                    <h1 class="title text-left  text-theme-colored1 mt-3 ttitle"
                                        style="margin-top: 75px !important; margin-bottom: 0;width: 80%;">أهداف
                                        الأكاديمية <img src="{{ asset('icon/arrow.png') }}" alt=""
                                            style="height: 120px;
                                        margin-top: -27px;
                                        float: left;">
                                    </h1>
                                    <span
                                        style="margin-top: 0;
                                        float: left;
                                        width: 100%;
                                        text-align: left;"><span
                                            class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span></span>
                                    <div class="row shadowBlock"
                                        style="
                                background: #fff;
                                padding: 50px 0px;
                                box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                -webkit-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                -moz-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                              ">
                                        <div class="col-md-12" style="padding: 0 75px">
                                            {!! $academy->goals !!}
                                        </div>
                                    </div>

                                    <span style="  float: left; margin-top: 10px"><span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span></span>
                                </div>
                            </div>

                            <div class="row mt-20">
                                <div class="col-md-12">
                                    <h1 class="title text-left  text-theme-colored1 mt-0 ttitle"
                                        style="margin-top: 75px !important; margin-bottom: 0;">أساسيات المنهج<img
                                            src="{{ asset('icon/arrow2.png') }}" alt=""
                                            style="height: 120px;
                                        margin-top: -27px;
                                       margin-right: 150px;"
                                            class="tarrow">
                                    </h1>
                                    <span
                                        style="margin-top: 0;
                                        float: left;
                                        width: 100%;
                                        text-align: left;"><span
                                            class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span></span>
                                    <div class="row shadowBlock"
                                        style="
                                background: #fff;
                                padding: 50px 0px;
                                box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                -webkit-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                -moz-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
                              ">
                                        <div class="col-md-12" style="padding: 0 75px">
                                            {!! $academy->essential !!}
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section style="background: #fff">
            <div class="container">
                <div class="section-title">
                    <div class="row" style="justify-content: center">
                        <div class="col-lg-4 col-md-6" style="text-align: center">
                            <div class="row" style="justify-content: center; ">
                                <div class="row"
                                    style="justify-content: center;  justify-content: center;
                                padding-left: 8px;
                                padding-bottom: 18px;">
                                    <span class="dot" style="padding-left: 0px;margin-left: 7px;"></span>
                                </div>
                                <div class=""
                                    style="margin-left: 32px ;border-left: 4px solid #f4a3a5;
                                height: 35px;
                                width: 0px;">
                                </div>
                            </div>
                            <h3 class="title text-theme-colored1 mt-0" style="  font-size: 45px;">طريقــة<br> التعليـم
                            </h3>
                            <div class="row" style="justify-content: center;">
                                <div class=""
                                    style="margin-left: 32px ;border-left: 4px solid #f4a3a5;
                                height: 35px;
                                width: 0px;">
                                </div>
                            </div>
                            <div class="eyee"
                                style="background-size: cover ;background-image: url({{ asset('icon/q1.png') }}) ;padding-top: 40px;
height: 460px;">
                                <img src="{{ asset('icon/i1.png') }}"
                                    style="max-width: 135px;
                                margin-top: 50px;"
                                    alt="">
                                {!! $academy->education_way !!}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" style="text-align: center">
                            <div class="row" style="justify-content: center; ">
                                <div class="row"
                                    style="justify-content: center;  justify-content: center;
                                padding-left: 8px;
                                padding-bottom: 18px;">
                                    <span class="dot" style="padding-left: 0px;margin-left: 7px;"></span>
                                </div>
                                <div class=""
                                    style="margin-left: 32px ;border-left: 4px solid #f4a3a5;
                                height: 35px;
                                width: 0px;">
                                </div>
                            </div>
                            <h3 class="title text-theme-colored1 mt-0" style="  font-size: 45px;">مــــدة<br> الدراسـة
                            </h3>
                            <div class="row" style="justify-content: center;">
                                <div class=""
                                    style="margin-left: 32px ;border-left: 4px solid #f4a3a5;
                                height: 35px;
                                width: 0px;">
                                </div>
                            </div>
                            <div class="eyee"
                                style="background-size: cover ;background-image: url({{ asset('icon/q2.png?v=1') }}) ;padding-top: 20px;
height: 444px;">
                                <img src="{{ asset('icon/i2.png') }}" style="max-width: 135px" alt="">
                                <div style="margin-top: -15px;">
                                    {!! $academy->education_period !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" style="text-align: center">
                            <div class="row" style="justify-content: center; ">
                                <div class="row"
                                    style="justify-content: center;  justify-content: center;
                                padding-left: 8px;
                                padding-bottom: 18px;">
                                    <span class="dot" style="padding-left: 0px;margin-left: 7px;"></span>
                                </div>
                                <div class=""
                                    style="margin-left: 32px ;border-left: 4px solid #f4a3a5;
                                height: 35px;
                                width: 0px;">
                                </div>
                            </div>
                            <h3 class="title text-theme-colored1 mt-0" style="  font-size: 45px;">رســـوم<br> الدراسـة
                            </h3>
                            <div class="row" style="justify-content: center;">
                                <div class=""
                                    style="margin-left: 32px ;border-left: 4px solid #f4a3a5;
                                height: 35px;
                                width: 0px;">
                                </div>
                            </div>
                            <div class="eyee"
                                style="background-size: cover ;background-image: url({{ asset('icon/q1.png') }}) ;padding-top: 40px;
height: 460px;">
                                <img src="{{ asset('icon/i3.png') }}"
                                    style="max-width: 135px;
                                margin-top: 50px;"
                                    alt="">
                                {!! $academy->education_fee !!}
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 75px ; margin-top: 75px">

                        <div class="col-lg-6 ">
                            <div class="col-md-12 academy3 m-3"
                                style="background: #f4a3a5;min-height: 444px !important;padding-top: 50px;">
                                <h2 style="color: #fff">شروط القبول</h2>
                                <h3 style="text-align: justify;padding: 0 25px;">
                                    {!! $academy->accept_condition !!}</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="col-md-12 academy3 m-3"
                                style="background: #f9bb76;min-height: 444px !important;padding-top: 50px;">
                                <h2 style="color:#fff">شروط التخرج</h2>
                                <h3 style="text-align: justify;padding: 0 25px;">
                                    {!! $academy->graduation_condition !!}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- Section: Staff -->
                    <div class="row" style="text-align: center">
                        {!! $academy->footer !!}
                    </div>

                </div>

            </div>
        </section>
        <section style="background: #fffaf4;padding-top: 50px; padding-bottom: 50px">
            <div class="container pt-15 pb-15">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-60">
                                <div class="tm-sc tm-sc-section-title section-title">
                                    <div class="title-wrapper">
                                        <h2 class="text-uppercase text-theme-colored1">أعضاء
                                            هيئة التدريس
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="row" style="justify-content: center">
                            @foreach ($trainers as $trainer)
                                <div class="col-sm-12 col-lg-2 col-md-4">
                                    <div>
                                        <div class="staff-item mb-lg-40"
                                            style="margin-top: 115px;background: #fff;
                                    box-shadow: 4px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                    -webkit-box-shadow: 4px 12px 6px -6px rgba(0, 0, 0, 0.35);
                                    -moz-box-shadow: 4px 12px 6px -6px rgba(0, 0, 0, 0.35);      margin-bottom: 25px;">
                                            <div class="staff-thumb"
                                                style="  position: relative;
                                                 top: -80px;">
                                                <img alt="img" src="{{ asset('trainers/images/' . $trainer->img) }}"
                                                    class="w-100 rounded"
                                                    style="border-radius: 50% !important;border: 1px solid #f9bf7f;
                                                padding: 3px;">
                                            </div>
                                            <div class="staff-content"
                                                style="min-height: 400px;
                                        margin-top: -80px;
                                        color: #A8CDD1;border-bottom: unset;">
                                                <h4 class="staff-name text-theme-colored1 mt-0">{{ $trainer->first_name }}
                                                    {{ $trainer->last_name }} <small>{{ $trainer->title }}</small>
                                                </h4>
                                                <h5>{{ $trainer->qout }}</h5>
                                                <p class="mb-20">
                                                    {{ $trainer->about }}
                                                </p>
                                                <div class="staff-social-part">
                                                    <ul
                                                        class="styled-icons icon-dark icon-theme-colored2 icon-sm icon-circled float-start mt-10">
                                                        @if ($trainer->facebook != '')
                                                            <li><a class="social-link" href="{{ $trainer->facebook }}"
                                                                    style="font-size: 10px;
                                                            height: 22px;
                                                            width: 22px; margin: 0;"><i
                                                                        class="fab fa-facebook"></i></a>
                                                            </li>
                                                        @endif
                                                        @if ($trainer->twitter != '')
                                                            <li><a class="social-link" href="{{ $trainer->twitter }}"
                                                                    style="font-size: 10px;
                                                            height: 22px;
                                                            width: 22px; margin: 0;"><i
                                                                        class="fab fa-twitter"></i></a>
                                                            </li>
                                                        @endif
                                                        @if ($trainer->instagram != '')
                                                            <li><a class="social-link" href="{{ $trainer->instagram }}"
                                                                    style="font-size: 10px;
                                                            height: 22px;
                                                            width: 22px; margin: 0;"><i
                                                                        class="fab fa-instagram"></i></a>
                                                            </li>
                                                        @endif
                                                        @if ($trainer->whatsapp != '')
                                                            <li><a class="social-link" href="{{ $trainer->whatsapp }}"
                                                                    style="font-size: 10px;
                                                            height: 22px;
                                                            width: 22px; margin: 0;"><i
                                                                        class="fab fa-whatsapp"></i></a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                    {{-- <a class="btn btn-theme-colored2 btn-xs p-10 float-end" href="#">view
                                            details</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start Divider -->
        <section class="" style="  background: #f2fffd; padding-top: 50px;">
            <div class="container pt-15" style="padding-bottom: 0px">
                <div class="section-content">
                    <h2 class="title text-theme-colored1 mt-20 mb-20 text-center" style="font-size: 38px;">شهادة الاعتماد
                        لموقع الأكاديمية
                    </h2>
                    <div class="row" style="justify-content: center;">
                        <div class="vl"
                            style="border-left: 3px solid #f4a3a5;
                        height: 100px;
                        width: auto;">
                        </div>
                    </div>
                    <div class="row" style="justify-content: center;">

                        <img src="{{ asset('home/images/academy.png') }}" style="width: 70%" alt="">

                    </div>

                    <div class="row" style="justify-content: center;">
                        <div class="vl"
                            style="border-left: 3px solid #f4a3a5;
                        height: 100px;
                        width: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="" style="  background: #A8CDD1;">
            <div class="container pt-15 pb-15">
                <div class="section-content">
                    <h2 class="title text-theme-colored1 mt-20 mb-20 text-center">التعاونات
                    </h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="tm-sc tm-sc-clients tm-sc-clients-carousel owl-dots-light-skin owl-dots-center">
                                <div class="owl-carousel owl-theme tm-owl-carousel-3col" data-autoplay="true"
                                    data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="30"
                                    data-stagepadding="0" data-laptop="4">
                                    <div class="item"> <a target="_blank"> <img src='{{ asset('ta3aon/1.jpg') }}'
                                                alt='Image' style="height: 120px !important;" /> </a></div>
                                    <div class="item"> <a target="_blank"> <img src='{{ asset('ta3aon/2.png') }}'
                                                alt='Image' style="height: 120px !important;" /> </a></div>
                                    <div class="item"> <a target="_blank"> <img src='{{ asset('ta3aon/3.png') }}'
                                                alt='Image' style="height: 120px !important;" /> </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row" style="justify-content: center;">
            <div class="vl"
                style="border-left: 3px solid #f4a3a5;
            height: 100px;
            width: auto;">
            </div>
        </div>
        <!-- Start Divider -->
        <section class="" style="  background: #EFBB76;">
            <div class="container pt-15 pb-15">
                <div class="section-content">

                    <h2 class="title text-theme-colored1 mt-20 mb-20 text-center">الاعتمادات العالمية
                    </h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="tm-sc tm-sc-clients tm-sc-clients-carousel owl-dots-light-skin owl-dots-center">
                                <div class="owl-carousel owl-theme tm-owl-carousel-5col" data-autoplay="true"
                                    data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="30"
                                    data-stagepadding="0" data-laptop="4">
                                    <div class="item"> <a target="_blank"> <img src='{{ asset('supporters/1.png') }}'
                                                alt='Image' style="height: 120px !important;" /> </a></div>
                                    <div class="item"> <a target="_blank"> <img src='{{ asset('supporters/2.png') }}'
                                                alt='Image' style="height: 120px !important;" /> </a></div>
                                    <div class="item"> <a target="_blank"> <img src='{{ asset('supporters/3.png') }}'
                                                alt='Image' style="height: 120px !important;" /> </a></div>
                                    <div class="item"> <a target="_blank"> <img src='{{ asset('supporters/4.png') }}'
                                                alt='Image' style="height: 120px !important;" /> </a></div>
                                    <div class="item"> <a target="_blank"> <img src='{{ asset('supporters/5.png') }}'
                                                alt='Image' style="height: 120px !important;" /> </a></div>
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
