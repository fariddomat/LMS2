 <!DOCTYPE html>
 <html lang="IR-fa" dir="rtl">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>@yield('title')</title>

     <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Icons -->
     <link href="{{ asset('dashboard/css/font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('dashboard/css/simple-line-icons.css') }}" rel="stylesheet">
     <!-- Main styles for this application -->
     <link href="{{ asset('dashboard/dest/style.css') }}" rel="stylesheet">

     <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
     <script src="{{ asset('noty/noty.min.js') }}" defer></script>

     <!-- Include jQuery library -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

     <!-- Include ajaxForm library -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" defer></script>

     {{-- select2 --}}

     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

     @yield('styles')
 </head>

 <body class="navbar-fixed sidebar-nav fixed-nav">
     <header class="navbar">
         <div class="container-fluid">
             <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
             <a class="navbar-brand" href="#"></a>
             <ul class="nav navbar-nav hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                 </li>

             </ul>
             <ul class="nav navbar-nav pull-left hidden-md-down">
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                         aria-haspopup="true" aria-expanded="false">
                         <span class="hidden-md-down">{{ Auth::user()->name }}</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                         <div class="dropdown-header text-xs-center">
                             <strong>Account</strong>
                         </div>
                         <a class="dropdown-item" href=""><i class="fa fa-bell-o"></i>
                             الملف الشخصي</a>
                         <div class="dropdown-header text-xs-center">
                             <strong>Settings</strong>
                         </div><a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                             <i class="fa fa-lock"></i>تسجيل خروج
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 </li>
                 <li class="nav-item">
                 </li>

             </ul>
         </div>
     </header>
     <div class="sidebar">
         <nav class="sidebar-nav">
             <ul class="nav">
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.home') }}"><i class="icon-speedometer"></i> لوحة
                         التحكم
                     </a>
                 </li>

                 <li class="nav-title">
                     التحكم
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.setting.settingsText') }}"><i
                             class="icon-info "></i>
                         معلومات الموقع</a>
                 </li>
                 {{-- <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.setting.logs') }}"><i class="icon-magnifier "></i>
                         سجل العمليات</a>
                 </li> --}}
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.setting.social') }}"><i class="icon-share "></i>
                         مواقع التواصل</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.setting.cover') }}"><i class="icon-camera "></i>
                         الصفحة الرئيسية</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.whoiam.index') }}"><i class="icon-info "></i>
                         من أنا</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.about.create') }}"><i class="icon-info "></i>
                         من نحن</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.online_classes.index') }}"><i
                             class="fa fa-medkit  "></i>
                         حصص أونلاين</a>
                 </li>
                 {{-- <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.integrativeMedicines.index') }}"><i
                             class="fa fa-medkit  "></i>
                         الطب الشمولي</a>
                 </li> --}}
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.services.index') }}"><i class="icon-plus "></i>
                         الخدمات</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.servicereviews.index') }}"><i class="icon-plus "></i>
                         تقييم الخدمات</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.orderservices.index') }}"><i class="icon-plus "></i>
                         طلبات الخدمات والاستشارات</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.contactForm.index') }}"><i class="icon-note "></i>
                         تواصل معنا</a>
                 </li>
                 <li class="nav-title">
                     الأكاديمية
                 </li>

                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.academy.create') }}"><i
                             class="icon-folder-alt "></i>
                         الرئيسية</a>
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.courses.index') }}"><i
                             class="icon-folder-alt "></i>
                         الدورات</a>
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.materials.index') }}"><i
                             class="icon-folder-alt "></i>
                         المواد التعليمية</a>
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.profiles.index') }}"><i class="icon-people "></i>
                         الطلاب</a>
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.enrollments.index') }}"><i class="icon-people "></i>
                         الاشتراكات</a>
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.trainers.index') }}"><i class="icon-people "></i>
                         المدربين</a>
                 </li>


                 <li class="nav-title">
                     المدونة
                 </li>
                 {{--   --}}

                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.categories.index') }}"><i class="icon-docs"></i>
                         التصنيفات</a>
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.tags.index') }}"><i class="icon-tag"></i>
                         الوسومات Tags</a>
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.posts.index') }}"><i class="icon-doc"></i>
                         التدوينات</a>
                 </li>

                 <li class="nav-title">
                     الأدوات
                 </li>

                 <li class="nav-item nav-dropdown">
                     <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i class="icon-user"></i>
                         المستخدمين</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.setting.changePassword') }}"><i
                             class="icon-lock "></i>
                         تغيير كلمة السر</a>
                 </li>
             </ul>
         </nav>
     </div>
     <!-- Main content -->
     @yield('content')



     <footer class="footer">
         <span class="text-left">LMS &copy; 2023 .
         </span>
     </footer>
     <!-- Bootstrap and necessary plugins -->
     <script src="{{ asset('dashboard/js/libs/jquery.min.js') }}"></script>
     <script src="{{ asset('dashboard/js/libs/tether.min.js') }}"></script>
     <script src="{{ asset('dashboard/js/libs/bootstrap.min.js') }}"></script>
     <script src="{{ asset('dashboard/js/libs/pace.min.js') }}"></script>

     <!-- Plugins and scripts required by all views -->
     <script src="{{ asset('dashboard/js/libs/Chart.min.js') }}"></script>

     <!-- CoreUI main scripts -->

     <script src="{{ asset('dashboard/js/app.js') }}"></script>

     <!-- Plugins and scripts required by this views -->
     <!-- Custom scripts required by this view -->
     {{-- <script src="{{ asset('dashboard/js/views/main.js') }}"></script> --}}
     {{-- <script src="{{ asset('dashboard/js/views/charts.js') }}"></script> --}}

     @extends('layouts._noty')
     {{-- @yield('scripts') --}}
     @stack('scripts')
 </body>

 </html>
