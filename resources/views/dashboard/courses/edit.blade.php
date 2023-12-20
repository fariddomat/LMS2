@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Edit</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.courses.index') }}">courses</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>تعديل دورة</h4>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('dashboard.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @include('layouts._error')
                                <div class="form-group">
                                    <label for="title">العنوان</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">الوصف</label>
                                    <textarea class="form-control" id="description" name="description">{{ $course->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="duration">المدة</label>
                                    <input type="text" name="duration" id="duration" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $course->duration) }}" min="0" required>
                                    @error('duration')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">السعر</label>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price',$course->price) }}" min="0" required>
                                    @error('price')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">الصورة</label>
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                    @if($course->thumbnail_url)
                                        <img src="{{ $course->thumbnail_url }}" class="img-fluid mt-2" alt="Course thumbnail">
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label class="form-check-label" for="defer">
                                      تأجيل الدورة
                                    </label>
                                    <input class="form-check-input" style="margin-right: 50px" type="checkbox" value="0" id="defer" name="defer" {{ old('defer',$course->defer) == '1' ? 'checked' : '' }}>

                                    <label class="form-check-label" for="defer" style="margin-right: 55px">
                                      موعد افتتاح الدورة في حال التأجيل
                                    </label>
                                    <input class="" style="margin-right: 50px" type="date"  id="defer_date" name="defer_date" value="{{ old('defer_date', $course->defer_date) }}">
                                </div>

                                <button type="submit" class="btn btn-primary">تعديل</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
