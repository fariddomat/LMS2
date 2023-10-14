@extends('layouts.dashboard')
@section('contactusActive', 'active')


@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.integrativeMedicines.index') }}">IntegrativeMedicines</a>
            </li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">الطب الشمولي</h3>
                        </div>
                        <div class="card-block">
                            <a href="{{ route('dashboard.integrativeMedicines.create') }}" class="btn btn-primary">إضافة</a>
                            @if (count($sections) > 0)
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>تعريفي؟</th>
                                            <th style="  width: 40% !important;">المحتوى</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sections as $section)
                                            @php

                                                $text = strip_tags($section->content);
                                            @endphp
                                            <tr>
                                                <td>{{ $section->header ? 'نعم' : 'لا' }}</td>
                                                <td>{!! Str::limit($text, 250, ' ...') !!}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.integrativeMedicines.edit', $section) }}"
                                                        class="btn btn-primary">تعديل</a>
                                                    <form
                                                        action="{{ route('dashboard.integrativeMedicines.destroy', $section) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger delete">حذف</button>
                                                    </form>
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
