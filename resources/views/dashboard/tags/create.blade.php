@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Create</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.tags.index') }}">Tags</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>إضافة وسم</h4>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('dashboard.tags.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="name">الاسم</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
