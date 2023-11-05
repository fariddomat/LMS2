@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.online_classes.index') }}">Online</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">الجلسات Online</h3>
                        </div>
                        <div class="card-block">
                            <a href="{{ route('dashboard.online_classes.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">اضافة جلسة جديدة</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الخدمة</th>
                                            <th>الدورة</th>
                                            <th>المعلم</th>
                                            <th>عنوان الحصة</th>
                                            <th>تاريخ البداية</th>
                                            <th>وقت الحصة</th>
                                            <th>رابط الحصة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_classe->service->title }}</td>
                                                <td>{{ $online_classe->course->title }}</td>
                                                <td>{{ $online_classe->user->name }}</td>
                                                <td>{{ $online_classe->topic }}</td>
                                                <td>{{ $online_classe->start_at }}</td>
                                                <td>{{ $online_classe->duration }}</td>
                                                <td class="text-danger"><a href="{{ $online_classe->join_url }}"
                                                        target="_blank">انضم الان</a></td>
                                                <td>
                                                    <form action="{{ route('dashboard.online_classes.destroy', $online_classe->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger delete" ><i
                                                            class="fa fa-trash"></i></button>
                                                    </form>
                                                    {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#Delete_receipt{{ $online_classe->meeting_id }}"><i
                                                            class="fa fa-trash"></i></button> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
