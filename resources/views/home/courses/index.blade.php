@extends('home.layouts._app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content bg-lighter">
        <!-- Section: page title -->
        <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
            data-tm-bg-img="{{ asset('header.webp') }}?v={{ setting('cover_time') }}"
            style="margin-top: 95px; background-size: cover;">
            <div class="container pt-50 pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">الدورات</h2>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Course gird -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sidebar sidebar-right mt-sm-30">
                            <div class="widget">
                                <h5 class="widget-title">البحث</h5>
                                <div class="search-form">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" placeholder="اكتب هنا" class="form-control search-input">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn search-button"><i
                                                        class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- <div class="widget widget_text text-center">
                <div class="textwidget">
                  <div class="section-typo-light bg-theme-colored1 mb-md-40 p-30 pt-40 pb-40"> <img class="size-full wp-image-800 aligncenter" src="{{ asset('home/images/headphone-128.png') }}" alt="images" width="128" height="128" />
                  <h4>Online Help!</h4>
                  <h5>+(123) 456-78-90</h5>
                  </div>
                </div>
              </div>
              <div class="widget widget-brochure-box clearfix">
                <a class="brochure-box brochure-box-theme-colored1" href="#">
                  <i class="far fa-file-word brochure-icon"></i>
                  <h5 class="text">Download PDF</h5>
                </a>
              </div> --}}
                        </div>
                    </div>
                    <div class="col-md-9 blog-float-end">
                        <div class="row">
                            @foreach ($courses as $course)
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
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{ $courses->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
