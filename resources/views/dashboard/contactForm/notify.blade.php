@extends('layouts.dashboard')
@section('title', 'Contact Us')
@section('contactusActive', 'active')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Index</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.contactForm.index') }}">ContactForm</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <section class="basic-inputs">
                    <div class="row match-height">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">إشعارات</h4>
                                </div>
                                <div class="card-block" dir="rtl" style="text-align: right">
                                    <div class="card-body col-lg-6">
                                        <fieldset class="form-group">
                                            <form action="{{ route('dashboard.contactForm.send_mail') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')

                                                @include('layouts._error')
                                                <h5 class="mt-2">إلى</h5>
                                                <select name="users[]" id="" class="form-control select2" multiple>
                                                    <option value="">الجميع</option>

                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>


                                                <h5 class="mt-2" style="margin-top: 25px">التفاصيل</h5>
                                                <textarea name="details" class="form-control" id="basicTextarea" rows="3">{{ old('details') }}</textarea>

                                                <button class="btn btn-icon btn-info mr-1 mt-3" style="margin-top: 25px"> إرسال<i class="fa fa-mail"
                                                        style="position: relative;"></i></button>
                                            </form>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- Basic Inputs end -->
            </div>
        </div>
    </main>
@endsection
