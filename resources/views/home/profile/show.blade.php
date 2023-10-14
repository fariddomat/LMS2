@extends('home.layouts._app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
            data-tm-bg-img="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}"
            style="margin-top: 95px; background-size: cover;">
            <div class="container pt-50 pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">الملف الشخصي </h2>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Experts Details -->
        <section style="margin-top: 50px">
            <div class="container">
                <div class="section-content">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3 mt-15">
                            <a class="btn btn-dark btn-block   btn-theme-colored1  text-uppercase text-white"
                                href="{{ route('profiles.edit', $profile->id) }}"
                                style="width: 100%; text-align: right">تعديل الملف الشخصي</a>
                            <a class="btn btn-dark btn-block   btn-theme-colored1  text-uppercase text-white mt-30"
                                href="{{ route('profiles.password') }}" style="width: 100%; text-align: right">تعديل كلمة
                                السر</a>
                            @if (Auth::user()->hasRole('user'))
                                <a class="btn btn-dark btn-block   btn-theme-colored1  text-uppercase text-white mt-30"
                                    href="{{ route('courses.index') }}" style="width: 100%; text-align: right">الدورات </a>
                            @endif
                            {{-- <a class="btn btn-dark btn-block   btn-theme-colored3  text-uppercase text-white mt-30"
                            href=""  style="width: 100%; text-align: right">تسجيل خروج</a> --}}

                            <a class="btn btn-dark btn-block   btn-theme-colored3  text-uppercase text-white mt-30"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"
                                style="width: 100%; text-align: right">
                                تسجيل خروج <i class="fa fa-lock"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <div class="col-md-8">

                            <h4 class="line-bottom">الملف الشخصي:</h4>
                            @if (Auth::user()->hasRole('user'))
                                @if ($profile->status == 'pending')
                                    <div class="bg-success text-white d-flex border-bottom p-15 mb-20">
                                        <div class="flex-shrink-0">
                                            <i class="pe-7s-lock text-theme-colored font-size-24 mt-1 me-3"></i>
                                        </div>
                                        <div class="flex-shrink-1">
                                            <p>أكمل إعداد ملفك الشخصي للوصول إلى الأكاديمية بتسديد رسوم الحساب والتي قدرها
                                                350 ريال</p>
                                            <form action="{{ route('tap.payment') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-light">تسديد الآن</button>
                                            </form>
                                        </div>
                                    </div>
                                @elseif ($profile->status == 'paid')
                                    <div class="bg-success text-white d-flex border-bottom p-15 mb-20 pt-30">
                                        <div class="flex-shrink-0">
                                            <i class="pe-7s-book text-theme-colored font-size-24 mt-1 me-3"></i>
                                        </div>
                                        <div class="flex-shrink-1">
                                            <p>سنقوم بدراسة طلبك الآن، شكرا لتأكيد التسجيل</p>

                                        </div>
                                    </div>

                                    @elseif ($profile->status == 'active' && Auth::user()->enrollments->count() == 0 )
                                    <div class="bg-success text-white d-flex border-bottom p-15 mb-20 pt-30">
                                        <div class="flex-shrink-0">
                                            <i class="pe-7s-book text-theme-colored font-size-24 mt-1 me-3"></i>
                                        </div>
                                        <div class="flex-shrink-1">
                                            <p> تم تفعيل الحساب، قم بالانتقال لقسم الدورات للاشتراك بالدورة.</p>

                                        </div>
                                    </div>
                                @endif
                            @endif
                            <h3 class="mt-0">الاسم بالكامل: {{ $profile->full_name }}</h3>
                            <div class="bg-light d-flex border-bottom p-15 mb-20">
                                <div class="flex-shrink-0">
                                    <i class="pe-7s-pen text-theme-colored font-size-24 mt-1 me-3"></i>
                                </div>
                                <div class="flex-shrink-1">
                                    <h5 class="mt-0 mb-0">معلومات عني:</h5>
                                    <p>{{ $profile->about }}</p>
                                </div>
                            </div>
                            <div class="bg-light d-flex border-bottom p-15 mb-20">
                                <div class="flex-shrink-0">
                                    <i class="fa fa-phone text-theme-colored font-size-24 mt-1 me-3"></i>
                                </div>
                                <div class="flex-shrink-1">
                                    <h5 class="mt-0 mb-0">معلومات التواصل:</h5>
                                    <p><span>الجوال:</span> <a
                                            href="tel:+{{ $profile->mobile }}">{{ $profile->mobile }}</a><br><span>البريد
                                            الإلكتروني:</span> <a
                                            href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></p>
                                </div>
                            </div>

                            <div class="bg-light d-flex border-bottom p-15 mb-20">
                                <div class="flex-shrink-0">
                                    <i class="fa fa-map-marker text-theme-colored font-size-24 mt-1 me-3"></i>
                                </div>
                                <div class="flex-shrink-1">
                                    <h5 class="mt-0 mb-0">العنوان:</h5>
                                    <p>{{ $profile->address }}</p>
                                </div>
                            </div>
                            {{-- <ul class="styled-icons icon-dark icon-theme-colored2 icon-circled icon-sm">
                                <li><a class="styled-icons-item" target="_blank" href="#"><i
                                            class="fab fa-facebook"></i></a></li>
                                <li><a class="styled-icons-item" target="_blank" href="#"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a class="styled-icons-item" target="_blank" href="#"><i
                                            class="fab fa-linkedin"></i></a></li>
                                <li><a class="styled-icons-item" target="_blank" href="#"><i
                                            class="fab fa-skype"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end main-content -->
@endsection
