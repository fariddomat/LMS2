@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/imageDeleteBtn.css')}}">
@endsection

@push('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
<script>
        $(function () {
            $("#delete-index-img").on("click", function () {
                $("#index-img").attr("src", "");
                $(".img-wrap").hide();
                $(".logo").val(null);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
                $.ajax({
                    url: "{{route('dashboard.services.destroy', $service->id)}}",
                    type: "DELETE",
                    data: { _token: CSRF_TOKEN },
                    dataType: "JSON",
                    success: function (data) {
                        //done.
                    },
                });
            });
        });
</script>
@endpush
@push('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

@endpush

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Edit</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.services.index') }}">Services</a></li>
             <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>تعديل خدمة</h4>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('dashboard.services.update', $service->id) }}" method="post" enctype="multipart/form-data">
                                @csrf()
                                {{ method_field('put') }}
                                @include('layouts._error')

                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">العنوان</label>
                                    <input type="text" name="title" class="form-control" value="{{ $service->title }}" dir="rtl">
                                </div>


                                <div class="form-group mb-3">
                                    <label for="main_title" class="form-label">العنوان الرئيسي</label>
                                    <input type="text" name="main_title" class="form-control" value="{{ $service->main_title }}" dir="rtl">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="price" class="form-label">سعر الخدمة </label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price', $service->price) }}" dir="rtl">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="index_name" class="form-label">اسم الفهرس</label>
                                    <input type="text" name="index_name" class="form-control" value="{{ $service->index_name }}" dir="rtl">
                                </div>

                                <div class="form-group mb-3">
                                    <label>صورة الفهرس</label>
                                    <input type="file" name="index_image" class="form-control logo">
                                </div>

                                <div class="form-group mb-3">
                                @if($service->index_image)
                                <div class="img-wrap">
                                    <span id="delete-index-img" class="close" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">&times;</span>
                                    <img id="index-img" src="{{ asset($service->index_image) }}" style="width: 300px;" class="img-thumbnail logo-preview" alt="">
                                </div>
                                @else
                                <img src="" style="width: 300px; display: none;" class="img-thumbnail logo-preview" alt="">
                                @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="brief" class="form-label">مختصر</label>
                                    <textarea class="form-control" id="_editor" name="brief" rows="5" dir="rtl">{{ $service->brief }}</textarea>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="icon_class" class="form-label">Icon Class</label>
                                    <input type="text" name="icon_class" class="form-control" value="{{ $service->icon_class }}">
                                </div>

                                <div class="form-check mb-3"><label class="form-check-label" for="available">
                                      إتاحة طلب الخدمة
                                    </label>
                                    <input class="form-check-input" style="margin-right: 50px" type="checkbox" value="1" id="available" name="available" {{ $service->available  == 1 ? 'checked' : '' }}>

                                </div>


                                <div class="form-group mb-3">
                                    <label>الصورة</label>
                                    <input type="file" name="image" class="form-control image">
                                </div>

                                <div class="form-group mb-3">
                                    <img src="{{ $service->image_path }}" style="width: 300px;" class="img-thumbnail image-preview" alt="">
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                                    <a href="{{route('dashboard.sections.index', $service->id)}}" class="btn btn-primary"> الأقسام </a>

                                    <a href="{{route('dashboard.sliderImages.index', $service->id)}}" class="btn btn-primary"> معرض الصور </a>

                                </div>
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
        $(function() {
        CKEDITOR.replace("_editor", {
            filebrowserBrowseUrl: imageGalleryBrowseUrl,
            filebrowserUploadUrl:
                imageGalleryUploadUrl +
                "?_token=" +
                $("meta[name=csrf-token]").attr("content"),
            removeButtons: "_editor"
        });
    });
    </script>
    @endpush
