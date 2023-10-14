@extends('layouts.dashboard')
@section('contactusActive', 'active')


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
                            <h3 class="card-title">من أنا؟</h3>
                        </div>
                        <div class="card-block">
                            <a href="{{ route('dashboard.whoiam.create') }}" class="btn btn-primary">إضافة</a>
                            @if (count($sections) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>تعريفي؟</th>
                                            <th>الفترة</th>
                                            <th>العنوان</th>
                                            <th style="  width: 40% !important;">المحتوى</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sections as $section)
                                            <tr>
                                                <td>{{ $section->header ? 'نعم' : 'لا' }}</td>
                                                <td>{{ $section->start_date }} - {{ $section->end_date }}</td>
                                                <td>{{ $section->title }}</td>
                                                <td>{!! Str::limit(strip_tags($section->content), 250 , ' ...') !!}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.whoiam.edit', $section) }}"
                                                        class="btn btn-primary">تعديل</a>
                                                    {{-- <form action="{{ route('dashboard.whoiam.destroy', $section) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger delete">حذف</button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No sections found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            @else
                                <p>لا يوجد معلومات.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
