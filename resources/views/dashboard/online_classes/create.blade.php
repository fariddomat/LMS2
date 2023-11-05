@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Create</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.online_classes.index') }}">Online</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>إضافة جلسة</h4>
                        </div>
                        <div class="card-block">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('dashboard.online_classes.store') }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Grade_id">الخدمة : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="service_id">
                                                <option selected>اختر...</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Classroom_id">الدورة : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="course_id">
                                                <option selected>اختر...</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div><br>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>عنوان الحصة : <span class="text-danger">*</span></label>
                                            <input class="form-control" name="topic" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>تاريخ ووقت الحصة : <span class="text-danger">*</span></label>
                                            <input class="form-control" type="datetime-local" name="start_at">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>مدة الحصة بالدقائق : <span class="text-danger">*</span></label>
                                            <input class="form-control" name="duration" type="text">
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
