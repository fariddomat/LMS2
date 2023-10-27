@extends('layouts.dashboard')
@section('title')
    Create dateOfWork
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
                <i class="fa fa-align-justify"></i> Create New Day of works
            </div>
            <div class="card-block ">
                <form action="{{ route('dashboard.dayOfWorks.store') }}" method="POST">
                    @csrf
                    @method('post')
                    @include('layouts._error')


                    <div class="form-group">
                        <label for="name">Day</label>
                        <input type="text" class="form-control" name="day" id="day" value="{{ old('day') }}"
                            aria-describedby="helpId" placeholder="">
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection
