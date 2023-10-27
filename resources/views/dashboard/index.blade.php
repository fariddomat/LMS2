@extends('layouts.dashboard')
@section('title')
    Dashboard
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
                                {{ $users }}
                                </h4>
                            <p>المستخدمين</p>
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
                            <h4 class="m-b-0">{{ $posts }}</h4>
                            <p>المنشورات</p>
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
                            <h4 class="m-b-0">{{ $services }}</h4>
                            <p>الخدمات</p>
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
                            <h4 class="m-b-0">{{ $payment_services }}</h4>
                            <p>شراء الخدمات</p>
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
                                {{ $courses }}
                                </h4>
                            <p>الدورات</p>
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
                            <h4 class="m-b-0">{{ $enrollments }}</h4>
                            <p>الاشتراكات</p>
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
                            <h4 class="m-b-0">{{ $course_payments }}</h4>
                            <p>شراء الدورات</p>
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
                            <h4 class="m-b-0">{{ $materials }}</h4>
                            <p>المواد التعليمية</p>
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
