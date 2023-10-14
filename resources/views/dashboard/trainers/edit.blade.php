@extends('layouts.dashboard')


@push('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endpush
@section('content')
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>create</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.trainers.index') }}">trainers</a></li>
        <li class="breadcrumb-item"><a href="">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> تعديل مدرب
            </div>
            <div class="card-block ">
                <form action="{{ route('dashboard.trainers.update', $trainer->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('layouts._error')

                    <div class="form-group">
                        <label for="name">الاسم الأول</label>
                        <input type="text" class="form-control" name="first_name" id="spec" value="{{ old('first_name', $trainer->first_name) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">الاسم الاخير</label>
                        <input type="text" class="form-control" name="last_name" id="spec" value="{{ old('last_name', $trainer->last_name) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">التوصيف</label>
                        <input type="text" class="form-control" name="title" id="spec" value="{{ old('title', $trainer->title) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">عبارة يحبها</label>
                        <input type="text" class="form-control" name="qout" id="qout" value="{{ old('qout', $trainer->qout) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">عني</label>
                        <textarea name="about" class="form-control">{{ old('about', $trainer->about) }}</textarea>
                    </div>

                    <div class="form-group ">
                        <label for="name">رقم الهاتف</label>
                        <input type="text" class="form-control" name="mobile" id="twitter" value="{{ old('mobile', $trainer->mobile) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group ">
                        <label for="name">البريد الالكتروني</label>
                        <input type="email" class="form-control" name="email" id="twitter" value="{{ old('email', $trainer->email) }}"
                            aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group ">
                        <label for="name">Twitter</label>
                        <input type="text" class="form-control" name="twitter" id="twitter" value="{{ old('twitter', $trainer->twitter) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group ">
                        <label for="name">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{ old('facebook', $trainer->facebook) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group  ">
                        <label for="name">Instagram</label>
                        <input type="text" class="form-control" name="instagram" id="instagram" value="{{ old('instagram', $trainer->instagram) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group ">
                        <label for="name">Whatsapp</label>
                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $trainer->whatsapp) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <input type="file" class="form-control image" name="img" id="img"
                            aria-describedby="helpId" placeholder="">
                            {{-- <img src="" alt=""> --}}
                    </div>

                    <div class="form-group mb-3">
                        <img src="{{ asset('trainers/images/'.$trainer->img) }}" style="width: 300px;" class="img-thumbnail image-preview"
                            alt="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i>
                            تعديل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
</main>
@endsection
