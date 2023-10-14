@extends('home.layouts._app')

@section('content')
  <!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="{{ asset('home/images/bg/bg1.jpg') }}?v={{ setting('cover_time') }}" style="margin-top: 95px">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">الاسئلة الشائعة</h2>
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
                  <span><a href="{{ route('home') }}" rel="home">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">FAQ</span>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="accordion tm-accordion accordion-classic" id="accordion200">
              @foreach ($faqs as $index=>$faq)
              @php
                  $index=$index+1;
              @endphp
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading20{{ $index }}">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse20{{ $index }}" aria-expanded="@if ($index==1)
                  true
                  @else
                  false
                  @endif" aria-controls="collapse20{{ $index }}">
                    <strong style="  width: 100%;
                    text-align: right;">{{ $faq->question }}</strong>
                  </button>
                </h2>
                <div id="collapse20{{ $index }}" class="accordion-collapse collapse @if ($index==1)
                show
                @endif" aria-labelledby="heading20{{ $index }}" data-bs-parent="#accordion200">
                  <div class="accordion-body">
                   {!! $faq->answer !!}
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection
