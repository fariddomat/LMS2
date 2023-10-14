@extends('layouts.dashboard')

@push('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('dashboard/js/about.js')}}"></script>
@endpush

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.about.create') }}">About</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>حول الموقع</h4>
                        </div>
                        <div class="card-block">

                            <form action="{{ route('dashboard.about.store') }}" method="post" enctype="multipart/form-data">
                                @csrf()
                                @include('layouts._error')
                                <div class="form-group mb-3">
                                    <label for="about_me" class="form-label">معلومات عني</label>
                                    <textarea class="form-control" id="about_me" name="about_me" rows="5" dir="rtl">{{ old('ar.about_me') ?? isset($about) ? $about->about_me : '' }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="brief" class="form-label">نبذة عن الشركة</label>
                                    <textarea class="form-control" id="brief" name="brief" rows="5" dir="rtl">{{ old('ar.brief') ?? isset($about) ? $about->brief : '' }}</textarea>
                                </div>
                                <hr>
                                <div class="form-group mb-3">
                                    <label for="who" class="form-label">من نحن؟</label>
                                    <textarea class="form-control" id="who" name="who" rows="5" dir="rtl">{{ old('ar.who') ?? isset($about) ? $about->who_are_we : '' }}</textarea>
                                </div>

                                <hr>
                                <div class="form-group mb-3">
                                    <label for="history" class="form-label">تاريخنا</label>
                                    <textarea class="form-control" id="history" name="history" rows="5" dir="rtl">{{ old('ar.history') ?? isset($about) ? $about->history : '' }}</textarea>
                                </div>

                                <hr>
                                <div class="form-group mb-3">
                                    <label for="massage" class="form-label">رسالتنا</label>
                                    <textarea class="form-control" id="massage" name="massage" rows="5" dir="rtl">{{ old('ar.massage') ?? isset($about) ? $about->massage : '' }}</textarea>
                                </div>

                                <hr>
                                <div class="form-group mb-3">
                                    <label for="goals" class="form-label">أهدافنا</label>
                                    <textarea class="form-control" id="goals" name="goals" rows="5" dir="rtl">{{ old('ar.goals') ?? isset($about) ? $about->goals : '' }}</textarea>
                                </div>

                                <hr>
                                <div class="form-group mb-3">
                                    <label for="vision" class="form-label">رؤيتنا</label>
                                    <textarea class="form-control" id="vision" name="vision" rows="5" dir="rtl">{{ old('ar.vision') ?? isset($about) ? $about->vision : '' }}</textarea>
                                </div>

                                <hr>
                                <div class="form-group mb-3">
                                    <label for="ambition" class="form-label">قيمنا</label>
                                    <textarea class="form-control" id="ambition" name="ambition" rows="5" dir="rtl">{{ old('ar.ambition') ?? isset($about) ? $about->ambition : '' }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> حفظ </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
