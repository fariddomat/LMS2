@extends('layouts.dashboard')
@push('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>

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
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
    <div class="tile mb-4">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الغلاف</h4>
                    <p class="card-category">تعديل صور الصفحة الرئيسية</p>
                </div>
                <div class="card-body " style="text-align: right;
                direction: rtl;">
                    <form action="{{ route('dashboard.setting.change_cover') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('layouts._error')

                        <div class="row" style="padding: 5px 25px">


                            <div class="col-md-12">
                                <label>نص 1</label>
                                <textarea id="1" name="cover1_text"  class="form-control">{{ setting('cover1_text') }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label>نص 2</label>
                                <textarea id="2" name="cover2_text"  class="form-control">{{ setting('cover2_text') }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label>نص 3</label>
                                <textarea id="3" name="cover3_text"  class="form-control">{{ setting('cover3_text') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label>غلاف </label>
                                <input type="file" name="cover1" class="form-control-file">
                                <img src="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}"
                                    style=" margin-top: 10px; max-width: 250px;" alt="">
                            </div>
                            <div class="col-md-12">
                                <label for="">فيديو الصفحة الرئيسية</label>
                                <textarea name="home_video" class="form-control" >{{ setting('home_video') }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">فيديو صفحة من نحن</label>
                                <textarea name="who_video" class="form-control" >{{ setting('who_video') }}</textarea>
                            </div>

                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i>
                                تعديل</button>
                        </div>
                    </form>
                </div>
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
    CKEDITOR.replace("1", {
        filebrowserBrowseUrl: imageGalleryBrowseUrl,
        filebrowserUploadUrl:
            imageGalleryUploadUrl +
            "?_token=" +
            $("meta[name=csrf-token]").attr("content"),
        removeButtons: "1"
    });
});

$(function() {
    CKEDITOR.replace("2", {
        filebrowserBrowseUrl: imageGalleryBrowseUrl,
        filebrowserUploadUrl:
            imageGalleryUploadUrl +
            "?_token=" +
            $("meta[name=csrf-token]").attr("content"),
        removeButtons: "2"
    });
});

$(function() {
    CKEDITOR.replace("3", {
        filebrowserBrowseUrl: imageGalleryBrowseUrl,
        filebrowserUploadUrl:
            imageGalleryUploadUrl +
            "?_token=" +
            $("meta[name=csrf-token]").attr("content"),
        removeButtons: "3"
    });
});
</script>
@endpush
