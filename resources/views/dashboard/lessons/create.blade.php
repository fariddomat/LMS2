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
                        <div class="card-header">إضافة درس</div>

                        <div class="card-block">
                            <form id="lesson-form" method="post" action="{{ route('dashboard.lessons.store') }}"
                                autocomplete="off" class="form-horizontal lesson-form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">الدورة</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input type="hidden" name="course_id" value="{{ $course->id }}"
                                                id="">
                                            <label for="">{{ $course->title }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">العنوان</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="title" id="input-title" type="text"
                                                placeholder="{{ __('العنوان') }}" value="{{ old('title') }}"
                                                required="true" aria-required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('الوصف') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" id="input-description" placeholder="{{ __('الوصف') }}"
                                                required="true" aria-required="true">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('المدة') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="duration" id="input-duration" type="text"
                                                placeholder="{{ __('المدة') }}" value="{{ old('duration') }}"
                                                required="true" aria-required="true" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="name">التصنيف</label>

                                    <div class="col-sm-7">
                                        <div class="form-group"><select name="course_category_id" class="form-control @error('course_id') is-invalid @enderror" id="">
                                        @foreach ($course_categories as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label for="video" class="col-sm-2 col-form-label">{{ __('الفيديو') }}</label>

                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input id="video" type="file"
                                                class="form-control-file @error('video') is-invalid @enderror"
                                                name="video" required>

                                            @error('video')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="progress mt-5" style="  margin-top: 15px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                    role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                    style="background: rgb(53, 244, 53);"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary">إضافة</button>
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
