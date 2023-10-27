@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Create</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.materials.index') }}">Materials</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>إضافة مادة تعليمية</h4>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('dashboard.materials.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                @include('layouts._error')
                                <div class="form-group">
                                    <label for="name">الاسم</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">الصورة</label>
                                    <input type="file" class="form-control" id="name" name="img" value="{{ old('img') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">الملف</label>
                                    <input type="file" class="form-control" id="name" name="file" value="{{ old('file') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">السعر</label>
                                    <input type="number" class="form-control" id="name" name="price" value="{{ old('price', 0) }}" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
