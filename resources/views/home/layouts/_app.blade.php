<!DOCTYPE html>
<html dir="rtl" lang="ar">

@include('home.layouts._head')

<body class="rtl tm-container-1340px has-side-panel side-panel-right">
    @include('home.layouts._side')
    <div id="wrapper" class="clearfix">
        @include('home.layouts._header')

        <!-- Start main-content -->
        @yield('content')
        {{-- </section>/ --}}
    </div>
    <!-- end main-content -->

    @include('home.layouts._footer')
    <script>
        console.log = function () {};
    </script>
</body>

</html>
