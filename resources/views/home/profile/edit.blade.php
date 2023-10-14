@extends('home.layouts._app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content">


        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-md-push-3">
                        <form name="reg-form" class="register-form" method="post"
                            action="{{ route('profiles.update', $profile->id) }}">
                            @csrf
                            @method('put')
                            <div class="icon-box mb-0 p-0">
                                <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                                    <i class="pe-7s-users"></i>
                                </a>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="full_name">الاسم بالكامل</label>
                                    <input name="full_name" value="{{ old('full_name', $profile->full_name) }}"
                                        class="form-control" type="text">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile">رقم الهاتف</label>
                                    <input id="mobile" name="mobile" class="form-control"
                                        value="{{ old('mobile', $profile->mobile) }}" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>البريد الالكتروني</label>
                                    <input name="email" class="form-control" value="{{ old('email', $profile->email) }}"
                                        type="email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>تاريخ الميلاد</label>
                                    <input name="birth_date" value="{{ old('birth_date', $profile->birth_date) }}"
                                        class="form-control" type="date">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>العنوان</label>
                                    <textarea name="address" class="form-control">{{ old('address', $profile->address) }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>نوع الحساب</label>
                                    <select name="type" class="form-control" id="">
                                        <option value="user" @if ($profile->type == 'user') selected @endif>طالب
                                        </option>
                                        <option value="service" @if ($profile->type == 'service') selected @endif>خدمات
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>عبر عن نفسك ببضع كلمات</label>
                                    <textarea name="about" class="form-control">{{ old('about', $profile->about) }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>لماذا ترغب بالانضمام؟</label>
                                    <textarea name="why" class="form-control">{{ old('why', $profile->why) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark btn-theme-colored1 btn-block mt-15" type="submit">تعديل</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
