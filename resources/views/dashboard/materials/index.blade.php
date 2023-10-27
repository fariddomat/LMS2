@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.materials.index') }}">Materials</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">المواد التعليمية</h3>
                        </div>
                        <div class="card-block">
                            <a href="{{ route('dashboard.materials.create') }}" class="btn btn-primary">إضافة</a>
                            @if(count($materials) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>الصورة</th>
                                            <th>السعر</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($materials as $material)
                                            <tr>
                                                <td>{{ $material->name }}</td>
                                                <td><img src="{{ asset('materials/'.$material->img) }}" alt="" style="width: 50px"></td>
                                                <td>{{ $material->price }}</td>
                                                <td>
                                                    <form action="{{ route('dashboard.materials.destroy', $material->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger delete" >حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No materials found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
