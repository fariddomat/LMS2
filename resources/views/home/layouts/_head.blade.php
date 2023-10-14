<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="منصة عربية تعليمية بريطانية موجهة للمربين العرب في جميع أنحاء العالم. نحرص في برامجنا على تزويد المربين بالمهارات و الأساليب التربوية العلمية بما يتوافق مع ثقافة المجتمع العربي">
    <meta name="keywords" content="LMS,lms, learning management system, Mellow Minds, millow, minds, students, Dr Nermeen alqasemi, Dr Nermeen" />
    <meta name="author" content="Dr Nermeen alqasemi" />

    <!-- Page Title -->
    <title>{{ setting('site_title') }}</title>

    <!-- Favicon and Touch Icons -->
    <link href="{{ asset('logo.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset('logo.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('logo.png') }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ asset('logo.png') }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ asset('logo.png') }}" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('home/css/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('home/css/javascript-plugins-bundle.css') }}" rel="stylesheet" />

    <!-- CSS | menuzord megamenu skins -->
    {{-- <link href="{{ asset('home/js/menuzord/css/menuzord.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('home/js/menuzord/css/menuzord-rtl.css') }}" rel="stylesheet" />

    <!-- CSS | Main style file -->
    <link href="{{ asset('home/css/style-main.css') }}" rel="stylesheet" type="text/css">
    <link id="menuzord-menu-skins" href="{{ asset('home/css/menuzord-skins/menuzord-rounded-boxed.css') }}"
        rel="stylesheet" />

    <!-- CSS | Responsive media queries -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->

    <link href="{{ asset('home/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('home/css/style-main-rtl.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('home/css/style-main-rtl-extra.css') }}" rel="stylesheet" type="text/css">
    <!-- external javascripts -->
    <script src="{{ asset('home/js/jquery.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/js/javascript-plugins-bundle.js') }}"></script>
    <script src="{{ asset('home/js/menuzord/js/menuzord.js') }}"></script>

    <!-- <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" type="text/css"> -->

    <!-- CSS | Theme Color -->
    <link href="{{ asset('home/css/colors/theme-skin-color-set1.css') }}?v=1" rel="stylesheet" type="text/css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        li.mega-menu-item a.mega-menu-link:before {
            margin: 0 0 0 6px;
        }

        li.mega-menu-item-has-children>a.mega-menu-link>span.mega-indicator {
            float: left;

            &:after {
                margin: 0 6px 0 0;
            }
        }

        >li.mega-menu-item>a.mega-menu-link,
        ul.mega-sub-menu a.mega-menu-link,
        ul.mega-sub-menu h4.mega-block-title,
        li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-column>ul.mega-sub-menu>li.mega-menu-item>a.mega-menu-link {
            text-align: right;
        }

        >li.mega-menu-tabbed>ul.mega-sub-menu {
            >li.mega-menu-item>ul.mega-sub-menu {
                left: 0;
            }

            >li.mega-menu-item>a.mega-menu-link {
                float: right;
            }

            >li.mega-menu-item.mega-menu-item-has-children>a.mega-menu-link>span.mega-indicator {
                float: left;

                &:after {
                    content: $arrow_left;
                }
            }
        }

        >li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-item {
            float: right;
        }

        li.mega-menu-item-has-children li.mega-menu-item-has-children>a.mega-menu-link>span.mega-indicator,
        &.mega-menu-accordion>li.mega-menu-item-has-children>a.mega-menu-link>span.mega-indicator {
            float: left;
        }

        .header-nav-col-row {
            position: fixed;
            top: 0;
            left: 0;
            background: white;
            width: 100%;
            margin: 0;
        }

        a.showhide {
            position: fixed;
            left: 25px;
            top: 25px
        }

        span svg.w-5 {
            max-width: 40px;
        }

        .course-item .course-thumb .price {
            left: unset;
            right: -3px;
        }

        .lg-css3.lg-fade .lg-item.lg-current {
            left: 0;
        }

        .video {
            margin: 85px;
        }

        @media only screen and (max-width: 600px) {
            .video {
                margin: 15px;
            }
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Janna';
            src: url({{ asset('home/fonts/ArbFONTS-Janna-LT-Regular.ttf') }});
        }

        @font-face {
            font-family: 'Amiri';
            src: url('https://fonts.googleapis.com/css2?family=Janna:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        }
       a {
            font-family: 'Amiri';

            /* color: #375651; */
        }

        body {
            /* background: #f2fffd; */
        }

        h4,
        h5,
        h6,
        .h4,
        .h5,
        .h6 .h1,
        .h2,
        .h3,
        h1,
        h2,
        h3 {
            font-family: 'Amiri';
            /* color: #375651; */
        }

        p {
            font-family: 'Amiri';
            /* color: #375651; */
        }

        span {
            font-family: unset';
            /* color: #375651; */
        }

        .menuzord.theme-color1 .menuzord-menu>li.active>a,
        .menuzord.theme-color1 .menuzord-menu>li:hover>a,
        .menuzord.theme-color1 .menuzord-menu ul.dropdown li:hover>a {
            background: var(--theme-color2);
            color: #fff;
        }


        .menuzord-menu>li>a {
            color: #375651;
        }

        .ttt {
            color: #375651;

        }

        .header-nav-col-row {
            background: #fff;
        }

        #home,
        #homeVideo,
        #homeCourse,
        #academy,
        #academy2,
        #about4 {
            background: #f2fffd
        }

        .academy3 {
            margin-top: 75px;
            padding: 15px;
            box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
            -webkit-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
            -moz-box-shadow: 12px 12px 6px -6px rgba(0, 0, 0, 0.35);
            min-height: 465px !important;
            text-align: center;

        }

        .academy3>h2 {
            color: #e0e1da
        }

        .academy3>h3,
        .academy3>h4 {
            color: #fff
        }


        .footer-widget-area {
            background-color: #f2fffd !important;
            color: #A8CDD1;
        }

        .dot {
            height: 25px;
            width: 25px;
            border: 5px #f4a3a5 solid;
            border-radius: 50%;
            display: inline-block;
        }

        footer#footer .styled-icons.icon-sm a {
            font-size: 24px;
            height: 50px;
            width: 50px;
        }

        footer {
            color: #375651;
        }

        footer#footer a:not(.social-link):not(.icon),
        footer#footer .footer-widget-area .widget .widget-title {
            color: #375651;
        }

        footer li:hover>a,
        footer div:hover>a {
            color: #EFBB76 !important;
        }

        .footer-widget-area {
            background-color: #f2fffd !important;
            color: #A8CDD1;

        }

        footer#footer a:not(.social-link):not(.icon),
        footer#footer .footer-widget-area .widget .widget-title {
            color: #375651;
        }

        footer.footer-bottom {
            background-color: #f2fffd;
            color: #375651;
        }

        #services a:hover,
        #welcome a:hover {
            color: #375651 !important;
            background-color: #f2fffd !important;
        }

        #service3 blockquote.border-left-theme-colored {
            border-left-color: #375651;
            border-radius: 25px;
        }

        #service3 blockquote.blockquote-style6 {
            background: #f2fffd;
            border-right: 10px solid #A8CDD1;
        }

        @media only screen and (max-width: 500px) {

            /* retina */
            .ttt {
                display: none !important;
            }

            #homeVideo>h2 {
                padding-bottom: 50px
            }

            #homeVideo>h2>span {
                padding-top: 50px;
                margin-right: -35px;
            }

            #homeVideo>div {
                width: 90% !important;
            }

        }

        .layer-overlay.overlay-dark-9::before {
            background-color: rgba(17, 17, 17, 0.3);
        }

        @media only screen and (max-width: 990px) {
            .col-md-7 {
                padding-left: 25px;
                padding-right: 25px;
            }

            /* .haveAccount {
                display: block !important;
                position: unset !important;
                margin-bottom: 0;
                padding-top: 25px;
            }

            .haveAccount2 {
                margin-top: 10px !important;
            } */

            #academy2>.container,
            section>.container-fluid {
                padding-top: 0 !important;
            }

            .shadowBlock {
                margin: 10px auto !important;
                width: 100% !important;
            }

            .ttitle {
                width: 100% !important;
                font-size: 35px !important;
            }

            .tarrow {
                margin-top: -55px !important;
                margin-right: 180px !important;
            }

            .eyee {
                background-size: 95% !important;
                background-position: center !important;
                background-repeat: no-repeat !important;
            }
        }
    </style>
    <style>
        .rating2 {
            float: right;
            border: none;
        }

        .rating2:not(:checked)>input {
            position: absolute;
            top: auto;
            clip: rect(0, 0, 0, 0);
        }

        .rating2:not(:checked)>label {
            float: left;
            width: 1em;
            padding: 0 .1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 200%;
            line-height: 1.2;
            color: #ddd;
        }

        .rating2:not(:checked)>label:before {
            content: '★ ';
        }

        .rating2>input:checked~label {
            color: #f70;
        }

        .rating2:not(:checked)>label:hover,
        .rating2:not(:checked)>label:hover~label {
            color: gold;
        }

        .rating2>input:checked+label:hover,
        .rating2>input:checked+label:hover~label,
        .rating2>input:checked~label:hover,
        .rating2>input:checked~label:hover~label,
        .rating2>label:hover~input:checked~label {
            color: #ea0;
        }

        .rating2>label:active {
            position: relative;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
    <script src="{{ asset('noty/noty.min.js') }}" defer></script>

    {{-- select2 --}}

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <style>
        .INTEGRITy {
            color: #f2fffd !important;
        }
        /*
        FEF6EC
        EAA2A1
         */
        .TRUST {
            columns: #EFBB76 !important;
        }

        .LOVE {
            color: #A8CDD1 !important;
        }

        .HOLISM {
            color: #375651 !important;
        }

        .Janna{
            font-family: Janna;
        }
    </style>

    @yield('styles')
</head>
