@extends('layouts.dashboard')


@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>create</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.lessons.index') }}">lessons</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">إضافة ملف</div>

                        <div class="card-block">

                            <form action="{{ route('dashboard.lesson.files.store', $lesson) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('layouts._error')
                                <input type="file" name="files[]" multiple class="form-control">
                                <button type="submit" class="btn btn-primry" style="margin-top: 25px">رفع الملف</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

