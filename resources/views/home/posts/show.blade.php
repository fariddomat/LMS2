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
                            <h2 class="title">{{ $post->title }}</h2>
                            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                                <div class="breadcrumbs">
                                    <span><a href="{{ route('home') }}" rel="home">الرئيسية</a></span>

                                    <span><i class="fa fa-angle-left"></i></span>
                                    <span><a href="{{ route('posts.index') }}">المدونة</a></span>
                                    <span><i class="fa fa-angle-left"></i></span>
                                    <span class="active">{{ $post->slug }}</span>

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Blog -->
        <section>
            <div class="container mt-30 mb-30 pt-30 pb-30">
                <div class="row">
                    <div class="col-lg-9 order-lg-2">
                        <div class="blog-posts single-post">
                            <article class="post clearfix mb-0">
                                <div class="entry-header mb-30">

                                    <h2>{{ $post->title }}</h2>
                                    <div class="entry-meta mt-0">
                                        <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><i
                                                class="far fa-calendar-alt mr-10 text-theme-colored1"></i>
                                            {{ $post->created_at->diffForHumans() }}</span>
                                        <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><i
                                                class="far fa-user mr-10 text-theme-colored1"></i>
                                            {{ $post->author_name }}</span>
                                    </div>
                                    <div class="row" style="justify-content: center">
                                        <div class="post-thumb thumb"> <img src="{{ $post->image_path }}" alt="images"
                                                class="img-responsive" style="max-height: 500px; width: auto"> </div>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <p>{!! $post->introduction !!}</p>
                                    <blockquote
                                        class="tm-sc-blockquote blockquote-style6  border-left-theme-colored quote-icon-theme-colored">
                                        <p>{!! $post->content_table !!}</cite></footer>
                                    </blockquote>
                                    <p>{!! $post->first_paragraph !!}</p>


                                    <h5>{!! $post->description !!}</p>

                                </div>
                            </article>

                            <div class="disquss-comment mt-50">
                                {{-- <div id="disqus_thread"></div>
                                <script>
                                    /**
                                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                    /*
                                    var disqus_config = function () {
                                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                    };
                                    */
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                        var d = document,
                                            s = d.createElement('script');
                                        s.src = 'https://themeforest-1.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a
                                        href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> --}}
                                <div id="disqus_thread"></div>
                                <script>
                                    /**
                                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                    /*
                                    var disqus_config = function () {
                                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                    };
                                    */
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                        var d = document,
                                            s = d.createElement('script');
                                        s.src = 'https://holistichealth-sa.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a
                                        href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar sidebar-left mt-sm-30">
                            {{-- <div class="widget">
                                <h5 class="widget-title">Search box</h5>
                                <div class="search-form">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" placeholder="Click to Search"
                                                class="form-control search-input">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn search-button"><i
                                                        class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Latest News
                                </h4>
                                <div class="latest-posts">
                                    <article class="post clearfix pb-0 mb-20">
                                        <a class="post-thumb" href="#"><img src="images/shop/portfolio-sq1.jpg"
                                                alt="images"></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="#">Sustainable Construction</a></h5>
                                            <span class="post-date">
                                                <time class="entry-date" datetime="2021-05-15T06:10:26+00:00">April 15,
                                                    2021</time>
                                            </span>
                                        </div>
                                    </article>
                                    <article class="post clearfix pb-0 mb-20">
                                        <a class="post-thumb" href="#"><img src="images/shop/portfolio-sq2.jpg"
                                                alt="images"></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="#">Industrial Coatings</a></h5>
                                            <span class="post-date">
                                                <time class="entry-date" datetime="2021-05-15T06:10:26+00:00">April 15,
                                                    2021</time>
                                            </span>
                                        </div>
                                    </article>
                                    <article class="post clearfix pb-0 mb-20">
                                        <a class="post-thumb" href="#"><img src="images/shop/portfolio-sq3.jpg"
                                                alt="images"></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="#">Storefront Installations</a></h5>
                                            <span class="post-date">
                                                <time class="entry-date" datetime="2021-05-15T06:10:26+00:00">April 15,
                                                    2021</time>
                                            </span>
                                        </div>
                                    </article>
                                </div>
                            </div> --}}

                            <div class="widget widget_archive">
                                <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">الارشيف</h4>
                                <ul>
                                    <li>تاريخ الانشاء<br><a href='#'>{{ $post->created_at }}</a></li>
                                    <li>آخر تعديل<br><a href='#'>{{ $post->updated_at }}</a></li>
                                </ul>
                            </div>
                            <div class="widget widget_categories">
                                <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">التصنيف
                                </h4>
                                <ul>
                                    <li class="cat-item"><a href="#">{{ $post->category->name }}</a> </li>
                                </ul>
                            </div>
                            <div class="widget widget_tag_cloud">
                                <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">الوسوم Tags
                                </h4>
                                <div class="tagcloud">
                                    @foreach ($post->tags as $tag)
                                        <a href="#" class="tag-cloud-link">tag</a>
                                    @endforeach
                                </div>
                            </div>
                            {{-- <div class="widget widget_text text-center">
                                <div class="textwidget">
                                    <div class="section-typo-light bg-theme-colored1 mb-md-40 p-30 pt-40 pb-40"> <img
                                            class="size-full wp-image-800 aligncenter"
                                            src="{{ asset('home/images/headphone-128.png') }}" alt="images"
                                            width="128" height="128" />
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
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
