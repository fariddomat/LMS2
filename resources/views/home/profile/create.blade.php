@extends('home.layouts._app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content">


        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-md-push-3">
                        <form name="reg-form" class="register-form" method="post" action="{{ route('profiles.store') }}">
                            @csrf
                            <div class="icon-box mb-0 p-0">
                                <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                                    <i class="pe-7s-users"></i>
                                </a>
                                <h4 class="text-gray pt-10 mt-0 mb-30">ليس لديك حساب؟ سجل الآن</h4>
                            </div>
                            <hr>
                            <p class="text-gray">أدخل معلوماتك الشخصية بالكامل، وانتظر أن يتم مراجعة طلبك.</p>
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
                                        type="password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>تأكيد كلمة السر</label>
                                    <input id="password_confirmation" value="{{ old('password_confirmation') }}"
                                        name="password_confirmation" class="form-control" type="password">
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
                                    <select name="type"  class="form-control" id="">
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
                                <button class="btn btn-dark btn-theme-colored1 btn-block mt-15" type="submit">سجل الآن</button>
                            </div>


                    <div class="col-md-12">
                        <p style="margin-top: 25px">لديك حساب بالفعل؟</p>

                                <a class="btn btn-dark btn-block   btn-theme-colored3  text-uppercase text-white"
                                href="{{ route('login') }}">دخول</a>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
