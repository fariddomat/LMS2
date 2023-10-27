@extends('layouts.dashboard')
@section('title')
    Edit dayOfWork
@endsection
@section('content')
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Index</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.services.index') }}">Services</a></li>
        <li class="breadcrumb-item"><a href="">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>

    <div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Edit Day of works
            </div>
            <div class="card-block ">
                <form action="{{ route('dashboard.dayOfWorks.update', $dayOfWork->id) }}" method="POST">
                    @csrf
                    @method('put')
                    @include('layouts._error')


                    <div class="form-group">
                        <label for="name">Day</label>
                        <input type="text" class="form-control" name="day" id="day" value="{{ old('day',$dayOfWork->day) }}"
                            aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection
