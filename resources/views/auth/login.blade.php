@extends('home.layouts._app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content" style="background: #f2fffd">


        <section>
            <div class="container">
                <div class="row justify-content-center" style="color: #375651">
                    <div class="col-md-4 col-md-push-4" style="text-align: center">
                        <form name="reg-form" class="register-form" method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="icon-box mb-0 p-0">
                               {{-- <img src="{{ asset('login.png') }}" style="max-width: 80px;" alt=""> --}}
                                <h2 class=" pt-10 mt-0 mb-30" style="color: #375651;font-size: 48px;">تسجيـل الدخـول</h2>
                            </div>
                            <hr>
                            <p class="Candal" style="font-size: 14px">أدخل معلوماتك الشخصية للوصول إلى حسابك الشخصي.</p>

                            <div class="row">
                                <div class="form-group col-md-12" style="  text-align: right;
                                font-size: 22px;">
                                    <label for="email" class="Candal">البريد الالكتروني</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12" style="  text-align: right;
                                font-size: 22px; margin-top: 15px">
                                    <label for="password" class="Candal">كلمة السر</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-25">
                                <button class="btn btn-dark btn-theme-colored1 btn-block mt-15 Candal" type="submit" style="  background: unset;
                                color: #375651;
                                padding: 8px 75px;">دخول</button>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px">
                                <a href="{{ route('password.request') }}" style="padding-top: 15px" class="Candal"> هل نسيت كلمة السر؟</a>
                            </div>


                            <div class="col-md-12">
                                <p class="Candal" style="margin-top: 25px">ليس لديك حساب بعد؟</p>

                                <a class="btn btn-dark btn-block   btn-theme-colored1  text-uppercase text-white Candal"
                                    href="{{ route('profiles.create') }}">إنشاء حساب جديد</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
