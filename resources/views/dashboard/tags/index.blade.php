@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.tags.index') }}">Tags</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">الوسومات Tags</h3>
                        </div>
                        <div class="card-block">
                            <a href="{{ route('dashboard.tags.create') }}" class="btn btn-primary">إضافة</a>
                            @if(count($tags) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>Slug</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tags as $tag)
                                            <tr>
                                                <td>{{ $tag->name }}</td>
                                                <td>{{ $tag->slug }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.tags.edit', $tag->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                                                    <form action="{{ route('dashboard.tags.destroy', $tag->id) }}" method="post" style="display: inline-block;">
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
                                <p>No tags found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
