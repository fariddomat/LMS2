@extends('layouts.dashboard')
@section('title', 'Add New Image')
@section('servicesActive', 'active')

@push('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endpush

@section('content')
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Create</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.sliderImages.index', $service->id) }}">sliderImages</a></li>
        <li class="breadcrumb-item"><a href="">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h4>إضافة صورة</h4>
                    </div>
                    <div class="card-block">

            <form action="{{ route('dashboard.sliderImages.store', $service->id) }}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group mb-3">
                    <label>الصورة</label>
                    <input type="file" name="image" class="form-control image">
                </div>
                <div class="form-check mb-3"><label class="form-check-label" for="showed">
                      عرض
                    </label>
                    <input class="form-check-input" style="margin-right: 50px" type="checkbox" value="1" id="showed" name="showed" checked>

                </div>

                <div class="form-group mb-3">
                    <img src="" style="width: 300px; display: none;" class="img-thumbnail image-preview" alt="">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                </div>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
