@extends('layouts.dashboard')


@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>create</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.lessons.index') }}">lessons</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">الملفات</div>
                        <a href="{{ route('dashboard.lesson.files.create', $lesson->id) }}" class="btn btn-primary"
                            style="margin-top: 25px;margin-right: 15px"> إضافة ملف</a>

                        <div class="card-block">

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($lesson->lessonFiles as $index=>$file)
                                        <tr>
                                            <td>
                                                {{ $index+1 }}
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ asset('lesson_files/' . $lesson->id . '/' . $file->file_name) }}">{{ $file->file_name }}</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('dashboard.lesson.files.destroy', $file) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger delete">حذف</button>
                                                </form>
                                            </td>


                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No files found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
