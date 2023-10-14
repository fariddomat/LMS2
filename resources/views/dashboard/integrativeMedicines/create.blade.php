@extends('layouts.dashboard')
@push('scripts')

<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
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
            <li class="breadcrumb-item"><a>create</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.integrativeMedicines.index') }}">IntegrativeMedicines</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>إضافة تفاصيل</h4>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('dashboard.integrativeMedicines.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <div class="form-group">
                                    <label for="header">تعريفي؟</label>
                                    <input type="checkbox" class="checkbox-form-control" id="header" name="header">
                                </div>


                                <div class="form-group">
                                    <label for="content">المحتوى:</label>
                                    <textarea id="_editor" class="form-control" name="content"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="image">الصورة:</label>
                                    <input type="file" class="form-control image" id="image" name="image">
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
