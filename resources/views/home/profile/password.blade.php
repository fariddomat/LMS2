@extends('home.layouts._app')

@section('content')
    <!-- Start main-content -->
    <div class="main-content">


        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-md-push-3">
                        <form name="reg-form" class="register-form" method="post" action="{{ route('profiles.changePassword') }}">
                            @csrf

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
                            <div class="icon-box mb-0 p-0">
                                <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                                    <i class="pe-7s-users"></i>
                                </a>
                                <h4 class="text-gray pt-10 mt-0 mb-30">تعديل كلمة المرور</h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">كلمة السر القديمة</label>
                                    <input id="password" value="{{ old('oldpassword') }}" name="oldpassword" class="form-control"
                                        type="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">كلمة السر الجديدة</label>
                                    <input id="password" value="{{ old('password') }}" name="password" class="form-control"
                                        type="password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>تأكيد كلمة السر</label>
                                    <input id="password_confirmation" value="{{ old('password_confirmation') }}"
                                        name="password_confirmation" class="form-control" type="password">
                                </div>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-dark btn-block mt-15" type="submit">تعديل</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
