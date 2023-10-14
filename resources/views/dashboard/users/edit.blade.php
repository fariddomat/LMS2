@extends('layouts.dashboard')
@section('title')
    Edit User
@endsection
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>edit</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">users</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> تعديل مستخدم
                    </div>
                    <div class="card-block ">
                        <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST" >
                            @csrf
                            @method('put')
                            @include('layouts._error')


                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email',$user->email) }}"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="row pr-2 pl-2">
                                <div class="form-group col-md-6">
                                    <label for="" class="text-capitalize">كلمة السر الجديدة </label>
                                    <input type="password" class="form-control" name="password" value=""
                                        aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="row pr-2 pl-2">
                                <div class="form-group col-md-6">
                                    <label for="" class="text-capitalize">تأكيد كلمة السر </label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        value="" aria-describedby="helpId">
                                </div>
                            </div>
                            {{-- Roles --}}
                            <div class="form-group">
                                <label for="role">المهمة</label>
                                <select class="form-control" name="role_id" id="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                    تعديل</button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>

        </div>
        <!--/.container-fluid-->
    </main>
@endsection
