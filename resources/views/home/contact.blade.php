  @extends('home.layouts._app')
  @section('content')
      <!-- Start main-content -->
      <div class="main-content-area">
          <!-- Section: page title -->
          <section class="page-title  section-typo-light bg-img-center"
          style="margin-top: 95px; background-size: cover; background-color:#A8CDD1;">
              <div class="container pt-50 pb-50">
                  <div class="section-content">
                      <div class="row">
                          <div class="col-md-12 text-center">
                              <h2 class="title">اتصل بنا</h2>

                          </div>
                      </div>
                  </div>
              </div>
          </section>

          <!-- Divider: Contact -->
          <section class="divider">
              <div class="container pb-70">
                  <div class="row">
                      <div class="col-lg-5 mb-30">
                        <div class="row" style="justify-content: center">
                            <img class="mb-30" src="{{ asset('logo.webp') }}?v={{ setting('cover_time') }}" alt="images" style="width: auto">

                        </div>
                        {{-- <img class="img-fullwidth mb-30" src="{{ asset('logo-lg.png') }}?v={{ setting('cover_time') }}" alt="images"> --}}
                          {{-- <p>{{setting('site_about')}}</p> --}}
                          <div class="tm-sc-unordered-list list-style2">
                              <ul>
                                  <li><strong>رقم الواتس اب لحجز الجلسات:</strong> <a href= "https://api.whatsapp.com/send?phone={{ setting('site_phone2') }}">{{ setting('site_phone2') }}</a></li>
                                  <li><strong>البريد الالكتروني:</strong> <a
                                          href="mailto:{{setting('site_email')}}">{{setting('site_email')}}</a></li>
                                  <li><strong>العنوان:</strong> {{setting('site_location')}}</li>
                              </ul>
                          </div>
                          <ul class="styled-icons icon-dark icon-sm icon-circled mt-30">
                              <li><a class="social-link" data-tm-bg-color="#A8CDD1" href="{{ setting('instagram_link') }}"><i class="fab fa-instagram"></i></a></li>
                              <li><a class="social-link" data-tm-bg-color="#D9CCB9" href="{{ setting('instagram2_link') }}"><i class="fab fa-instagram"></i></a></li>
                              <li><a class="social-link" data-tm-bg-color="#4C75A3" href="{{ setting('twitter_link') }}"><i class="fab fa-twitter"></i></a></li>
                              <li><a class="social-link" data-tm-bg-color="#A4CA39" href="{{ setting('whatsapp_link') }}"><i class="fab fa-whatsapp"></i></a></li>

                            </ul>
                      </div>
                      <div class="col-lg-7">
                          <h2 class="mt-0 mb-0">هل ترغب بالاستفسار عن شيء؟</h2>
                          <p class="font-size-20">تواصل معنا مباشرة!</p>

                          <!-- Google reCAPTCHA -->
                          {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}

                          <!-- Contact Form -->
                          <form id="contact_form" name="contact_form" class=""
                              action="{{ route('contact') }}" method="post">
                              @csrf
                              <div class="row">
                                @include('layouts._error')
                              </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="mb-3">
                                          <label>الاسم <small>*</small></label>
                                          <input name="name" value="{{ old('name') }}" class="form-control" type="text"
                                              placeholder="ادخل اسمك بالكامل">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="mb-3">
                                          <label>البريد الالكتروني <small>*</small></label>
                                          <input name="email"  value="{{ old('email') }}"  class="form-control required email" type="email"
                                              placeholder="ادخل بريدك الالكرتوني">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="mb-3">
                                          <label>عنوان الرسالة </label>
                                          <input name="subject"  value="{{ old('subject') }}"  class="form-control required" type="text"
                                              placeholder="أدخل العنوان">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="mb-3">
                                          <label>رقم الهاتف  <small>*</small></label>
                                          <input name="mobile"  value="{{ old('mobile') }}"  class="form-control" type="text"
                                              placeholder="أدخل رقم الهاتف">
                                      </div>
                                  </div>
                              </div>

                              <div class="mb-3">
                                  <label>الرسالة <small>*</small></label>
                                  <textarea name="message" class="form-control required" rows="5" placeholder="أدخل رسالتك هنا">{{ old('message') }}</textarea>
                              </div>
                              <div class="mb-3">
                                  {{-- <div class="g-recaptcha" data-sitekey="6LcFfhAUAAAAAM-OQbebKGpCxrT_-xkr_rEVXCfu"></div> --}}
                              </div>
                              <div class="mb-3">
                                  {{-- <input name="form_botcheck" class="form-control" type="hidden" value="" /> --}}
                                  <button type="submit"
                                      class="btn btn-dark btn-theme-colored2 btn-sm  btn-block mt-15"
                                      data-loading-text="Please wait...">إرسال</button>

                              </div>
                          </form>



                      </div>
                  </div>
              </div>
          </section>

      </div>
      <!-- end main-content -->
  @endsection
