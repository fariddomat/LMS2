@extends('layouts.dashboard')

@push('scripts')
    <script type="text/javascript">
        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
    </script>

<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/blog.js') }}"></script>

@endpush
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Create</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">posts</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>إضافة منشور</h3>
                        </div>
                        <div class="card-block">
                            <form method="POST" action="{{ route('dashboard.posts.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                @include('layouts._error')
                                <div class="form-group">
                                    <label for="title">العنوان</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        value="{{ old('title') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">الوصف</label>
                                    <textarea name="description" class="form-control" id="description" rows="10" required>{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="introduction">المقدمة</label>
                                    <textarea name="introduction" class="form-control" id="introduction" rows="10" required>{{ old('introduction') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content_table">جدول المحتوى</label>
                                    <textarea name="content_table" class="form-control" id="content_table" rows="10" required>{{ old('content_table') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="first_paragraph">نص المنشور</label>
                                    <textarea name="first_paragraph" class="form-control" id="first_paragraph" rows="10" required>{{ old('first_paragraph') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="author_name">اسم المؤلف</label>
                                    <input type="text" name="author_name" class="form-control" id="author_name"
                                        value="{{ old('author_name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="author_title">وصف المؤلف</label>
                                    <input type="text" name="author_title" class="form-control" id="author_title"
                                        value="{{ old('author_title') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="">التصنيف</label>

                                    <select name="category_id" id="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tags">الوسوم Tags</label>
                                    <select multiple name="tags[]" class="form-control select2" id="tags">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>الصورة</label>
                                    <input type="file" name="image" class="form-control image">
                                </div>

                                <div class="form-group">
                                    <img src="" style="width: 300px; display: none;" class="img-thumbnail image-preview" alt="">
                                </div>

                                <button type="submit" class="btn btn-primary">إضافة</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
