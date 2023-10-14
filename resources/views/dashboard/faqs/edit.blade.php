@extends('layouts.dashboard')

@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>edit</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.faqs.index') }}">faqs</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>تعديل تصنيف</h4>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('dashboard.faqs.update', $faq->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">السؤال:</label>
                                    <textarea class="form-control" id="question" name="question" rows="3">{{ old('question', $faq->question) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="answer">الجواب:</label>
                                    <textarea class="form-control" id="answer" name="answer" rows="3">{{ old('answer', $faq->answer) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
