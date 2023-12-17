@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection

@section('styles')
   <style>
    a{
        color:#fff
    }
   </style>
@endsection
@section('content')
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse" style="background-color: #04364A;">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <i class="icon-user"></i>
                            </div>
                            <h4 class="m-b-0">
                               <a href="{{ route('dashboard.users.index') }}"> {{ $users }}</a>
                                </h4>
                            <p><a href="{{ route('dashboard.users.index') }}">المستخدمين</a> </p>
                        </div>

                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse" style="background-color: #176B87;">
                        <div class="card-block p-b-0">
                            <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                                <i class="icon-puzzle"></i>
                            </button>
                            <h4 class="m-b-0"><a href="{{ route('dashboard.posts.index') }}">{{ $posts }}</a> </h4>
                            <p><a href="{{ route('dashboard.posts.index') }}">المنشورات</a> </p>
                        </div>

                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse" style="background-color: #64CCC5;">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <i class="icon-puzzle"></i>
                            </div>
                            <h4 class="m-b-0"><a href="{{ route('dashboard.services.index') }}">{{ $services }}</a> </h4>
                            <p><a href="{{ route('dashboard.services.index') }}">الاستشارات</a> </p>
                        </div>

                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse" style="background-color: #2E97A7;">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <i class="icon-credit-card "></i>
                            </div>
                            <h4 class="m-b-0"><a href="{{ route('dashboard.orderservices.index') }}">{{ $payment_services }}</a> </h4>
                            <p><a href="{{ route('dashboard.orderservices.index') }}">طلبات الاستشارات</a> </p>
                        </div>

                    </div>
                </div>
                <!--/col-->
                {{--  --}}
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse" style="background-color: #610C9F;">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <i class="icon-grid "></i>
                            </div>
                            <h4 class="m-b-0">
                                <a href="{{ route('dashboard.courses.index') }}">{{ $courses }}</a>
                                </h4>
                            <p><a href="{{ route('dashboard.courses.index') }}">الدورات</a> </p>
                        </div>

                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse" style="background-color: #940B92;">
                        <div class="card-block p-b-0">
                            <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                                <i class="icon-bag "></i>
                            </button>
                            <h4 class="m-b-0"><a href="{{ route('dashboard.enrollments.index') }}">{{ $enrollments }}</a> </h4>
                            <p><a href="{{ route('dashboard.enrollments.index') }}">الاشتراكات</a> </p>
                        </div>

                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse" style="background-color: #DA0C81;">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <i class="icon-credit-card "></i>
                            </div>
                            <h4 class="m-b-0"><a href="{{ route('dashboard.enrollments.index') }}">{{ $course_payments }}</a> </h4>
                            <p><a href="{{ route('dashboard.enrollments.index') }}">شراء الدورات</a> </p>
                        </div>

                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse" style="background-color: #E95793;">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <i class="icon-book-open  "></i>
                            </div>
                            <h4 class="m-b-0"><a href="{{ route('dashboard.materials.index') }}">{{ $materials }}</a> </h4>
                            <p><a href="{{ route('dashboard.materials.index') }}">المواد التعليمية</a> </p>
                        </div>

                    </div>
                </div>
                <!--/col-->
            </div>
            <!--/row-->


        </div>

    </div>
    <!--/.container-fluid-->
</main>
@endsection
