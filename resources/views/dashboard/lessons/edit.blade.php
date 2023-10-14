@extends('layouts.dashboard')

@section('styles')
    <style>
        .progress {
            height: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #f5f5f5;
            border-radius: 4px;
        }

        .progress-bar {
            background-color: #007bff;
            width: 0%;
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s ease-in-out;
        }

        .progress-bar span {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            color: #fff;
            text-align: center;
            transform: translateY(-50%);
        }

        /* Style the progress bar when it is in progress */
        .progress.in-progress .progress-bar {
            background-color: #ffc107;
        }

        /* Style the progress bar when it is successful */
        .progress.success .progress-bar {
            background-color: #28a745;
        }

        /* Style the progress bar when it has failed */
        .progress.failed .progress-bar {
            background-color: #dc3545;
        }
    </style>
@endsection
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Edit</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.lessons.index') }}">lessons</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">تعديل درس</div>

                        <div class="card-block">
                            <form action="{{ route('dashboard.lessons.update', $lesson) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @include('layouts._error')
                                <div class="form-group">
                                    <label for="title">العنوان</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $lesson->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">الوصف</label>
                                    <textarea name="description" id="description" rows="5" class="form-control" required>{{ $lesson->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">التصنيف</label>
                                    <select name="course_category_id" class="form-control @error('course_id') is-invalid @enderror" id="">
                                        @foreach ($course_categories as $course)
                                        <option value="{{ $course->id }}" @if ($lesson->course_category_id ==$course->id)
                                            selected
                                        @endif>{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@push('scripts')
    <script>
        $(function() {
            $('#lesson-form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    $('.progress-bar').width(percentVal);
                    $('.progress-bar').html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    $('.progress-bar').width(percentVal);
                    $('.progress-bar').html(percentVal);
                },
                success: function(response) {
                    var percentVal = '100%';
                    $('.progress-bar').width(percentVal);
                    $('.progress-bar').html(percentVal);
                    setTimeout(function() {
                        $('.progress-bar').fadeOut();
                    }, 1000);

                    if (response.success) {
                        alert(response.message);
                        window.location.href = response.redirect_url;
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr) {
                    var percentVal = '0%';
                    $('.progress-bar').width(percentVal);
                    $('.progress-bar').html(percentVal);
                    // alert(xhr.responseText);
                    console.log(xhr);
                },

                fail: function(error) {
                    console.log(error);
                    alert('An error occurred while processing your request. Please try again later.');
                },
                complete: function(xhr) {

                }
            });
        });
    </script>
@endpush
