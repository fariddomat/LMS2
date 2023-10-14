@extends('layouts.dashboard')

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
            <li class="breadcrumb-item"><a href="{{ route('dashboard.academy.create') }}">Academy</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>الأكاديمية </h4>
                        </div>
                        <div class="card-block">

                            @php
                                $data=[
                            'ar_title'=>'العنوان بالعربية',
                            'en_title'=>'العنوان بالانكليزية',
                            'header'=>' عبارة التعريف',
                            'about'=>'حول الاكاديمية',

                            'who_are_we'=>'من نحن',
                            // 'history'=>'تاريخنا ',
                            'phylosofy'=>'فلسفتنا ',
                            'vision'=>'رؤيتنا ',
                            'message'=>'رسالتنا ',

                            'content'=>'المحتوى ',
                            'how_is'=>'من هو مدرب العافية الشمولية ',

                            'goals'=>'أهداف الأكاديمية ',
                            'essential'=>'أساسيات المنهج ',
                            'education_way'=>'طريقة التعليم ',
                            'education_period'=>'مدة الدراسة ',
                            'graduation_condition'=>'شروط التخرج ',
                            'accept_condition'=>'شروط القبول ',
                            'education_fee'=>'رسوم الدراسة ',

                            'footer'=>'الخاتمة ',

                        ];
                            @endphp
                            <form action="{{ route('dashboard.academy.create') }}" method="post" enctype="multipart/form-data">
                                @csrf()
                                @include('layouts._error')
                                @foreach ($data as $key=>$item)
                                <div class="form-group mb-3">
                                    <label for="about_me" class="form-label">{{ $item }}</label>
                                    <textarea class="form-control" id="{{ $key }}" name="{{ $key }}" rows="5" dir="rtl">@if ($academy)
                                        {{ $academy->$key }}
                                    @endif</textarea>
                                </div>
                                <hr>
                                @endforeach

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

    @push('scripts')
    <script>
        $(function() {
        @foreach ($data as $key=>$item)
        CKEDITOR.replace("{{ $key }}", {
            filebrowserBrowseUrl: imageGalleryBrowseUrl,
            filebrowserUploadUrl:
                imageGalleryUploadUrl +
                "?_token=" +
                $("meta[name=csrf-token]").attr("content"),
            removeButtons: "{{ $key }}"
        });
        @endforeach
    });
    </script>
    @endpush
