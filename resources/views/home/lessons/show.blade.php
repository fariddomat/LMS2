@extends('home.layouts._app')
@push('scripts')
    <script src="{{ asset('home/playerjs.js') }}"></script>
    <script>
        var player = new Playerjs({
            id: "player",
            file: "{{ $lesson->video }}"
        });
    </script>
    <script>
        document.addEventListener("contextmenu", (event) => {
            event.preventDefault();
        });

        console._log = console.log
        console.log = function(log) {
            return console._log(`%c ${log}`, 'color:rgba(255,255,255,0)');
        }
    </script>
@endpush
@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: page title -->
        <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
            data-tm-bg-img="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}"
            style="margin-top: 95px; background-size: cover;">
            <div class="container pt-50 pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">{{ $lesson->title }}</h2>
                            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                                <div class="breadcrumbs">
                                    <span><a href="{{ route('home') }}" rel="home">الرئيسية</a></span>

                                    <span><i class="fa fa-angle-left"></i></span>
                                    <span class="active">{{ $lesson->title }}</span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Course -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="order-2 col-md-8 blog-float-end">
                        <div class="single-service">
                            {{-- <video src="{{ $lesson->video }}" style="width: 100%;"></video> --}}
                            <div id="player"></div>

                            <h3 class="text-theme-colored line-bottom text-theme-colored">{{ $lesson->title }}</h3>

                            <h5><em>المدة : {{ $lesson->duration }}</em></h5>
                            <p>{{ $lesson->description }}</p>

                            @if ($lesson->lessonFiles->count() > 0)
                                <div>
                                    <h3 class="text-theme-colored line-bottom text-theme-colored">ملفات الدرس</h3>
                                    @foreach ($lesson->lessonFiles as $index=>$file)
                                    <a
                                    href="{{ asset('lesson_files/' . $lesson->id . '/' . $file->file_name) }}"> <i class="fa fa-download"></i> {{ $file->file_name }}</a>
                                    <br>
                                    @endforeach
                                </div>
                            @endif



                        </div>
                    </div>
                    <div class="order-1 col-sm-12 col-md-4">
                        <div class="sidebar sidebar-left mt-sm-30 ml-40">
                            <div class="tm-sidebar-nav-menu-style2">
                                <h4 class="widget-title line-bottom">قائمة <span class="text-theme-color-2">الدروس</span>
                                </h4>
                                <div class="widget widget_nav_menu">
                                    <ul>
                                        @foreach ($lessons as $item)
                                            <li class="@if ($item->id == $lesson->id) active @endif"><a
                                                    href="{{ route('lessons.show', $item->id) }}">{{ $item->title }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
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
