@extends('layouts.dashboard')
@section('title')
    Create profile
@endsection
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>create</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.profiles.index') }}">profiles</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> إضافة حساب جديد
                    </div>
                    <div class="card-block ">
                        <section>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="">
                                        <form name="reg-form" class="register-form" method="post" action="{{ route('dashboard.profiles.store') }}">
                                            @csrf
                                            @include('layouts._error')
                                            <div class="icon-box mb-0 p-0">
                                                <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                                                    <i class="pe-7s-users"></i>
                                                </a>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="full_name">الاسم بالكامل</label>
                                                    <input name="full_name" value="{{ old('full_name') }}" class="form-control"
                                                        type="text">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="mobile">رقم الهاتف</label>
                                                    <input id="mobile" name="mobile" class="form-control" value="{{ old('mobile') }}"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>البريد الالكتروني</label>
                                                    <input name="email" class="form-control" value="{{ old('email') }}" type="email">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="password">كلمة السر</label>
                                                    <input id="password" value="{{ old('password') }}" name="password" class="form-control"
                                                        type="text">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>تأكيد كلمة السر</label>
                                                    <input id="password_confirmation" value="{{ old('password_confirmation') }}"
                                                        name="password_confirmation" class="form-control" type="text">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>تاريخ الميلاد</label>
                                                    <input name="birth_date" value="{{ old('birth_date') }}" class="form-control"
                                                        type="date">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>العنوان</label>
                                                    <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>نوع الحساب</label>
                                                    <select name="type" class="form-control" id="">
                                                        <option value="user">طالب</option>
                                                        <option value="service">خدمات</option>
                                                   </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>عبر عن نفسك ببضع كلمات</label>
                                                    <textarea name="about" class="form-control">{{ old('about') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>لماذا ترغب بالانضمام؟</label>
                                                    <textarea name="why" class="form-control">{{ old('why') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">إضافة</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
              </div>
            </div>

        </div>
        <!--/.container-fluid-->
    </main>
@endsection
