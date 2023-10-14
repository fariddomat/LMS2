@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>edit</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.course_categories.index') }}">course_categories</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>تعديل تصنيف</h4>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('dashboard.course_categories.update', $course_category->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">الدورة</label>
                                    <select name="course_id" class="form-control @error('course_id') is-invalid @enderror" id="">
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" @if ($course->id == $course_category->course_id)
                                            selected
                                        @endif >{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">الاسم:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course_category->name) }}">
                                </div>

                        <!-- If you want to allow the selection of a parent category, you can use a dropdown -->
                        <div class="form-group">
                            <label for="parent_id">تابع لتصنيف</label>
                            <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                <option value="">اختر تصنيف أب (اختياري)</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($course_category->parent_id == $category->id)
                                        selected
                                    @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
