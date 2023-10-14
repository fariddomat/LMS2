@extends('layouts.dashboard')


@push('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endpush
@section('content')
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>create</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.enrollments.index') }}">enrollments</a></li>
        <li class="breadcrumb-item"><a href="">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> إضافة اشتراك
            </div>
            <div class="card-block ">
                <form action="{{ route('dashboard.enrollments.store' ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('layouts._error')

                    <div class="form-group">
                        <label for="name">الدورة</label>
                        <select name="course_id" class="form-control">
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">الطالب</label>
                        <select name="user_id" class="form-control">
                            @foreach ($profiles as $profile)
                            <option value="{{ $profile->userp->id }}">{{ $profile->userp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i>
                            حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
</main>
@endsection
