@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.courses.index') }}">courses</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">قائمة الدورات</h3>
                          <div class="card-tools">
                            {{-- <a href="{{ route('dashboard.courses.create') }}" class="btn btn-success btn-sm">إضافة دورة</a> --}}
                            <a href="{{ route('dashboard.course_categories.index') }}" class="btn btn-success btn-sm">التصنيفات</a>
                          </div>
                        </div>
                        <div class="card-block">
                          <table class="table table-striped table-responsive">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>الصورة</th>
                                <th>السعر</th>
                                <th>العمليات</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($courses as $course)
                                <tr>
                                  <td>{{ $course->id }}</td>
                                  <td>{{ $course->title }}</td>
                                  <td>{{ $course->description }}</td>
                                  <td>
                                    @if ($course->thumbnail_url)
                                      <img src="{{ $course->thumbnail_url }}" alt="{{ $course->title }}" width="64" height="64">
                                    @else
                                      <img src="{{ asset('images/course-placeholder.png') }}" alt="{{ $course->title }}" width="64" height="64">
                                    @endif
                                  </td>
                                  <td>{{ $course->price }}</td>
                                  <td>
                                    <div class="btn-group" style="  display: block;   min-width: 180px;">
                                      <a href="{{ route('dashboard.courses.show', $course->id) }}" class="btn btn-info btn-sm">مشاهدة</a>
                                      <a href="{{ route('dashboard.courses.edit', $course->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                                      <form action="{{ route('dashboard.courses.destroy', $course->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete" >حذف</button>
                                      </form>
                                    </div>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
