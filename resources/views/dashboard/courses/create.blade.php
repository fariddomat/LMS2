@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>create</a></li>
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
                            <h4 class="card-title">إضافة دورة</h4>
                        </div>
                        <div class="card-block">
                            <form method="POST" action="{{ route('dashboard.courses.store') }}" enctype="multipart/form-data">
                                @csrf

                                @include('layouts._error')
                                <div class="form-group">
                                    <label for="title">العنوان</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autofocus>
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">الوصف</label>
                                    <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="duration">المدة</label>
                                    <input type="text" name="duration" id="duration" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" min="0" required>
                                    @error('duration')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">السعر</label>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" min="0" required>
                                    @error('price')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">الصورة</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control-file @error('thumbnail') is-invalid @enderror" accept="image/*" required>
                                    @error('thumbnail')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="form-check-label" for="defer">
                                      تأجيل الدورة
                                    </label>
                                    <input class="form-check-input" style="margin-right: 50px" type="checkbox" value="0" id="defer" name="defer" {{ old('defer') == '1' ? 'checked' : '' }}>

                                    <label class="form-check-label" for="defer" style="margin-right: 55px">
                                      موعد افتتاح الدورة في حال التأجيل
                                    </label>
                                    <input class="" style="margin-right: 50px" type="date"  id="defer_date" name="defer_date" value="{{ old('defer_date') }}">
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">إضافة</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
