@extends('home.layouts._app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content-area">
        <!-- Section: page title -->
        <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
            data-tm-bg-img="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}" style="margin-top: 50px; background-size: cover;">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">الخدمات</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Services -->
        <section id="services" class="bg-white-f7">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        @foreach ($services as $service)

                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="tm-sc-services services-style-current-theme5">
                                <div class="tm-service">
                                    <div class="thumb">
                                        <img src="{{ $service->image_path }}" alt="image">
                                        <a href="{{ route('services.show', $service->title) }}" class="icon bg-theme-colored1"><i
                                                class="fa fa-plus-square"></i></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="mt-0 mb-15">{{ $service->title }}</h4>
                                        <p>{{ $service->main_title }}</p>
                                        <p>
                                            @if ($service->price > 0)
                                            سعر الخدمة: {{ $service->price }} ريال
                                            @else
                                            <br>
                                            @endif
                                        </p>
                                        <a href="{{ route('services.show', $service->title) }}" target="_self"
                                            class="btn btn-dark btn-theme-colored1 btn-sm btn-block mt-15 mb-20"> قراءة المزيد </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- End Divider -->
    </div>
    <!-- end main-content -->
@endsection
