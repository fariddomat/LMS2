@extends('layouts.dashboard')
@section('title', 'Slider Images')
@section('servicesActive', 'active')
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.sliderImages.index', $service->id) }}">sliderImages</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">معرض الصور</h3>
                    </div>
                    <div class="card-block">

                    <div class="row justify-content-center">
                        <div class="col">
                            <a href="{{ route('dashboard.sliderImages.create', $service->id) }}" class="btn btn-primary"><i
                                    class="fa fa-plus"></i> إضافة </a>
                            <a href="{{ route('dashboard.sliderImages.show', $service->id) }}" class="btn btn-primary"> إظهار الكل </a>
                            <a href="{{ route('dashboard.sliderImages.hide', $service->id) }}" class="btn btn-primary"> إخفاء الكل </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            @if ($images->count() > 0)

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الصورة</th>
                                        <th>العرض</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $key => $image)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> <img src="{{ $image->image_path }}" style="width: 125px; height: auto;"
                                                    alt=""> </td>
                                            <td>{{ $image->showed == 1 ? 'نعم' : 'لا' }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.sliderImages.edit', $image->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('dashboard.sliderImages.destroy', $image->id) }}"
                                                    method="post" style="display: inline-block">
                                                    @csrf()
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                            class="fa fa-trash"></i> حذف</button>
                                                </form><!-- end of form -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- end of table -->
                            @else
                            <h3 style="margin-top: 50px">لا يوجد بيانات</h3>
                            @endif
                        </div>
                    </div></div>
            </div>
        </div>
    </main>
@endsection
