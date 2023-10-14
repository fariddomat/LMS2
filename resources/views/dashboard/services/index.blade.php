@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.services.index') }}">Services</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">الخدمات</h3>
                            <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary">إضافة خدمة</a>
                        </div>
                        <div class="card-block">
                            @if (count($services) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>طلب الخدمة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $service->id }}</td>
                                                <td>{{ $service->title }}</td>
                                                <td>{{ $service->available == 1 ? 'متاح' : 'غير متاح' }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.services.edit', $service->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                                    {{-- لايوجد عمليات متاحة --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No services found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
