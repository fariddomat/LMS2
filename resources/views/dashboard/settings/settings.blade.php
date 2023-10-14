@extends('layouts.dashboard')

@section('content')
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">معلومات الموقع</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-block" style="direction: rtl; text-align: right">

                    <form action="{{ route('dashboard.setting.settings') }}" method="POST">
                        @csrf
                        @method('post')
                        @include('layouts._error')

                        <div class="row pr-2 pl-2">
                            <div class="col-md-6">
                                {{-- Site Name --}}
                                <div class="form-group">
                                    <label for="site_name" class="text-capitalize">اسم الموقع</label>
                                    <input type="text" class="form-control" name="site_name" id="site_name"
                                        value="{{setting('site_name')}}" aria-describedby="helpId" placeholder="">
                                </div>
                                {{-- Site title --}}
                                <div class="form-group">
                                    <label for="site_title" class="text-capitalize">عنوان الموقع</label>
                                    <input type="text" class="form-control" name="site_title" id="site_title"
                                        value="{{setting('site_title')}}" aria-describedby="helpId" placeholder="">
                                </div>
                                {{-- Site about --}}
                                <div class="form-group">
                                    <label for="site_about" class="text-capitalize">حول - about</label>
                                    <textarea name="site_about" class="form-control" id="" cols="30" rows="10">
                                        {{setting('site_about')}}
                                    </textarea>
                                </div>

                            </div>
                            <div class="col-md-6">


                                {{-- Site Email --}}
                                <div class="form-group">
                                    <label for="site_email" class="text-capitalize">البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="site_email" id="site_email"
                                        value="{{setting('site_email')}}" aria-describedby="helpId" placeholder="">
                                </div>
                                {{-- Site Phone --}}
                                <div class="form-group">
                                    <label for="site_phone" class="text-capitalize"> هاتف الخدمات</label>
                                    <input type="text" class="form-control" name="site_phone" id="site_phone"
                                        value="{{setting('site_phone')}}" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="site_phone" class="text-capitalize">هاتف الاكاديمية</label>
                                    <input type="text" class="form-control" name="site_phone2" id="site_phone"
                                        value="{{setting('site_phone2')}}" aria-describedby="helpId" placeholder="">
                                </div>
                                {{-- Site location --}}
                                <div class="form-group">
                                    <label for="site_location" class="text-capitalize">الموقع</label>
                                    <input type="text" class="form-control" name="site_location" id="site_location"
                                        value="{{setting('site_location')}}" aria-describedby="helpId" placeholder="">
                                </div>

                            </div>
                        </div>


                        <div class="form-group mr-2">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>حفظ</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
        </div>
    </div>
</main>
@endsection
