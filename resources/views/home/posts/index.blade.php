@extends('home.layouts._app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content-area">

        <!-- Section: page title -->
        <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
            data-tm-bg-img="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}"
            style="margin-top: 95px; background-size: cover;">
            <div class="container pt-50 pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">المدونة</h2>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="tm-sc-gallery tm-sc-gallery-grid gallery-style1-basic">
                    <!-- Isotope Gallery Grid -->
                    <div class="isotope-layout masonry grid-4 gutter-15 clearfix">
                        <div class="isotope-layout-inner">
                            <div class="isotope-item isotope-item-sizer"></div>
                            {{-- integrateive --}}
                            <div class="isotope-item">
                                <div class="isotope-item-inner">
                                    <div class="tm-sc-blog blog-style-default mb-30">
                                        <article class="post type-post status-publish format-standard has-post-thumbnail">
                                            <div class="entry-header">
                                                <div class="post-thumb lightgallery-lightbox">
                                                    <div class="post-thumb-inner">
                                                        <div class="thumb">
                                                            <span class="badge"
                                                                style="position: absolute;
                                                            top: 0;
                                                            right: 0;
                                                            z-index: 100;"><i
                                                                    class="fas fa-thumbtack"
                                                                    style="font-size: 25px;
                                                                    padding-top: 15px;
                                                                    padding-right: 15px;"></i></span>
                                                            <img src="{{ asset('int.webp') }}" alt="Image" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="link" href="{{ route('integrativeMedicine') }}"><i
                                                        class="fa fa-link"></i></a>
                                            </div>
                                            <div class="entry-content">
                                                <h4 class="entry-title"><a href="{{ route('integrativeMedicine') }}"
                                                        rel="bookmark">الطب الشمولي</a></h4>


                                                <div class="post-excerpt">
                                                    <div class="mascot-post-excerpt">
                                                        ماهو الطب الشمولي؟
                                                    </div>
                                                </div>
                                                <div class="post-btn-readmore"> <a href="{{ route('integrativeMedicine') }}"
                                                        class="btn btn-plain-text-with-arrow"> عرض التفاصيل </a></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            @foreach ($posts as $post)
                                <!-- Isotope Item Start -->
                                <div class="isotope-item">
                                    <div class="isotope-item-inner">
                                        <div class="tm-sc-blog blog-style-default mb-30">
                                            <article
                                                class="post type-post status-publish format-standard has-post-thumbnail">
                                                <div class="entry-header">
                                                    <div class="post-thumb lightgallery-lightbox">
                                                        <div class="post-thumb-inner">
                                                            <div class="thumb"> <img src="{{ $post->image_path }}"
                                                                    alt="Image" /></div>
                                                        </div>
                                                    </div>
                                                    <a class="link" href="{{ route('posts.show', $post->slug) }}"><i
                                                            class="fa fa-link"></i></a>
                                                </div>
                                                <div class="entry-content">
                                                    <h4 class="entry-title"><a href="{{ route('posts.show', $post->slug) }}"
                                                            rel="bookmark">{{ $post->title }}</a></h4>
                                                    <div class="entry-meta mt-0 mb-0">
                                                        <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><i
                                                                class="far fa-calendar-alt mr-10 text-theme-colored1"></i>
                                                            {{ $post->created_at->diffForHumans() }}</span>
                                                        <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><i
                                                                class="far fa-user mr-10 text-theme-colored1"></i>
                                                            {{ $post->author_name }}</span>
                                                    </div>

                                                    <div class="post-excerpt">
                                                        <div class="mascot-post-excerpt">{!! Str::limit($post->description, 250) !!}.</div>
                                                    </div>
                                                    <div class="post-btn-readmore"> <a
                                                            href="{{ route('posts.show', $post->slug) }}"
                                                            class="btn btn-plain-text-with-arrow"> عرض التفاصيل </a></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <!-- Isotope Item End -->
                            @endforeach


                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- End Isotope Gallery Grid -->
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
