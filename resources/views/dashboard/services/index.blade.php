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
                            <h3 class="card-title">الاستشارات</h3>
                            <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary">إضافة استشارة</a>
                        </div>
                        <div class="card-block">
                            @if (count($services) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>طلب الاستشارة</th>
                                            <th>أيام العمل</th>
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
                                                    <a href="{{ route('dashboard.dayOfWorks.index', $service->id) }}" class="btn btn-success "><i class="fa fa-edit"></i> إدارة</a>

                                                </td>
                                                <td>
                                                    <a href="{{ route('dashboard.services.edit', $service->id) }}" class="btn btn-info "><i class="fa fa-edit"></i> تعديل</a>
                                                    <form action="{{ route('dashboard.services.destroy', $service->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn  btn-danger delete" >حذف</button>
                                                    </form>
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
