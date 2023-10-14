@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">categories</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">التصنيفات</h3>
                        </div>
                        <div class="card-block">
                            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary">إضافة</a>
                            @if(count($categories) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>Slug</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                                                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post" style="display: inline-block;">
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
                                <p>No categories found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
