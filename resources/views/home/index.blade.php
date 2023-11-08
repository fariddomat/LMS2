@extends('home.layouts._app')
@section('styles')
    <style>
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
    </style>
@endsection
@section('content')
    <!-- Start main-content -->
    <div class="main-content-area">
        <!-- Section: home -->
        <section id="home" class="">
            <div class="container" style="">
                <div class="section-content">
            <div class="row">
                <div class="col-md-12">

                    <div class="container pt-80 pr-100 ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="pb-50 pt-30">
                                    <h2
                                        style="font-family: Cairo, Sans-serif;
                    font-size: 45px;
                    font-weight: bold;" class="wow bounceInUp">
                                        Mellow Minds
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                                <div class="pb-50 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <h3 class="">{!! setting('cover1_text') !!}</h3>
                                    <h1 class="">{!! setting('cover2_text') !!}</h1>
                                    <h4 class="">{!! setting('cover3_text') !!} </h4>
                               
                    </div>
                </div>
                <div class="col-md-6">
                                <div class="pb-50 pt-20 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
                                    <img src="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}"
                                        alt="" >

                </div>
            </div>
                </div>
            </div>
        </section>

        <!-- Section: welcome -->
        <section id="welcome" class="divider parallax " style="background: #cee1e3">
            <div class="container pt-150 pb-150" style="  padding-left: 25px;
            padding-right: 25px;">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-5  wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            <img src="{{ asset('dr2.jpeg') }}" alt=""
                                style="border: 12px solid white;
                           ">
                        </div>
                        <div class="col-md-7 wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0.8s">
                            <p class="lead text-black">{!! $about->about_me !!}</p>
                            <a href="{{ route('whoiam') }}" target="_self"
                                class="btn btn-dark btn-theme-colored2 btn-sm btn-block mt-15 mb-20 hvr-grow"> قراءة المزيد </a>

                        </div>

                    </div>
                </div>
            </div>
        </section>

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
                            <div class="col-lg-6 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s" style="display: flex;
                            align-items: center;">
                                <img src="{{ asset('home/images/message.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.3s"
                                style="display: flex;
                                 align-items: center;">
                                <img src="{{ asset('home/images/vision.jpg') }}" alt="">
                            </div>
                            <div class="col-lg-6  wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                                <div class="col-md-12 academy3 m-3" style="background: #74b0ec;padding-top: 50px;">
                                    <h2
                                        style="height: 75px;
                                            padding-top: 25px;">
                                        رؤيتنا</h2>
                                    <h3 style="text-align: justify;padding: 0 45px;">
                                        {!! $about->vision !!}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">

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

                            <div class="col-lg-6 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.3s" style="display: flex;
                        align-items: center;">
                                <img src="{{ asset('home/images/values.jpg') }}" alt="" style="border-radius: 35%">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Section: Services -->
        <section id="services" class="divider parallax layer-overlay overlay-white-8" data-parallax-ratio="0.1"
            data-tm-bg-img="{{ asset('home/images/courses.webp') }}">
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
                                    <div class="course-thumb"> <img alt="featured project"
                                            src="{{ $course->thumbnail_url }}" class="w-100">
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
                                            {{ $course->title }}</h4>
                                        <p style="min-height: 130px">{{ $course->description }}</p>
                                        <a class="btn btn-dark btn-theme-colored2 btn-xs text-uppercase mt-10"
                                            href="{{ route('courses.show', $course->title) }}">التفاصيل</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-4" style="text-align: center">
                            <a href="{{ route('courses.index') }}"
                                class="btn btn-dark btn-theme-colored2 btn-lg btn-block mt-15 mb-20">شاهد كل الدورات</a>
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
                            <div class="col-sm-6 col-md-3 hvr-buzz">
                                <div class="course-item mb-30 bg-white border-1px">
                                    <div class="course-thumb"> <a href="{{ asset('materials/'.$material->file) }}" download=""><img alt="featured project"
                                        src="{{ asset('materials/'.$material->img) }}" class="w-100"></a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: blog -->
        {{-- <section id="blog" class="divider parallax layer-overlay overlay-white-4" style="background-color: #f2fffd;">
            <div class="container pt-90">
                <div class="section-title">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <div class="text-center mb-60">
                                <div class="tm-sc-section-title section-title section-title-style1 text-center">
                                    <div class="title-wrapper">
                                        <h2 class="title icon-bottom"> <span class="">آخر </span> المقالات
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Isotope Gallery Grid -->
                            <div id="gallery-holder-618422"
                                class="isotope-layout masonry grid-3 gutter-15 clearfix lightgallery-lightbox">
                                <div class="isotope-layout-inner">
                                    <div class="isotope-item isotope-item-sizer"></div>
                                   @if ($posts->count() > 0)
                                   @foreach ($posts as $post)
                                   <!-- Isotope Item Start -->
                                   <div class="isotope-item">
                                       <div class="isotope-item-inner">
                                           <div
                                               class="tm-sc-blog tm-sc-blog-masonry blog-style1-current-theme mb-lg-30">
                                               <article
                                                   class="post type-post status-publish format-standard has-post-thumbnail">
                                                   <div class="entry-header">
                                                       <div class="post-thumb lightgallery-lightbox">
                                                           <div class="post-thumb-inner">
                                                               <div class="thumb"> <img
                                                                       src="{{ $post->image_path }}"
                                                                       alt="Image" /></div>
                                                           </div>
                                                       </div>
                                                       <a class="link"
                                                           href="{{ route('posts.show', $post->slug) }}"><i
                                                               class="fa fa-link" style="color: white"></i></a>
                                                   </div>
                                                   <div class="entry-content">
                                                       <h5 class="entry-title"><a
                                                               href="{{ route('posts.show', $post->slug) }}"
                                                               rel="bookmark">{{ $post->title }}</a></h5>
                                                       <div class="entry-meta mt-0">
                                                           <span
                                                               class="mb-10 text-gray-darkgray mr-10 font-size-13"><i
                                                                   class="far fa-calendar-alt mr-10 text-theme-colored"></i>
                                                               {{ $post->created_at->diffForHumans() }}</span>
                                                           <span
                                                               class="mb-10 text-gray-darkgray mr-10 font-size-13"><i
                                                                   class="far fa-user mr-10 text-theme-colored"></i>
                                                               {{ $post->author_name }}</span>
                                                       </div>

                                                       <div class="post-excerpt">
                                                           <div class="mascot-post-excerpt">{!! Str::limit($post->description, 150) !!}
                                                           </div>
                                                       </div>
                                                       <div class="post-btn-readmore"> <a
                                                               href="{{ route('posts.show', $post->slug) }}"
                                                               class="btn btn-plain-text-with-arrow"> عرض التفاصيل
                                                           </a>
                                                       </div>
                                                       <div class="clearfix"></div>
                                                   </div>
                                               </article>
                                           </div>
                                       </div>
                                   </div>
                                   <!-- Isotope Item End -->
                               @endforeach
                               @else
                               <h3 style="color: #375651">لم يتم إضافة مقالات بعد</h3>
                                   @endif

                                </div>
                            </div>
                            <!-- End Isotope Gallery Grid -->
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        {{-- <section id="homeCourse" style="background: #fffaf4; padding: 50px 100px; text-align: center">
            <h2 class="text-theme-colored">الدورات التدريبيــة</h2>
            <h3 style="color: #ffa0a2"><a href="{{ route('courses.show',$courses_count[0]->title) }}">{{ $courses_count[0]->title }}</a></h3>
            <div class="row">
                <div class="col-md-4"><img src="{{ asset('c1.png') }}" alt=""></div>
                <div class="col-md-4" style="text-align: center">
                    <ul class="styled-icons icon-dark icon-sm icon-circled mt-30">
                        <li><a class="social-link" data-tm-bg-color="#ffa0a2" href="{{ setting('site_email') }}"><i class="fa fa-envelope"></i></a></li>
                        <li><a class="social-link" data-tm-bg-color="#ffa0a2" href="{{ setting('instagram2_link') }}"><i class="fab fa-instagram"></i></a></li>
                        <li><a class="social-link" data-tm-bg-color="#ffa0a2" href="{{ setting('twitter_link') }}"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="social-link" data-tm-bg-color="#ffa0a2" href="{{ setting('whatsapp_link') }}"><i class="fab fa-whatsapp"></i></a></li>

                      </ul>
                </div>
                <div class="col-md-4"><img src="{{ asset('c2.png') }}" alt=""></div>
            </div>
        </section> --}}
    </div>
@endsection
